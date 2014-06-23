<?php
	if ($_GET['f'] != null) {
		$file = md5($_GET['f']);
		$url = "http://".$_SERVER['SERVER_NAME']."/go/".$file;
		$th = "http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI'];
	}
	if ($_GET['upload'] == "2") {
		include "upload.php";
	}
	include "func.php";
	dbconnect();
	if ($_GET == null) {
		$limit = 25;
	} else {
		$limit = 5;
	}
	$sql = mysql_query("SELECT * FROM `images` ORDER BY id DESC LIMIT {$limit}");
	dbclose();
?>
<html>
<head>
<title>iMage</title>
<link rel="stylesheet" href="styles/style.css?v000000001" type="text/css" media="screen, projection" />
</head>
<body>

	<div class="head">
		<div class="menu">
			<ul>
				<a href="#" style="cursor: default;"><li><b style="font-size: 14pt;">iMage</b></li></a>
				<a href="/"><li>Главная</li></a>
				<a href="/?upload=1"><li>Загрузить</li></a>
			</ul>
		</div>
	</div>
	
	<div class="last">
		<ul>
		<? while ($row = mysql_fetch_assoc($sql)) { ?>
			<li><a href="http://<?=$_SERVER['SERVER_NAME']?>/?f=<?=$row['code']?>"><img src="http://<?=$_SERVER['SERVER_NAME']?>/go/<?=$row['hash']?>"/></a></li>
		<? } ?>
		</ul>
	</div>
	
	<div class="wrapper">
		<? if ($_GET == null) { } else if ($_GET['upload'] == "1") { ?>
			<form name="upload" action="/?upload=2" method="POST" ENCTYPE="multipart/form-data">
			<b>Выбрать изображение:</b><br>
			<input type="file" name="userfile"><br>
			<input type="submit" name="upload" value="Загрузить">
			</form>
		<? } else { ?>
			<div class="image">
				<a href="<?=$url?>" target="_blank"><img src="<?=$url?>"/></a>
			</div>
			<div class="info">
				<div class="text">Ссылка на эту страницу:</div>
				<input value="<?=$th?>" id="short" onClick="this.select()" style="width: 370px;"/>
				<div class="text">Прямая ссылка:</div>
				<input value="<?=$url?>" id="short" onClick="this.select()" style="width: 370px;"/>
			</div>
		<? } ?>
	</div>

</body>
</html>