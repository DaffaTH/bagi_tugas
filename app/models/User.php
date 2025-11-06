<?php

class User {

	static function createTable() {
		q('CREATE TABLE IF NOT EXISTS "user" ( "urutan" INTEGER, "nipbps" INTEGER PRIMARY KEY NOT NULL, "nip" TEXT, "username" TEXT, "nama" TEXT NOT NULL, "urlfoto" TEXT, "satker" TEXT, "pangkat" TEXT, "golongan" TEXT, "seksi" INTEGER, "jabatan" TEXT, "level" INTEGER NOT NULL, "login_terakhir" DATETIME );');
	}

	static function get($id=null, $col='*') {
		return $id?
			r("SELECT $col FROM user WHERE nipbps=? OR nip=? OR username=?", [$id, $id, str_replace('@bps.go.id','',$id)])[0]:
			r("SELECT $col FROM user ORDER BY login_terakhir DESC");
	}

	static function getPegawai(string $satker) {
		if (strlen($satker)!==4) return false;
		return r('SELECT * FROM user WHERE satker=? ORDER BY urutan', $satker);
	}

	static function updateLastLogin($nipbps) {
		return q('UPDATE user SET login_terakhir=? WHERE nipbps=?', [NOW, $nipbps]);
	}

	static function generateToken($nipbps) {
		return password_hash($nipbps.IP.NOW, PASSWORD_DEFAULT);
	}

	static function verifyToken($nipbps, $token, $login_terakhir) {
		return password_verify($nipbps.IP.$login_terakhir, $token);
	}

	static function setLevel($nipbps, $level) {
		return q('UPDATE user SET level=? WHERE nipbps=?', [$level, $nipbps]);
	}

	static function add(string $satker, $list=false) {
		if (strlen($satker)!==4) return false;
		if (!$list) {
			$bps = new CommunityBPS(SECRET['username'], SECRET['password']);
			$list = substr($satker, 2)==='00'? $bps->get_list_pegawai_provinsi($satker) : $bps->get_list_pegawai_kabkot($satker);
		}
		Surat::createTable($satker);
		Mitra::createTable($satker);
		Setting::add($satker);
		if (substr($satker, 2)==='00') {
			$s = [
				'BPS Propinsi',
				'Seksi Statistik Kependudukan',
				'Seksi Statistik Ketahanan Sosial',
				'Seksi Statistik Kesejahteraan Rakyat',
				'Seksi Statistik Pertanian',
				'Seksi Statistik Industri',
				'Seksi Statistik Pertambangan, Energi dan Konstruksi',
				'Seksi Statistik Harga Konsumen dan Harga Perdagangan Besar',
				'Seksi Statistik Keuangan Dan Harga Produsen',
				'Seksi Statistik Niaga dan Jasa',
				'Seksi Neraca Produksi',
				'Seksi Neraca Konsumsi',
				'Seksi Analisis Statistik Lintas Sektor',
				'Seksi Integrasi Pengolahan Data',
				'Seksi Jaringan dan Rujukan Statistik',
				'Seksi Diseminasi dan Layanan Statistik',
			];
			$j = [
				'Kepala BPS Provinsi .......',
				'Kepala/Staf[?] Seksi Statistik Kependudukan',
				'Kepala/Staf[?] Seksi Statistik Ketahanan Sosial',
				'Kepala/Staf[?] Seksi Statistik Kesejahteraan Rakyat',
				'Kepala/Staf[?] Seksi Statistik Pertanian',
				'Kepala/Staf[?] Seksi Statistik Industri',
				'Kepala/Staf[?] Seksi Statistik Pertambangan, Energi dan Konstruksi',
				'Kepala/Staf[?] Seksi Statistik Harga Konsumen dan Harga Perdagangan Besar',
				'Kepala/Staf[?] Seksi Statistik Keuangan Dan Harga Produsen',
				'Kepala/Staf[?] Seksi Statistik Niaga dan Jasa',
				'Kepala/Staf[?] Seksi Neraca Produksi',
				'Kepala/Staf[?] Seksi Neraca Konsumsi',
				'Kepala/Staf[?] Seksi Analisis Statistik Lintas Sektor',
				'Kepala/Staf[?] Seksi Integrasi Pengolahan Data',
				'Kepala/Staf[?] Seksi Jaringan dan Rujukan Statistik',
				'Kepala/Staf[?] Seksi Diseminasi dan Layanan Statistik',
			];
			$i = 0;
			foreach ($list as $v) {
				if ($v['nipbps']) {
					$v['nip'] = $v['nippanjang'];
					$v['jabatan'] = str_replace($s, $j, $v['satuankerja']);
					$v['urlfoto'] = str_replace('https://community.bps.go.id/images/avatar/', '', $v['urlfoto']);
					$v['urutan'] = ++$i;
					$v['satker'] = $satker;
					$v['seksi'] = self::jabatanToSeksi($v['jabatan']);
					unset($v['email'], $v['nippanjang'], $v['satuankerja'], $v['alamatkantor']);
					self::create($v);
				} else {
					foreach ($v as $w) {
						$w['nip'] = $w['nippanjang'];
						$w['jabatan'] = str_replace($s, $j, $w['satuankerja']);
						$w['urlfoto'] = str_replace('https://community.bps.go.id/images/avatar/', '', $w['urlfoto']);
						$w['urutan'] = ++$i;
						$w['satker'] = $satker;
						$w['seksi'] = self::jabatanToSeksi($w['jabatan']);
						unset($w['email'], $w['nippanjang'], $w['satuankerja'], $w['alamatkantor']);
						self::create($w);
					}
				}
			}
		}
		else {
			$s = [
				'BPS Kabupaten/Kota',
				'Subbagian Tata Usaha',
				'Seksi Statistik Sosial',
				'Seksi Statistik Produksi',
				'Seksi Statistik Distribusi',
				'Seksi Neraca Wilayah dan Analisis Statistik',
				'Seksi Integrasi Pengolahan dan Diseminasi Statistik',
				'KSK',
			];
			$j = [
				'Kepala BPS Kabupaten/Kota .......',
				'Kepala/Staf[?] Subbagian Tata Usaha',
				'Kepala/Staf[?] Seksi Statistik Sosial',
				'Kepala/Staf[?] Seksi Statistik Produksi',
				'Kepala/Staf[?] Seksi Statistik Distribusi',
				'Kepala/Staf[?] Seksi Neraca Wilayah dan Analisis Statistik',
				'Kepala/Staf[?] Seksi Integrasi Pengolahan dan Diseminasi Statistik',
				'KSK .......',
			];
			foreach ($list as $i => $v) {
				$v['nip'] = $v['nippanjang'];
				$v['jabatan'] = str_replace($s, $j, $v['satuankerja']);
				$v['urlfoto'] = str_replace('https://community.bps.go.id/images/avatar/', '', $v['urlfoto']);
				$v['urutan'] = $i+1;
				$v['satker'] = $satker;
				$v['seksi'] = self::jabatanToSeksi($v['jabatan']);
				unset($v['email'], $v['nippanjang'], $v['satuankerja'], $v['alamatkantor']);
				self::create($v, $v['jabatan']==='KSK .......'? 6 : 5);
			}
		}
	}

