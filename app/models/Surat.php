<?php

class Surat {

	static function createTable(string $satker) {
		return q("CREATE TABLE IF NOT EXISTS 'bps$satker' ( 'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,'no' TEXT NOT NULL,'no_spd' TEXT, 'pws' BOOLEAN DEFAULT 0, 'tgl' DATETIME NOT NULL, 'ttd' INTEGER, 'pelaksana' TEXT NOT NULL, 'tujuan' TEXT NOT NULL, 'tempat' TEXT, 'tgl_mulai' DATETIME NOT NULL, 'tgl_akhir' DATETIME NOT NULL, 'angkutan' INTEGER, 'jenis' INTEGER NOT NULL DEFAULT 0, 'dibuat_oleh' TEXT NOT NULL, 'terakhir_update' DATETIME NOT NULL )");
	}

	static function get(string $satker, array $data=null) {
		if (strlen($satker)!==4) return false;
		$data['mulai'] = $data['mulai'] ?? date('Y-m-d', strtotime('-30 day'));
		$data['akhir'] = $data['akhir'] ?? date('Y-m-d', strtotime('+30 day'));
		$data['pelaksana'] = '%'.($_SESSION[AUTH]['nipbps'] ?? 9999999).'%';
		return r("SELECT * FROM bps$satker WHERE ( tgl_mulai <= date(:akhir) AND tgl_akhir >= date(:mulai) ) OR pelaksana LIKE :pelaksana", $data);
	}

	static function get1(string $satker, $pelaksana, $mulai=null, $akhir=null) {
		if (strlen($satker)!==4) return false;
		$data['mulai'] = $mulai ?? date('Y-m-d', strtotime('-30 day'));
		$data['akhir'] = $akhir ?? date('Y-m-d', strtotime('+30 day'));
		$data['pelaksana'] = '%'.$pelaksana.'%';
		return r("SELECT no,no_spd,pws,tgl,tujuan,tempat,tgl_mulai,tgl_akhir,jenis FROM bps$satker WHERE ( tgl_mulai <= date(:akhir) AND tgl_akhir >= date(:mulai) ) AND pelaksana LIKE :pelaksana", $data) ?? [];
	}

	static function count($satker=null) {
		return $satker?
			( strlen($satker)===4? o("SELECT count(*) FROM bps$satker") : false ) :
			o('SELECT ('.join(' + ', array_map(function($a) { return "(SELECT count(*) FROM bps$a[satker])"; }, r('SELECT satker FROM setting'))).') AS total');
	}

	static function getByTglPelaksanaan(string $satker, array $data=null, string $cols='id, pelaksana, tgl_mulai, tgl_akhir') {
		if (strlen($satker)!==4) return false;
		$data['mulai'] = $data['mulai'] ?? date('Y-m-d', mktime(0, 0, 0, date('m')-1, 1));
		$data['akhir'] = $data['akhir'] ?? date('Y-m-d', strtotime('+30 day'));
		return r("SELECT $cols FROM bps$satker WHERE ( tgl_mulai <= date(:akhir) AND tgl_akhir >= date(:mulai) )", $data);
	}

	static function create(string $satker, array $data) {
		if (strlen($satker)!==4) return false;
		$data['jenis'] = $data['jenis'] ? $data['jenis'] : 0;
		$data['no_spd'] = $data['no_spd'] ? $data['no_spd'] : null;
		$data['pelaksana'] = implode(',', array_merge([$data['pelaksana']], $data['anggota']??[])); unset($data['anggota']);
		$data['terakhir_update'] = NOW;
		$pelaksana = explode(',', $data['pelaksana']);
		$data['tujuan'] = trim($data['tujuan']);
		$data['tempat'] = trim($data['tempat']);
		foreach ($pelaksana as $nipbps) {
			if ($nipbps[0]!=='m' && $r = r("SELECT * FROM bps$satker WHERE pelaksana LIKE :nipbps AND tgl_mulai<=date(:akhir) AND tgl_akhir>=date(:mulai)", ['nipbps'=>"%$nipbps%", 'mulai'=>$data['tgl_mulai'], 'akhir'=>$data['tgl_akhir']])) return ['fail'=>1, 'data'=>$r, 'conflict'=>$nipbps];
		}
		if ($data['no']!=='-' && $exist = r("SELECT * FROM bps$satker WHERE no=? AND pws=? AND tgl LIKE ?", [$data['no'], $data['pws'], substr($data['tgl'], 0, -2).'%'])[0]) return ['fail'=> 1, 'exist'=> $exist];
		$data['success'] = q("INSERT INTO bps$satker (no, no_spd, pws, tgl, ttd, pelaksana, tujuan, tempat, tgl_mulai, tgl_akhir, angkutan, jenis, dibuat_oleh, terakhir_update) VALUES (:no, :no_spd, :pws, :tgl, :ttd, :pelaksana, :tujuan, :tempat, :tgl_mulai, :tgl_akhir, :angkutan, :jenis, :dibuat_oleh, :terakhir_update)", $data)? 1 : 0;
		$data['id'] = lastID();
		return $data;
	}

	static function update(string $satker, array $data) {
		if (strlen($satker)!==4) return false;
		$data['jenis'] = $data['jenis'] ? $data['jenis'] : 0;
		$data['no_spd'] = $data['no_spd'] ? $data['no_spd'] : null;
		$data['pelaksana'] = implode(',', array_merge([$data['pelaksana']], $data['anggota']??[])); unset($data['anggota']);
		$data['terakhir_update'] = NOW;
		$pelaksana = explode(',', $data['pelaksana']);
		$data['tujuan'] = trim($data['tujuan']);
		$data['tempat'] = trim($data['tempat']);
		foreach ($pelaksana as $nipbps) {
			if ($nipbps[0]!=='m' && $r = r("SELECT * FROM bps$satker WHERE id<>:id AND pelaksana LIKE :nipbps AND tgl_mulai<=date(:akhir) AND tgl_akhir>=date(:mulai)", ['id'=>$data['id'], 'nipbps'=>"%$nipbps%", 'mulai'=>$data['tgl_mulai'], 'akhir'=>$data['tgl_akhir']])) return ['fail'=>1, 'data'=>$r, 'conflict'=>$nipbps];
		}
		if ($data['no']!=='-' && $exist = r("SELECT * FROM bps$satker WHERE id<>? AND no=? AND pws=? AND tgl LIKE ?", [$data['id'], $data['no'], $data['pws'], substr($data['tgl'], 0, -2).'%'])[0]) return ['fail'=> 1, 'exist'=> $exist];
		$data['success'] = q("UPDATE bps$satker SET no=:no, no_spd=:no_spd, pws=:pws, tgl=:tgl, ttd=:ttd, pelaksana=:pelaksana, tujuan=:tujuan, tempat=:tempat, tgl_mulai=:tgl_mulai, tgl_akhir=:tgl_akhir, angkutan=:angkutan, jenis=:jenis, dibuat_oleh=:dibuat_oleh, terakhir_update=:terakhir_update WHERE id=:id", $data)? 1 : 0;
		return $data;
	}

	static function delete(string $satker, array $data) {
		if (strlen($satker)!==4) return false;
		$data['success'] = q("DELETE FROM bps$satker WHERE id=:id", $data)? 1 : 0;
		return $data;
	}

}
