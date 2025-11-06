<?php

/*
------------------------------------------------------------------------
PUBLIC
------------------------------------------------------------------------
*/

if (path('/^api\/get-data\/[a-zA-Z0-9.\-\_]+$/')) {
	if (S[2] && $pelaksana = User::get(S[2])) Res::send(Surat::get1($pelaksana['satker'], $pelaksana['nipbps'], $_GET['mulai'], $_GET['akhir']));
	else Res::send(['status' => 'error', 'message' => 'Data for '.S[2].' was not found']);
}



/*
------------------------------------------------------------------------
AUTHENTICATED-ONLY
------------------------------------------------------------------------
*/

if (!Auth::isLoggedIn()) Res::send(['status' => 'error', 'message' => 'Unauthorized']);

if (post('api/get-data')) {
	if (!r('SELECT name FROM sqlite_master WHERE type="table" AND name=?', 'bps'.$_SESSION[AUTH]['satker'])) { unset($_SESSION[AUTH]); Res::redirect(); }
	$_POST['surat']   = Surat::get($_SESSION[AUTH]['satker'], $_POST) ?? [];
	$_POST['pegawai'] = User::getPegawai($_SESSION[AUTH]['satker']) ?? [];
	$_POST['mitra']   = Mitra::get($_SESSION[AUTH]['satker']) ?? [];
	$_POST['setting'] = Setting::get($_SESSION[AUTH]['satker']) ?? [];
	$_POST['libur'] = ['2019-01-01', '2019-02-05', '2019-03-07', '2019-04-03', '2019-04-19', '2019-05-01', '2019-05-19', '2019-05-30', '2019-06-01', '2019-06-02', '2019-06-03', '2019-06-04', '2019-06-05', '2019-08-11', '2019-08-17', '2019-11-09', '2019-12-25', '2020-01-01', '2020-01-25', '2020-03-22', '2020-03-25', '2020-04-10', '2020-05-01', '2020-05-07', '2020-05-21', '2020-05-24', '2020-05-25', '2020-05-26', '2020-05-27', '2020-05-28', '2020-05-29', '2020-06-01', '2020-07-31', '2020-08-17', '2020-08-20', '2020-10-29', '2020-12-25'];
	Res::send($_POST);
}

if (post('api/add-pegawai')) { sanitizePostData();
	$user = User::get($_POST['nipbps']);
	if ($user && $user['satker']!=='9999') Res::send(['status' => 'error', 'message' => 'Failed to add user', 'data' => $user['satker']]);
	$_POST['satker'] = Auth::isLevel([0,1,2]) ? ($_POST['satker'] ?? $_SESSION[AUTH]['satker']) : $_SESSION[AUTH]['satker'];
	if ($user) $addOrUpdate = User::update($_POST);
	else $addOrUpdate = User::create($_POST, $_POST['level']);
	if ($addOrUpdate) {
		$_POST['success'] = 1;
		Res::send($_POST);
	}
	Res::send(['status' => 'error', 'message' => 'Failed to add user']);
}

if (post('api/update-pegawai')) { sanitizePostData();
	$user = User::get($_POST['nipbps']);
	if (!Auth::isLevel([0,1,2]) && $user['satker']!==$_SESSION[AUTH]['satker']) {
		Res::send(['status' => 'error', 'message' => 'Unauthorized']);
	}
	$_POST['satker'] = Auth::isLevel([0,1,2]) ? ($_POST['satker'] ?? $_SESSION[AUTH]['satker']) : $_SESSION[AUTH]['satker'];
	Res::send(User::update($_POST));
}

if (post('api/delete-pegawai')) { sanitizePostData();
	$user = User::get($_POST['nipbps']);
	if (!Auth::isLevel([0,1,2]) && $user['satker']!==$_SESSION[AUTH]['satker']) {
		Res::send(['status' => 'error', 'message' => 'Unauthorized']);
	}
	if (User::softDelete($_POST['nipbps'])) Res::send(['success' => 1]);
	Res::send(['status' => 'error', 'message' => 'Failed to delete user']);
}

if (post('api/save-mitra')) { sanitizePostData();
	Res::send(Mitra::{$_POST['id']? 'update' : 'create'}($_SESSION[AUTH]['satker'], $_POST));
}
if (post('api/delete-mitra')) {
	Res::send(Mitra::delete($_SESSION[AUTH]['satker'], $_POST));
}

if (post('api/get-surat')) {
	Res::send(Surat::get($_SESSION[AUTH]['satker'], $_POST) ?? []);
}
if (post('api/save-surat')) { sanitizePostData();
	$_POST['dibuat_oleh'] = $_SESSION[AUTH]['nipbps'];
	Res::send(Surat::{$_POST['id']? 'update' : 'create'}($_SESSION[AUTH]['satker'], $_POST));
}
if (post('api/delete-surat')) {
	Res::send(Surat::delete($_SESSION[AUTH]['satker'], $_POST));
}

if (post('api/save-setting')) { sanitizePostData();
	$_POST['satker'] = $_SESSION[AUTH]['satker'];
	Res::send(Setting::update($_POST));
}

if (post('api/upload-template')) { sanitizePostData();
	$target_dir = [
		'st' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-st',
		'st-spd' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-st-spd',
		'kwitansi' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-kwitansi',
		'kwitansi-riil' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-kwitansi-dg-pengeluaran-riil',
	][$_POST['type']];
	$result = Doc::upload($_FILES['template'], $target_dir);
	$_SESSION['notif'] = $result['success']
		? ['type'=> 1, 'msg'=> 'Upload template dokumen berhasil']
		: ['type'=> 3, 'msg'=> $result['error']];
	Res::redirect('pengaturan');
}

if (post('api/delete-template')) { sanitizePostData();
	$target_dir = [
		'st' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-st',
		'st-spd' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-st-spd',
		'kwitansi' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-kwitansi',
		'kwitansi-riil' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-kwitansi-dg-pengeluaran-riil',
	][$_POST['type']];
	$result = Doc::upload(null, $target_dir);
	Res::send(['succcess' => 1]);
}



/*
------------------------------------------------------------------------
ADMIN-ONLY
------------------------------------------------------------------------
*/

if (Auth::isLevel([0,1,2])) {
	if (post('api/admin/notify')) {
		$_POST['success'] = Notif::add($_POST);
		Res::send($_POST);
	}
	if (post('api/admin/get-tugas')) {
		if (!r('SELECT name FROM sqlite_master WHERE type="table" AND name=?', 'bps'.$_POST['satker'])) Res::send(array_merge($_POST, ['fail'=> 1, 'msg'=> 'Satker not found']));
		$_POST['surat'] = Surat::get($_POST['satker'], ['mulai'=> date('Y-m-d', strtotime('-3 month'))]) ?? [];
		$_POST['total_surat'] = r('SELECT id FROM bps'.$_POST['satker'].' ORDER BY id DESC LIMIT 1')[0]['id'];
		Res::send($_POST);
	}
}
