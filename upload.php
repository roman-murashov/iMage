<?
	include "func.php";
	dbconnect();
	$blacklist = array(".php", ".phtml", ".php3", ".php4", ".sql", ".mp3", ".avi");
	foreach ($blacklist as $item) {
		if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
			echo "Error.\n";
			exit;
		}
	}
	
	$uploaddir = 'go/';

	$rand = generatePassword(8);
	$hash = md5($rand);

	$res = mysql_query("select SQL_CALC_FOUND_ROWS * from `images`");
	$id = mysql_num_rows($res)+1;

	$uploadfile = $uploaddir . basename($hash);
	//if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			echo "Ok.\n";
			echo $_FILES['userfile']['name'];
			print "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=http://".$_SERVER['SERVER_NAME']."/?f=".$rand."\">";
			mysql_query("INSERT INTO images(`code`,`hash`,`id`) VALUES('$rand','$hash','$id') ");
		} else {
			echo "Ошибка загрузки. Вас перенаправит обратно через 5 секунд.\n";
			print "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=/?upload=1\">";
		}
	dbclose();
?>