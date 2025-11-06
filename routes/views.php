<?php

/*
------------------------------------------------------------------------
AUTH PAGES
------------------------------------------------------------------------
*/

if (path('login') && Auth::mustLogout()) {
	// if (post('login')) Auth::login();
	$satker_terdaftar = r('SELECT name FROM sqlite_master WHERE type="table" AND name LIKE "bps%" AND name NOT LIKE "%mitra"');
	$data = [
		'satker-terdaftar' => array_map(function($a) { return substr($a['name'], 3); }, $satker_terdaftar),
	];
	Res::view('login', $data);
}
if ( (path('login/sso-bps') && Auth::mustLogout()) || (!Auth::isLoggedIn() && isset($_GET['code'])) ) {
	require 'vendor/autoload.php';
	Auth::SSO();
	die;
}
if (path('logout')) {
	require 'vendor/autoload.php';
	Auth::logout();
}



/*
------------------------------------------------------------------------
PUBLIC PAGES
------------------------------------------------------------------------
*/

if (path('/^(bantuan|catatan-rilis|statistik)$/')) {
	$data = [
		'user' => preg_match('/^bps\d{4}$/', $_SESSION[AUTH]['nipbps'])? ['nama'=> $_SESSION[AUTH]['nipbps'], 'username'=> $_SESSION[AUTH]['nipbps']] : User::get($_SESSION[AUTH]['nipbps']),
		'surat' => Auth::isLoggedIn()? Surat::getByTglPelaksanaan($_SESSION[AUTH]['satker']) : false,
		'pegawai' => User::getPegawai($_SESSION[AUTH]['satker']??'') ?? [],
	];
	if (S[0]==='statistik') Auth::mustLogin();
	Res::view('static-page', $data);
}

if (path('surat-generator')) {
	// Res::view('surat-generator');
	Res::view('surat-generator-2');
}



/*
------------------------------------------------------------------------
DASHBOARD PAGES
------------------------------------------------------------------------
*/

if (path('/^(|daftar-tugas|daftar-pegawai|pengaturan|tugas-saya|akun-saya)$/') && Auth::mustLogin()) {
	if ($_SESSION[AUTH]['satker']==='9999') { Auth::logout('login?error=unregistered'); }
	elseif (!r('SELECT name FROM sqlite_master WHERE type="table" AND name=?', 'bps'.$_SESSION[AUTH]['satker'])) { unset($_SESSION[AUTH]); Res::redirect(); }
	if (!$_SESSION['first-login'] && $notif = Notif::get($_SESSION[AUTH]['nipbps'])) {
		$notif = addslashess($notif);
		$_SESSION['notif'] = $notif;
		Notif::setLife($notif['id'], $notif['life']-1);
	}
	$data = [
		'pegawai' => User::getPegawai($_SESSION[AUTH]['satker']) ?? [],
		'mitra' => Mitra::get($_SESSION[AUTH]['satker']) ?? [],
		'surat' => Surat::get($_SESSION[AUTH]['satker']) ?? [],
		'setting' => Setting::get($_SESSION[AUTH]['satker']) ?? [],
		'libur' => [],
		'template' => Doc::getTemplate(),
	];
	Res::view('main', $data);
}



/*
------------------------------------------------------------------------
ADMIN PAGES
------------------------------------------------------------------------
*/

if (path('/^admin(\/[\w-]+)?$/') && Auth::isLevel([0,1,2])) {
	if (get('admin')) {
		$data = [
			'user' => User::get($_SESSION[AUTH]['nipbps']),
			'pegawai' => User::get(false, 'urutan, nama, nipbps, nip, username, urlfoto, satker, jabatan, level, login_terakhir'),
			'settings' => Setting::get(),
			'total-tugas' => Surat::count(),
			'database-size' => round(filesize('app/db/app.db') / 1024 / 1024, 2),
			'libur' => [],
		];
		Res::view('admin', $data);
	}
}
