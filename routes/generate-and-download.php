<?php

if (post('api/generate-surat')) {
	if ($_POST['glob'] && $_POST['data']) { $G = $_POST['glob']; $D = $_POST['data']; }
	else { $data = @json_decode($_POST['data'], true); $G = $data['glob']; $D = $data['data']; }
	if (!is_array($D) || count($D)===0) Res::send(false);
	$G['KAB'] = strtoupper($G['kab']);
	$spd = false;
	foreach ($D as $i => $v) {
		$D[$i]['tujuan'] .= ' di '.$v['tempat'];
		if ($v['spd']) { $D[$i]['_s'] = 1; $spd = true; }
		if ($v['ttd']['an']) { $D[$i]['ttd']['_an'] = 1; $D[$i]['ttd']['an'] = 'A.n. '; }
		if ($v['ttd']['plh']) { $D[$i]['ttd']['_an'] = 2; $D[$i]['ttd']['an'] = 'Plh. '; }
		$D[$i]['nip_spd'] = $v['nip']? 'NIP. '.$v['nip'] : '-';
		$D[$i]['golongan_pangkat'] = $v['golongan']||$v['pangkat']? ($v['golongan']??'...').'  /  '.($v['pangkat']??'...') : '-';
		$D[$i]['tempat_berangkat'] = $G['tempat'];
		$D[$i]['tempat_tujuan'] = $v['tempat'];
		$D[$i]['jabatan'] = $v['jabatan'] ?? '-';
		if (is_array($v['anggota'])) {
			if (count($v['anggota'])<6) {
				$D[$i]['anggota'] = Doc::anggota($v['anggota']);
				$D[$i]['nip'] = $v['nip'] ?? '-';
			}
			else {
				$D[$i]['anggota_lampiran'] = $v['anggota'];
				$D[$i]['anggota'] = 'terlampir';
				$D[$i]['nama'] = $v['nama'].', dkk';
				$D[$i]['nip'] = 'terlampir';
				$D[$i]['nip_spd'] = '';
				$D[$i]['golongan_pangkat'] = 'terlampir';
				$D[$i]['jabatan'] = 'terlampir';
				$D[$i]['spd']['tingkat_biaya'] = 'terlampir';
				$D[$i]['angkutan'] = 'terlampir';
				$D[$i]['tempat_berangkat'] = 'terlampir';
				$D[$i]['tempat_tujuan'] = 'terlampir';
			}
		}
	}
	include 'app/lib/opentbs/tbs_class.php';
	include 'app/lib/opentbs/tbs_plugin_opentbs.php';
	$docxFile = Doc::getTemplate()[$spd ? 'st-spd' : 'st'];
	$TBS = new clsTinyButStrong(['noerr'=> true]);
	$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
	$TBS->LoadTemplate($docxFile, OPENTBS_ALREADY_UTF8);
	$TBS->MergeBlock('d', $D);
	$TBS->Show($G['response']==='link'? OPENTBS_FILE : OPENTBS_DOWNLOAD, $output = Doc::filename($G['response']==='link', $D[0]['no'], end($D)['no']));
	Res::send($output);
}

if (post('api/generate-kwitansi')) {
	if ($_POST['glob'] && $_POST['data']) { $G = $_POST['glob']; $A = $_POST['data']; }
	else { $data = @json_decode($_POST['data'], true); $G = $data['glob']; $A = $data['data']; }
	if (!is_array($A) || count($A)===0) Res::send(false);

	$G['riil2'] = 0;
	$B = [];
	$no = 2;
	if ($G['u_harian']*$G['u_harian_n']) $B[] = ['no'=> ($no++).'.', 'uraian'=> 'Uang harian selama '.$G['u_harian_n'].' hari @ Rp '.number_format($G['u_harian'], 0, ',', '.').',-', 'jml'=> number_format($G['u_harian']*$G['u_harian_n'], 0, ',', '.').',-' ];
	if ($G['u_transport']*$G['u_transport_n']) $B[] = ['no'=> ($no++).'.', 'uraian'=> 'Biaya transportasi selama '.$G['u_transport_n'].' hari @ Rp '.number_format($G['u_transport'], 0, ',', '.').',-', 'jml'=> number_format($G['u_transport']*$G['u_transport_n'], 0, ',', '.').',-' ];
	if ($G['u_penginapan']*$G['u_penginapan_n']) $B[] = ['no'=> ($no++).'.', 'uraian'=> 'Biaya penginapan selama '.$G['u_penginapan_n'].' hari @ Rp '.number_format($G['u_penginapan'], 0, ',', '.').',-', 'jml'=> number_format($G['u_penginapan']*$G['u_penginapan_n'], 0, ',', '.').',-' ];
	if ($G['u_t4']) $B[] = ['no'=> ($no++).'.', 'uraian'=> 'Pengeluaran riil', 'jml'=> number_format($G['u_t4'], 0, ',', '.').',-' ];
	if (!$B || count($B)<3) $B[] = ['no'=>'', 'uraian'=>'', 'jml'=>''];

	if ($G['uraian_riil1']||$G['uraian_riil2']||$G['u_riil1']||$G['u_riil2']) {
		$docxFile = Doc::getTemplate()['kwitansi-riil'];
		if (!($G['uraian_riil1']||$G['u_riil1']) && ($G['uraian_riil2']||$G['u_riil2'])) {
			$G['uraian_riil1'] = $G['uraian_riil2'];
			$G['uraian_riil2'] = null;
			$G['u_riil1'] = $G['u_riil2'];
			$G['u_riil2'] = null;
		}
		$G['u_riil1'] = number_format($G['u_riil1'], 0, ',', '.');
		if ($G['u_riil2']) $G['u_riil2'] = number_format($G['u_riil2'], 0, ',', '.');
		$G['riil2'] = $G['uraian_riil2']||$G['u_riil2']? 1 : 0;
	}
	else $docxFile = Doc::getTemplate()['kwitansi'];
	$G['u_t'] = number_format($G['u_t'], 0, ',', '.');
	$G['u_t4'] = number_format($G['u_t4'], 0, ',', '.');

	include 'app/lib/opentbs/tbs_class.php';
	include 'app/lib/opentbs/tbs_plugin_opentbs.php';
	$TBS = new clsTinyButStrong(['noerr'=> true]);
	$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
	$TBS->LoadTemplate($docxFile, OPENTBS_ALREADY_UTF8);
	$TBS->MergeBlock('b', $B);
	$TBS->MergeBlock('a', $A);
	$TBS->Show($G['response']==='link'? OPENTBS_FILE : OPENTBS_DOWNLOAD, $output = Doc::filename($G['response']==='link', 'Kwitansi '.$A[0]['no'], 'Kwitansi '.$A[0]['no']));
	Res::send($output);
}
