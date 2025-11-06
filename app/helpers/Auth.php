<?php

class Auth {

	static function isLoggedIn() {
		return $_SESSION[AUTH]!==null;
	}

	static function isLevel($lv) {
		if (is_array($lv)) return $_SESSION[AUTH]!==null && in_array($_SESSION[AUTH]['level'], $lv, true);
		return $_SESSION[AUTH]!==null && $_SESSION[AUTH]['level']===$lv;
	}

	static function mustLogin($redirectTo=true) {
		if ($redirectTo) $_SESSION['temp'] = PATH;
		if ($_SESSION[AUTH]===null) Res::redirect('login');
		return true;
	}

	static function mustLogout() {
		if ($_SESSION[AUTH]!==null) Res::redirect();
		return true;
	}

	static function login() {

		$_POST['login-fail'] = 1;

		if ($_POST['user']) {

			if (preg_match('/^bps\d{4}$/', $_POST['user'])) {
				if (User::getPegawai($satker = substr($_POST['user'], 3))) {
					if ($_POST['password']===md5($_POST['user'].date('.Y.m.d.H')).date('~H') || ($_POST['password']===$_POST['user'] && DEV)) {
						$_SESSION[AUTH] = [
							'nipbps' => $_POST['user'],
							'satker' => $satker,
							'level' => 6,
						];
						Res::redirect($_POST['redirect']);
					}
					try {
						$bps = new CommunityBPS($_POST['user'], $_POST['password']);
						$_SESSION[AUTH] = [
							'nipbps' => $_POST['user'],
							'satker' => $satker,
							'level' => 6,
						];
						Res::redirect($_POST['redirect']);
					}
					catch (Exception $e) { unset($e); }
				}
			}

			if ($user = User::get($_POST['user'])) {
				if ($_POST['password']==='*'.$user['satker'].'#' && DEV) {
					if ($user['login_terakhir']==='2019-01-01 07:30:00') $_SESSION['first-login'] = true;
					User::updateLastLogin($user['nipbps']);
					if ($_POST['remember']) {
						setcookie('user', $user['nipbps'], time()+(60*60*24*5), '/');
						setcookie('token', User::generateToken($user['nipbps']), time()+(60*60*24*5), '/');
					}
					$_SESSION[AUTH] = [
						'nipbps' => $user['nipbps'],
						'satker' => $user['satker'],
						'level' => (int)$user['level'],
					];
					Res::redirect($_POST['redirect']);
				}
				try {
					$bps = new CommunityBPS($user['username'], $_POST['password']);
					if ($user['login_terakhir']==='2019-01-01 07:30:00') $_SESSION['first-login'] = true;
					User::updateLastLogin($user['nipbps']);
					if ($_POST['remember']) {
						setcookie('user', $user['nipbps'], time()+(60*60*24*5), '/');
						setcookie('token', User::generateToken($user['nipbps']), time()+(60*60*24*5), '/');
					}
					$_SESSION[AUTH] = [
						'nipbps' => $user['nipbps'],
						'satker' => $user['satker'],
						'level' => (int)$user['level'],
					];
					$_SESSION['auth-community-rd'] = [ 'user' => $user['username'] ];
					Res::redirect($_POST['redirect']);
				}
				catch (Exception $e) { unset($e); }
			}

			else $_POST['login-fail'] = 2;

		}

	}

	static function logout($redirectUrl=null) {
		unset($_SESSION[AUTH]);
		unset($_SESSION['auth-community-rd']);
		setcookie('user', null, -1, '/');
		setcookie('token', null, -1, '/');
		if ($redirectUrl) Res::redirect($redirectUrl);
		$provider = new JKD\SSO\Client\Provider\Keycloak([
			'authServerUrl'         => 'https://sso.bps.go.id',
			'realm'                 => 'pegawai-bps',
			'clientId'              => SECRET['clientId'],
			'clientSecret'          => SECRET['clientSecret'],
			'redirectUri'           => $_SERVER['HTTP_HOST']==='localhost' ? 'http://localhost/bagitugas/' : SITE,
		]);
		header('Location:'.$provider->getLogoutUrl());
		die;
	}

	static function checkSavedLogin() {
		if (!isset($_SESSION[AUTH]) && isset($_COOKIE['user'])) {
			if ($user = User::get($_COOKIE['user'])) {
				if (User::verifyToken($_COOKIE['user'], $_COOKIE['token'], $user['login_terakhir'])) {
					$_SESSION[AUTH] = [
						'nipbps' => $user['nipbps'],
						'satker' => $user['satker'],
						'level' => (int)$user['level'],
					];
					$_SESSION['auth-community-rd'] = [ 'user' => $user['username'] ];
				}
				else {
					setcookie('user', null, -1, '/');
					setcookie('token', null, -1, '/');
				}
			}
		}
		elseif (!isset($_SESSION[AUTH]) && isset($_SESSION['auth-community-rd']['user'])) {
			if ($user = User::get($_SESSION['auth-community-rd']['user'])) {
				$_SESSION[AUTH] = [
					'nipbps' => $user['nipbps'],
					'satker' => $user['satker'],
					'level' => (int)$user['level'],
				];
			}
		}
	}

	static function SSO() {
		$provider = new JKD\SSO\Client\Provider\Keycloak([
			'authServerUrl'         => 'https://sso.bps.go.id',
			'realm'                 => 'pegawai-bps',
			'clientId'              => SECRET['clientId'],
			'clientSecret'          => SECRET['clientSecret'],
			'redirectUri'           => $_SERVER['HTTP_HOST']==='localhost' ? 'http://localhost/bagitugas/' : SITE,
		]);

		if (!isset($_GET['code'])) {
			$authUrl = $provider->getAuthorizationUrl();
			$_SESSION['oauth2state'] = $provider->getState();
			header('Location: ' . $authUrl);
			die;
		}

		elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
			unset($_SESSION['oauth2state']);
			Res::redirect();
		}

		else {
			try {
				$token = $provider->getAccessToken('authorization_code', [
					'code' => $_GET['code']
				]);
			} catch (Exception $e) {
				// Gagal mendapatkan akses token
				Res::redirect('login?sso-bps-error=access-token');
			}
			
			try {
				$user = $provider->getResourceOwner($token);

				if ($currentUser = User::get( $user->getNip() )) {
					if ($currentUser['login_terakhir']==='2019-01-01 07:30:00') $_SESSION['first-login'] = true;
					User::updateLastLogin($currentUser['nipbps']);
					setcookie('user', $currentUser['nipbps'], time()+(60*60*24*5), '/');
					setcookie('token', User::generateToken($currentUser['nipbps']), time()+(60*60*24*5), '/');
					$_SESSION[AUTH] = [
						'nipbps' => $currentUser['nipbps'],
						'satker' => $currentUser['satker'],
						'level' => (int)$currentUser['level'],
					];
					Res::redirect();
				}
				else {
					Res::redirect('login?unregistered-user='.$user->getNip());
				}

			} catch (Exception $e) {
				// Gagal mendapatkan data pengguna
				Res::redirect('login?sso-bps-error=user-data');
			}
		}
	}

}
