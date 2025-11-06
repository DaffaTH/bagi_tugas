<?php

class Res {

	static function view($page, $data=null) {
		if (file_exists("views/$page.php")) include "views/$page.php";
		else include file_exists("views/$page")? "views/$page" : $page;
		unset($_SESSION['temp']);
		die;
	}

	static function render($file) {
		echo file_get_contents($file);
		unset($_SESSION['temp']);
		die;
	}

	static function redirect($url=null) {
		header('Location:'.SITE.$url);
		die;
	}

	static function send($data=null, $numericCheck=false) {
		header('Content-Type: application/json');
		echo $numericCheck? json_encode($data, JSON_NUMERIC_CHECK) : json_encode($data);
		unset($_SESSION['temp']);
		die;
	}

	static function sendJson($jsonFile) {
		header('Content-Type: application/json');
		if (file_exists("$jsonFile.json")) include "$jsonFile.json";
		else echo 'false';
		unset($_SESSION['temp']);
		die;
	}

	static function sendError($code, $res=null) {
		http_response_code($code);
		if (file_exists("views/$code.php")) self::view($code);
		if (file_exists("views/$res.php")) self::view($res);
		if ($res) self::send($res);
		die;
	}

	static function download($file) {
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			die;
		}
	}

}
