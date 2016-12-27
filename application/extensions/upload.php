<?php
    // defines
    include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'defines.php';

    // core
    include DIR_CORE . 'functions.php';
    routeMe::init(DIR_LIBS, 'php');
    include DIR_CORE . 'configuration.php';

    $ae = new aeConfig;
    $sql = new DB;
    $user = new userClass();
    $spoga = new spogaCrypt;

    if (!empty($_FILES)) {
        if(preg_match("/(gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG)$/", $_FILES['file']['name'])) {
            if ($_FILES['file']['tmp_name'] == '') {
                echo 'Файл не был передан.';
            } else {
                $now = date('Y_m_d');
                $userfolder = ROOT . DS . $ae->site()['upload_folder'] . DS . $now . DS;

                if (!file_exists($userfolder)) {
                    mkdir($userfolder, 0777);
                }

                $userfile = $_FILES['file']['tmp_name'];
                $userfileext = substr(strrchr($_FILES['file']['name'],'.'), 1);

                $hash = $spoga->openssl_myrand(6);
                $target = $userfolder . $hash . '.' . $userfileext;
                $target_res = DS . $ae->site()['upload_folder'] . DS . $now . DS . $hash . '.' . $userfileext;
                move_uploaded_file($userfile, $target);

                echo 'http://' . DOMAIN . $target_res;
            }
        } else {
            echo "Загружать можно только картинки!";
        }
    }