<?php

class Mitra {

	static function createTable(string $satker) {
		$table = 'bps'.$satker.'_mitra';
		return q("CREATE TABLE IF NOT EXISTS '$table' ( 'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,'kec' TEXT NOT NULL,'nama' TEXT NOT NULL,'asal' TEXT,'no_hp' TEXT,'nik' TEXT,'no_rek' TEXT,'npwp' TEXT );");
	}

	static function get(string $satker) {
		if (strlen($satker)!==4) return false;
		return r('SELECT * FROM bps'.$satker.'_mitra');
	}

	static function create(string $satker, array $data) {
		if (strlen($satker)!==4) return false;
		$table = 'bps'.$satker.'_mitra';
		unset($data['id']);
		$data['kec'] = trim($data['kec']);
		$data['asal'] = trim($data['asal']);
		$data['success'] = q("INSERT INTO $table (kec, nama, asal, no_hp, nik, no_rek, npwp) VALUES (:kec, :nama, :asal, :no_hp, :nik, :no_rek, :npwp)", $data)? 1 : 0;
		$data['id'] = lastID();
		return $data;
	}

	static function update(string $satker, array $data) {
		if (strlen($satker)!==4) return false;
		$table = 'bps'.$satker.'_mitra';
		$data['kec'] = trim($data['kec']);
		$data['asal'] = trim($data['asal']);
		$data['success'] = q("UPDATE $table SET kec=:kec, nama=:nama, asal=:asal, no_hp=:no_hp, nik=:nik, no_rek=:no_rek, npwp=:npwp WHERE id=:id", $data)? 1 : 0;
		return $data;
	}

	static function delete(string $satker, array $data) {
		if (strlen($satker)!==4) return false;
		$table = 'bps'.$satker.'_mitra';
		$data['success'] = q("DELETE FROM $table WHERE id=:id", $data)? 1 : 0;
		return $data;
	}

}
