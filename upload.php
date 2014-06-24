<?
	include "func.php";

	if(preg_match("/(gif|jpg|jpeg|png)$/", $_FILES['userfile']['name'])) 
	{
		dbconnect();
		//
		$uploaddir = 'go/';
		$rand = generateName(8);
		$hash = md5($rand);
		$res = mysql_query("select `id` from `images`");
		$id = mysql_num_rows($res)+1;
		$uploadfile = $uploaddir . basename($hash);

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			print "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=http://".$_SERVER['SERVER_NAME']."/?f=".$rand."\">";
			mysql_query("INSERT INTO images(`code`,`hash`,`id`) VALUES('$rand','$hash','$id') ");
		} else {
			echo "Ошибка загрузки файла. Вас перенаправит обратно через 5 секунд.\n";
			print "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=/?upload=2\">";
		}
		//
		dbclose();
	} else {
		echo "Загружать можно только картинки!";
	}
?>