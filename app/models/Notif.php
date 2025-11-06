<?php

class Notif {

	static function get($destination) {
		return r('SELECT * FROM notif WHERE destination=?', $destination)[0];
	}

	static function add($data) {
		q('DELETE FROM notif WHERE expired<date(?)', NOW);
		try {
			$destination = $data['destination'][0]==='*'? array_map(function($a) { return $a['nipbps']; }, User::get(false, 'nipbps')) : $data['destination'];
			foreach ($destination as $user) {
				$data['destination'] = $user;
				q('INSERT INTO notif (destination, msg, type, icon, expired, life) VALUES (:destination, :msg, :type, :icon, :expired, :life)', $data);
			}
			return true;
		}
		catch (Exception $e) { unset($e); }
	}

	static function setLife($id, $life=0) {
		if ($life) return q('UPDATE notif SET life=? WHERE id=?', [$life, $id]);
		return self::delete($id);
	}

	static function delete($id=null) {
		return $id?
			q('DELETE FROM notif WHERE id=?', $id) :
			q('DELETE FROM notif');
	}

}