	static function update($data) {
		$data['id'] = $data['id'] ?? $data['nipbps'];
		$data['seksi'] = $data['seksi'] ?? self::jabatanToSeksi($data['jabatan']);
		$data['success'] = q('UPDATE user SET urutan=:urutan, nipbps=:nipbps, nip=:nip, username=:username, nama=:nama, urlfoto=:urlfoto, seksi=:seksi, jabatan=:jabatan, golongan=:golongan, pangkat=:pangkat, satker=:satker, level=:level WHERE nipbps=:id', $data)? 1 : 0;
		return $data;
	}

	static function delete($nipbps) {
		return q('DELETE FROM user WHERE nipbps=?', $nipbps);
	}

	static function softDelete($nipbps) {
		return q('UPDATE user SET satker="9999" WHERE nipbps=?', $nipbps);
	}

	static function remove(string $satker) {
		if (strlen($satker)!==4) return false;
		q("DROP TABLE IF EXISTS bps$satker");
		q("DROP TABLE IF EXISTS bps$satker".'_mitra');
		q("DELETE FROM user WHERE satker=?", $satker);
		Setting::remove($satker);
	}

	static function reset(string $satker) {
		if (strlen($satker)!==4) return false;
		self::remove($satker);
		self::add($satker);
	}

	static function create($user, $level=5) {
		$user['level'] = $level;
		$user['login_terakhir'] = '2019-01-01 07:30:00';
		return q('INSERT INTO user (urutan,nipbps,nip,username,nama,urlfoto,satker,seksi,jabatan,golongan,pangkat,level,login_terakhir) VALUES (:urutan,:nipbps,:nip,:username,:nama,:urlfoto,:satker,:seksi,:jabatan,:golongan,:pangkat,:level,:login_terakhir)', $user);
	}

