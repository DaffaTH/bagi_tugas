<?php if (file_exists('maintenance.php')) { include 'maintenance.php'; die; }



/*
------------------------------------------------------------------------
CONFIGURATIONS
------------------------------------------------------------------------
*/

ini_set('session.cookie_httponly', '1'); session_start();

ini_set('max_execution_time', 120); // 2 minutes

date_default_timezone_set('Asia/Jakarta');

define('DEV', $_SERVER['HTTP_HOST']==='localhost' || filter_var($_SERVER['HTTP_HOST'], FILTER_VALIDATE_IP) || file_exists('.dev.php')); // Development or Production

$S = array_slice(explode('/', rtrim(strtok($_SERVER['REQUEST_URI'], '?'), '/')), 1);

define('SITE', $_SERVER['HTTP_HOST']==='localhost' || filter_var($_SERVER['HTTP_HOST'], FILTER_VALIDATE_IP)? '//'.$_SERVER['HTTP_HOST'].'/'.$S[0].'/' : 'https://webapps.bps.go.id/kayongutarakab/'.basename(dirname(__DIR__, 1)).'/'); // Base URL

define('S', array_slice($S, 1)); // Segments

define('PATH', implode('/', S));

define('IP', getenv('HTTP_CLIENT_IP')?: getenv('HTTP_X_FORWARDED_FOR')?: getenv('HTTP_X_FORWARDED')?: getenv('HTTP_FORWARDED_FOR')?: getenv('HTTP_FORWARDED')?: getenv('REMOTE_ADDR'));

define('NOW', date('Y-m-d H:i:s'));

define('AUTH', 'auth-bagitugas');



/*
------------------------------------------------------------------------
ERROR REPORTING
------------------------------------------------------------------------
*/

error_reporting(E_ALL & ~E_NOTICE);

$_SESSION['error-reporting'] = $_GET['error-reporting'] ?? $_SESSION['error-reporting'] ?? 0;

if (!DEV && $_SESSION['error-reporting']!=1) error_reporting(0);



/*
------------------------------------------------------------------------
GLOBAL FUNCTIONS
------------------------------------------------------------------------
*/

function dd($A, $dump=0) { echo '<pre>'; $dump? var_dump($A) : print_r($A); echo '</pre>'; }

function path($path) { return (@preg_match($path, '')===false && PATH===$path) || (@preg_match($path, '')!==false && preg_match($path, PATH)); }

function get($path) { return path($path) && $_SERVER['REQUEST_METHOD']==='GET'; }

function post($path) { return path($path) && $_SERVER['REQUEST_METHOD']==='POST'; }

function addslashess($arr) { return array_map(function($val) { return is_array($val)? array_map(function($subval) { return addslashes($subval); }, $val) : addslashes($val); }, $arr); }

function sanitizePostData() { $_POST = array_map(function($val) { return is_array($val)? array_map(function($subval) { return htmlspecialchars(strip_tags($subval)); }, $val) : htmlspecialchars(strip_tags($val)); }, $_POST); }
