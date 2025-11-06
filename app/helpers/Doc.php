<?php

class Doc {

	static function filename($link, $a, $b) {
		$a = str_replace('/', '.', $a);
		$b = str_replace('/', '.', $b);
		return ($link? 'assets/docs/' : '') . ($a===$b? $a : $a.' - '.$b) . ' ['.date('Ymd-Hi').'].docx';
	}

	static function anggota(array $anggota) {
		if (count($anggota)) return count($anggota)===1? $anggota[0] : implode("\n", array_map(function($a) { return '-  '.$a; }, $anggota));
		return '-';
	}

	static function getTemplate() {
		$custom = [
			'st' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-st.docx',
			'st-spd' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-st-spd.docx',
			'kwitansi' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-kwitansi.docx',
			'kwitansi-riil' => 'assets/docs/custom/bps'.$_SESSION[AUTH]['satker'].'-kwitansi-dg-pengeluaran-riil.docx',
		];
		return [
			'st' => file_exists($custom['st']) ? $custom['st'] : 'app/docs/surat-tugas.docx',
			'st-spd' => file_exists($custom['st-spd']) ? $custom['st-spd'] : 'app/docs/surat-tugas-spd.docx',
			'kwitansi' => file_exists($custom['kwitansi']) ? $custom['kwitansi'] : 'app/docs/kwitansi.docx',
			'kwitansi-riil' => file_exists($custom['kwitansi-riil']) ? $custom['kwitansi-riil'] : 'app/docs/kwitansi-2.docx',
		];
	}

	static function upload($file, $target_dir) {
		if (!$file) {
			unlink($target_dir.'.docx');
			unlink($target_dir.'.doc');
			return ['success' => $target_dir];
		}

		if (is_uploaded_file($file['tmp_name']) === false) {
			return ['error' => 'Terjadi kesalahan'];
		}

		if ($file['size'] > 3000000) {
			return ['error' => 'File terlalu besar'];
		}

		$ext = strtolower(substr($file['name'], strripos($file['name'], '.')+1));
		if ($ext != 'docx' && $ext != 'doc') {
			return ['error' => 'Tidak mendukung file selain .docx/.doc'];
		}

		if (move_uploaded_file($file['tmp_name'], $target_dir.'.'.$ext)) {
			return ['success' => $target_dir];
		} else {
			return ['error' => 'Terjadi kesalahan'];
		}
	}

}
