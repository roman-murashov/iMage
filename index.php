<?php
	include "func.php";

	$thispage = "http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI'];
	$imghash = md5($_GET['f']);
	$urltoimg = "http://".$_SERVER['SERVER_NAME']."/go/".$imghash;

	iMage();
?>
<html>
<head>
<title>iMage</title>
<link rel="stylesheet" href="styles/style.css?v000000001" type="text/css" media="screen, projection" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>  
    function showContent(link) {  
  
        var cont = document.getElementById('body');  
        var loading = document.getElementById('loading');  
  
        cont.innerHTML = loading.innerHTML;  
  
        var http = createRequestObject();  
        if( http )   
        {  
            http.open('get', link);  
            http.onreadystatechange = function ()   
            {  
                if(http.readyState == 4)   
                {  
                    cont.innerHTML = http.responseText;  
                }  
            }  
            http.send(null);      
        }  
        else   
        {  
            document.location = link;  
        }  
    }  
  
    // создание ajax объекта  
    function createRequestObject()   
    {  
        try { return new XMLHttpRequest() }  
        catch(e)   
        {  
            try { return new ActiveXObject('Msxml2.XMLHTTP') }  
            catch(e)   
            {  
                try { return new ActiveXObject('Microsoft.XMLHTTP') }  
                catch(e) { return null; }  
            }  
        }  
    }  
</script>  
</head>
<body style="padding-top: 20px">

	<div class="head">
		<div class="menu">
			<ul>
				<a style="cursor: default;"><li><b style="font-size: 14pt;">iMage</b></li></a>
				<? if ($_GET['f'] != null) { ?>
				<a href="/" style="cursor: pointer;"><li>Главная</li></a>
				<? } else { ?>
				<a onClick="showContent('ajax/index.php')" style="cursor: pointer;"><li>Главная</li></a>
				<? } ?>
				<a onClick="showContent('ajax/upload.html')" style="cursor: pointer;"><li>Загрузить</li></a>
				<a href="https://github.com/tomasci/iMage" target="_blank"><li style="border-bottom: 3px solid #ff0000; float: right;"><b>GitHub</b></li></a>
			</ul>
		</div>
	</div>

	<div class="wrapper" id="body">
	
	<?
	if ($_SERVER['REQUEST_URI'] == "/") {
		include "ajax/index.php";
	} 
	?>
	
	<? if ($_GET['f'] != null) { ?>
	
		<div class="image">
			<a href="<?=$urltoimg?>" target="_blank"><img src="<?=$urltoimg?>"/></a>
		</div>
		<div class="info">
			<div class="text">Ссылка на эту страницу:</div>
			<input value="<?=$thispage?>" id="short" onClick="this.select()" style="width: 100%;"/>
			<div class="text">Прямая ссылка:</div>
			<input value="<?=$urltoimg?>" id="short" onClick="this.select()" style="width: 100%;"/>
		</div>
	
	<? } ?>
	
	</div>
	
	<div id="loading" style="display: none;">  
		Идет загрузка...  
	</div>

</body>
</html>