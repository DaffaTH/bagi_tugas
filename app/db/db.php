<?php

$DB = new PDO('sqlite:app/db/app.db');

foreach (glob('app/models/*.php') as $filename) include $filename;



/*
------------------------------------------------------------------------
99 DAY BACKUP
------------------------------------------------------------------------
*/

if (!DEV) {
	if (!file_exists('app/db/backup/'.date('Ymd').'.db')) copy('app/db/app.db', 'app/db/backup/'.date('Ymd').'.db');
	if (file_exists('app/db/backup/'.date('Ymd', strtotime('-99 day')).'.db')) unlink('app/db/backup/'.date('Ymd', strtotime('-99 day')).'.db');
}



/*
------------------------------------------------------------------------
GLOBAL FUNCTIONS
------------------------------------------------------------------------
*/

function q($stmt, $array=null) {
	global $DB;
	if ($array) if (!is_array($array)) $array = [$array];
	$q = $DB->prepare($stmt);
	$q->execute($array);
	return $q;
}

function r($stmt, $array=null) {
	if ($q = q($stmt, $array)) {
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) $data[] = $r;
		return $data;
	}
	return false;
}

function o($stmt, $array=null) {
	if ($q = q($stmt, $array)) if ($r = $q->fetch()) return $r[0];
	return false;
}

function lastID() {
	global $DB;
	return $DB->lastInsertId();
}
