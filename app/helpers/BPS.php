<?php

class BPS {

	static function getListOfPegawai($satker) {
		$kode_prop = substr($satker, 0, 2);
		$kode_kab = substr($satker, 2);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://simpeg.bps.go.id/data/controller/Request.php');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'req=daftarpeg&act=get&category=get&nip=&kdprop='.$kode_prop.'&kdkab='.$kode_kab.'&unor=&status=1&staktif=&_search=false&nd=1623373625274&rows=100&page=1&sidx=&sord=asc');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close ($ch);
		$result = json_decode($result, true);
		return $result['rows'];
	}

	static function getDataCommunityByNIP($nipbps) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://community.bps.go.id/portal/components/organisasi/hover_profile.php?user_pegid='.$nipbps);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close ($ch);
		preg_match('/(?<=br\>)[a-z0-9.-_]+\@bps.go.id/m', $result, $email);
		preg_match('/(?<=\/images\/)[^"]+/m', $result, $foto);

		$username = substr($email[0], 0, -10);
		$foto = str_replace('avatar/', '', $foto[0]);

		return [
			'username' => $username,
			'foto' => $foto,
		];
	}

}
