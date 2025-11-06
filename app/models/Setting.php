<?php

class Setting {

	static function get(string $satker='') {
		if (strlen($satker)!==4) return r('SELECT * FROM setting');
		return r('SELECT * FROM setting WHERE satker=?', $satker)[0];
	}

	static function add(string $satker) {
		if (strlen($satker)!==4) return false;
		return q('INSERT INTO setting (satker, nama_bps, sistem, kepala, ppk, alamat, alamat_ttd, footer_surat, terakhir_update) VALUES (?,?,?,?,?,?,?,?,?)', [$satker,'',1,'','','','','',NOW]);
	}

	static function remove(string $satker) {
		if (strlen($satker)!==4) return false;
		return q('DELETE FROM setting WHERE satker=?', $satker);
	}

	static function reset(string $satker) {
		if (strlen($satker)!==4) return false;
		self::remove($satker);
		self::add($satker);
	}

	static function update(array $data) {
		if (strlen($data['satker'])!==4) return false;
		if (!filter_var($data['server'], FILTER_VALIDATE_URL)) $data['server'] = null;
		$data['terakhir_update'] = NOW;
		$data['success'] = q('UPDATE setting SET nama_bps=:nama_bps, sistem=:sistem, kepala=:kepala, ppk=:ppk, alamat=:alamat, alamat_ttd=:alamat_ttd, footer_surat=:footer_surat, server=:server, terakhir_update=:terakhir_update WHERE satker=:satker', $data)? 1 : 0;
		return $data;
	}

}
