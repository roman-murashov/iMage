<?
	include "../func.php";

	if(preg_match("/(gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG)$/", $_FILES['userfile']['name'])) 
	{
		dbconnect();
		//
		$uploaddir = '../go/';
		$rand = generateName(8);
		$hash = md5($rand);
		$res = mysql_query("select `id` from `images`");
		$id = mysql_num_rows($res)+1;
		$uploadfile = $uploaddir . basename($hash);
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			$urltoimg = "http://".$_SERVER['SERVER_NAME']."/go/".$hash;
			$image_hash = sha1_file($urltoimg);
			
			$selme = mysql_query("SELECT * FROM `images` WHERE image_hash='{$image_hash}'");
			$gimg = mysql_fetch_assoc($selme);
			
			if ($image_hash == $gimg['image_hash']) {
				print "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=http://".$_SERVER['SERVER_NAME']."/?f=".$gimg['code']."\">";
				$already = "../go/".$hash;
				unlink($already);
			} else {
				print "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=http://".$_SERVER['SERVER_NAME']."/?f=".$rand."\">";
				mysql_query("INSERT INTO images(`code`,`hash`,`id`,`image_hash`) VALUES('$rand','$hash','$id','$image_hash') ");
			}
		} else {
			echo "Ошибка загрузки файла. Попробуйте еще раз.\n";
		}
		//
		dbclose();
	} else {
		echo "Загружать можно только картинки!";
	}
?>