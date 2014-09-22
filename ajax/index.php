<?
	if ($_GET['f'] != null) {
		$file = md5($_GET['f']);
		$url = "http://".$_SERVER['SERVER_NAME']."/go/".$file;
		$th = "http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI'];
	}

	include "../func.php";
	dbconnect();
	$limit = 10;
	$sql = mysql_query("SELECT * FROM `images` ORDER BY id DESC LIMIT {$limit}");
	dbclose();
	iMage();
?>
	<div class="last">
		<ul>
		<? while ($row = mysql_fetch_assoc($sql)) { ?>
			<li><a onClick="showContent('ajax/image.php?f=<?=$row['code']?>')"><img src="http://<?=$_SERVER['SERVER_NAME']?>/go/<?=$row['hash']?>" style="cursor: pointer;"/></a></li>
		<? } ?>
		</ul>
	</div>