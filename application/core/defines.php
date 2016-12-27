<?php
    session_start(); // будет использоваться в будущем, с обновлением до 2.0.1
    ini_set('display_errors', true); // в готовом проекте следует отключить
    date_default_timezone_set('Europe/Moscow'); // установка времени, пригодится на 2.0.1

    define('aev', 'aLPS Engine 2.0.1'); // версия основного ядра
    define('DOMAIN', $_SERVER['SERVER_NAME']); // определяем наш домен
    define('DS', DIRECTORY_SEPARATOR); // используем разделитель системы
    define('ROOT', $_SERVER['DOCUMENT_ROOT']); // корневая директория
    define('DIR_APP', ROOT . DS . 'application' . DS); // пути для ядра
    define('DIR_CORE', DIR_APP . 'core' . DS);
    define('DIR_LIBS', DIR_APP . 'libraries' . DS);
    define('DIR_ROUTES', ROOT . DS . 'routes' . DS);