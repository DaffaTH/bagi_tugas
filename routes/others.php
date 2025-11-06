<?php

if (path('/^db(\/[\w-]+){1,3}$/') && (DEV||Auth::isLoggedIn())) {
	if (file_exists('app/' . PATH . '.db')) Res::view('app/db/phpliteadmin.php');
	Res::download('app/' . str_replace('/download', '', PATH) . '.db');
}


if (path('/^satker\//')) {

	// New Registration
	if (post('satker/register')) {
		$user = $_POST['user'];
		$satker = $_POST['satker'];
		$employees = json_decode($_POST['employees'], true);
		$isSatkerRegistered = $_POST['isSatkerRegistered'] === 'true';

		foreach ($employees as $employee) {
			if ($employee['niplama']==$user || $employee['nipbaru']==$user) $current_user = $employee;
		}

		$user_in_db = User::get($user);

		if ($isSatkerRegistered) {
			if ($user_in_db['satker']==$satker) {
				Res::send(['message' => 'Satker telah terdaftar']);
			}
			User::registerPegawai($satker, $current_user);
			Res::send(['message' => 'Registrasi berhasil']);
		}
		else {
			User::delete($current_user['niplama']);

			Surat::createTable($satker);
			Mitra::createTable($satker);

			Setting::add($satker);

			// Populate table
			foreach ($employees as $employee) {
				User::registerPegawai($satker, $employee);
			}
			User::setLevel($current_user['niplama'], 4);
			Res::send(['message' => 'Registrasi berhasil']);
		}
	}

	// Old Registration: not working because of CURL
	if (post('satker/daftar')) {
		$_POST['status'] = $_POST['user']? User::register($_POST['satker'], $_POST['user']) : 0;
		Res::send($_POST);
	}

	if (post('satker/refresh') && Auth::isLoggedIn()) {
		Res::send(User::refresh($_SESSION[AUTH]['satker']));
	}
	if (DEV && path('/^satker\/add\/\d+$/')) {
		User::add(S[2]);
		Setting::add(S[2]);
		Res::send(User::getPegawai(S[2]));
	}
	if (DEV && path('/^satker\/remove\/\d{4}$/')) {
		User::remove(S[2]);
		Res::send(r('SELECT name FROM sqlite_master WHERE type="table" AND name LIKE "bps%"'));
	}
	if (DEV && path('satker/remove/purposive')) {
		// $satker = [1300,1400,1507,1904,3375,3517,5200,5302,6107,6109,6305,7171,7312,7505,7605,8105,9100,9108,9171];
		// foreach ($satker as $s) User::remove($s);
		// Res::send(r('SELECT name FROM sqlite_master WHERE type="table" AND name LIKE "bps%"'));
	}
	if (DEV && path('/^satker\/reset\/\d{4}$/')) {
		User::reset(S[2]);
		Setting::reset(S[2]);
		Res::send(User::getPegawai(S[2]));
	}
	if (DEV && path('satker/clean')) {
		Res::send(User::clean());
	}
	if (path('/^satker\/check\/\d+$/')) {
		Res::send(BPS::getListOfPegawai(S[2]));
	}
}

if (path('/^pegawai\//')) {
	if (path('/^pegawai\/check\/\d+$/')) {
		$content = file_get_contents('https://community.bps.go.id/portal/components/organisasi/hover_profile.php?user_pegid='.S[2]);
		echo $content; die;
	}
	if (path('/^pegawai\/check\/[\w\-\.]+$/')) {
		$content = file_get_contents('https://halosis.bps.go.id/formsjs/data.pegawai.php?id='.S[2].'@bps.go.id');
		echo $content; die;
	}
}

if (path('check') && (DEV||Auth::isLevel([0,1,2]))) {
	Res::send([
		'SITE' => SITE,
		'PATH' => PATH,
		'DEV' => DEV,
		'IP' => IP,
		'token' => $_GET['bps']? md5('bps'.$_GET['bps'].date('.Y.m.d.H')) : null,
		'uniqid' => $_SESSION['AUTH'],
		'session' => $_SESSION,
		'cookie' => $_COOKIE,
		'db' => array_merge(
			[[ 'name'=> 'app.db', 'modified'=> date('Y-m-d H:i:s', filemtime('app/db/app.db')) ]],
			array_reverse(array_map(function($a) { return [ 'name'=> $a, 'modified'=> date('Y-m-d H:i:s', filemtime('app/db/backup/'.$a)) ]; }, array_diff(scandir('app/db/backup'), array('.', '..'))))
		),
	]);
}


if (path('backdoor-login') && DEV) {
	$_SESSION[AUTH] = [
		'nipbps' => $_GET['nipbps'],
		'satker' => $_GET['satker'],
		'level' => (int)$_GET['level'],
	];
}
