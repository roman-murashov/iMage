<?php
    // defines
    include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'defines.php';

    // core
    include DIR_CORE . 'functions.php';
    routeMe::init(DIR_LIBS, 'php');
    include DIR_CORE . 'configuration.php';
    routeMe::init(DIR_ROUTES, 'php');
    Flight::start();
