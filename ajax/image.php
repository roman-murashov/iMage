<?
	//$thispage = "http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI'];
	$thispage = "http://".$_SERVER['SERVER_NAME']."/?f=".$_GET['f'];
	$imghash = md5($_GET['f']);
	$urltoimg = "http://".$_SERVER['SERVER_NAME']."/go/".$imghash;
	
	$hash = sha1_file($urltoimg);
?>
<div class="image">
	<a href="<?=$urltoimg?>" target="_blank"><img src="<?=$urltoimg?>"/></a>
</div>
<div class="info">
	<div class="text">Ссылка на эту страницу:</div>
	<input value="<?=$thispage?>" id="short" onClick="this.select()" style="width: 100%;"/>
	<div class="text">Прямая ссылка:</div>
	<input value="<?=$urltoimg?>" id="short" onClick="this.select()" style="width: 100%;"/>
	<div class="text">Хэш изображения:</div>
	<input value="<?=$hash?>" id="short" onClick="this.select()" style="width: 100%;"/>
</div>