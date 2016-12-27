<?php
	session_name("shared");

	class userClass {
		public static function isAuth() {
			if (isset($_SESSION['is_auth']) && isset($_SESSION['username'])) {
				return $_SESSION['is_auth'];
			} else {
				return false;
			}
		}

		public static function getUsername() {
			if (UserClass::isAuth()) {
				return $_SESSION['username'];
			}
		}

		public static function getUserInfo() {
			global $usersel;
			$username = UserClass::getUsername();

			$sql = new DB;
			$usersel = $sql->query("SELECT * FROM users WHERE name=%s", $username);

			return $usersel;
		}

		public static function getUserStatus() {
			global $userstatus;
			$username = UserClass::getUsername();
			$session_id = session_id();

			$sql = new DB;
			$userstsel = $sql->query("SELECT * FROM users_online WHERE username=%s AND session_id=%s", $username, $session_id);
			$userst = $sql->count();

			if ($userst == 1) {
				$userstatus = 1;
			} else {
				$userstatus = 0;
			}

			return $userstatus;
		}
	}