	static function jabatanToSeksi($jabatan) {
		$jabatan = strtolower($jabatan);
		// Kab/Kota
		if (strpos($jabatan, 'tata usaha')!==false) return 1;
		if (strpos($jabatan, 'statistik sosial')!==false) return 2;
		if (strpos($jabatan, 'statistik produksi')!==false) return 3;
		if (strpos($jabatan, 'statistik distribusi')!==false) return 4;
		if (strpos($jabatan, 'neraca wilayah dan analisis statistik')!==false) return 5;
		if (strpos($jabatan, 'nwas')!==false) return 5;
		if (strpos($jabatan, 'integrasi pengolahan dan diseminasi statistik')!==false) return 6;
		if (strpos($jabatan, 'ipds')!==false) return 6;
		// Provinsi
		if (strpos($jabatan, 'subbagian bina program')!==false) return 1;
		if (strpos($jabatan, 'subbagian kepegawaian')!==false) return 1;
		if (strpos($jabatan, 'subbagian keuangan')!==false) return 1;
		if (strpos($jabatan, 'subbagian umum')!==false) return 1;
		if (strpos($jabatan, 'subbagian pengadaan')!==false) return 1;
		if (strpos($jabatan, 'statistik kependudukan')!==false) return 2;
		if (strpos($jabatan, 'statistik ketahanan sosial')!==false) return 2;
		if (strpos($jabatan, 'statistik kesejahteraan rakyat')!==false) return 2;
		if (strpos($jabatan, 'statistik pertanian')!==false) return 3;
		if (strpos($jabatan, 'statistik industri')!==false) return 3;
		if (strpos($jabatan, 'statistik harga konsumen')!==false) return 4;
		if (strpos($jabatan, 'statistik keuangan dan harga produsen')!==false) return 4;
		if (strpos($jabatan, 'statistik niaga dan jasa')!==false) return 4;
		if (strpos($jabatan, 'neraca produksi')!==false) return 5;
		if (strpos($jabatan, 'neraca konsumsi')!==false) return 5;
		if (strpos($jabatan, 'analisis statistik lintas sektor')!==false) return 5;
		if (strpos($jabatan, 'integrasi pengolahan data')!==false) return 6;
		if (strpos($jabatan, 'jaringan dan rujukan statistik')!==false) return 6;
		if (strpos($jabatan, 'diseminasi dan layanan statistik')!==false) return 6;
		return 0;
	}

	static function registerPegawai(string $satker, $user_data_simpeg) {
		// $user_data_community = BPS::getDataCommunityByNIP($user_data_simpeg['niplama']);
		self::delete($user_data_simpeg['niplama']);
		$user = [
			'urutan' => $user_data_simpeg['row'],
			'nipbps' => $user_data_simpeg['niplama'],
			'nip' => $user_data_simpeg['nipbaru'],
			'username' => '',
			'nama' => $user_data_simpeg['namagelar'],
			'urlfoto' => 'nofoto.JPG',
			'satker' => $satker,
			'seksi' => self::jabatanToSeksi($user_data_simpeg['nmjab']),
			'jabatan' => $user_data_simpeg['nmjab'],
			'golongan' => $user_data_simpeg['nmgol'],
			'pangkat' => '...(harap lengkapi data)...',
		];
		self::create($user);
	}

	static function register(string $satker, $user) {
		if (strlen($satker)!==4) return 0;

		// Get data pegawai satker
		$employees = BPS::getListOfPegawai($satker);

		// Check if satker exist
		if (count($employees) === 0) {
			return 0;
		}

		// Check if match username & satker
		foreach ($employees as $employee) {
			if ($employee['niplama']==$user || $employee['nipbaru']==$user) $current_user = $employee;
		}
		if (!$current_user) return 0;

		// Check DB
		$user_in_db = self::get($current_user['niplama']);
		$satker_in_db = r('SELECT name FROM sqlite_master WHERE type="table" AND name LIKE ?', 'bps'.$satker)[0]['name'];

		if ($satker_in_db) {
			if ($user_in_db['satker']==$satker) {
				return 2;
			}
			self::registerPegawai($satker, $current_user);
			return 1;
		}
		else {
			self::delete($current_user['niplama']);

			Surat::createTable($satker);
			Mitra::createTable($satker);

			Setting::add($satker);

			// Populate table
			foreach ($employees as $employee) {
				self::registerPegawai($satker, $employee);
			}
			self::setLevel($current_user['niplama'], 4);
			return 1;
		}
	}

	static function clean() {
		$allSatker = r('SELECT satker FROM setting');
		if ($allSatker) foreach ($allSatker as $v) self::remove($v['satker']);
		Notif::delete();
		return r('SELECT satker FROM setting');
	}

	static function refresh(string $satker) {
		if (strlen($satker)!==4) return 0;
		$employees = BPS::getListOfPegawai($satker);
		foreach ($employees as $employee) {
			$user_data_community = BPS::getDataCommunityByNIP($employee['niplama']);
			$data = [
				'urutan' => $employee['row'],
				'nipbps' => $employee['niplama'],
				'nip' => $employee['nipbaru'],
				'username' => $user_data_community['username'],
				'nama' => $employee['namagelar'],
				'urlfoto' => $user_data_community['foto'],
				'jabatan' => $employee['nmjab'],
				'golongan' => $employee['nmgol'],
				'satker' => $satker,
			];
			q('UPDATE user SET urutan=:urutan, nipbps=:nipbps, nip=:nip, username=:username, nama=:nama, urlfoto=:urlfoto, jabatan=:jabatan, golongan=:golongan, satker=:satker WHERE nipbps=:nipbps OR nip=:nip', $data);
		}
		return self::getPegawai($satker);
	}

	static function addOrRemoveOrUpdate($user, $users) {
		if (in_array($user['nipbps'], $users)) q('UPDATE user SET username=:username, nama=:nama, urlfoto=:urlfoto WHERE nipbps=:nipbps', ['username'=>$user['username'], 'nama'=>$user['nama'], 'urlfoto'=>$user['urlfoto'], 'nipbps'=>$user['nipbps']]);
		else self::create($user, $user['jabatan']==='KSK .......'? 6 : 5);
	}

}
