﻿<?php
	$host = "";
	$user = "";
	$pass = "";
	$db = "";
	
	function dbconnect() {
		global $link, $host, $user, $pass, $db;
		($link = mysql_pconnect("$host", "$user", "$pass")) || die ("Ошибка соединения с сервером MySQL: ".mysql_error());
		mysql_set_charset('utf8');
		mysql_select_db("$db", $link) || die("Ошибка подключения к бд: ".mysql_error() );
	}
	function dbclose() {
		mysql_close();
		print "<!-- iMage v.0.1.1 -->\n";
	}
	function generatePassword($length = 8){
		$chars = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numChars = strlen($chars);
		$string = '';
		for ($i = 0; $i < $length; $i++) {
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
		}
		return $string;
	}
?>