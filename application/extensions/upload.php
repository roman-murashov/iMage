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

    $allowed = array( "image/pjpeg","image/jpeg","image/jpg","image/png","image/x-png","image/gif");

    function isImage($file) {
        $fh = fopen($file, 'rb');
        if ($fh) {
            $bytes = fread($fh, 6);
            fclose($fh);

            if ($bytes === false) {
                return false;
            }

            if (substr($bytes,0,3) == "\xff\xd8\xff") {
                return 'image/jpeg';
            }
            if ($bytes == "\x89PNG\x0d\x0a") {
                return 'image/png';
            }
            if ($bytes == "GIF87a" or $bytes == "GIF89a") {
                return 'image/gif';
            }

            //return 'application/octet-stream';
        }
        return false;
    }

    if (!empty($_FILES)) {
        if ($_FILES['file']['tmp_name'] == '') {
            echo 'Файл не был передан.';
        } else {
            if (!in_array(isImage($_FILES['file']['tmp_name']), $allowed)) {
                echo "Загружать можно только картинки!";
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
        }
    }

