<?php
    class routeMe {
        public function init($dir, $ext) {
            $directory = opendir($dir);
            $mods = array();

            while($file = readdir($directory)) {
                $extension = substr($file, strlen($ext)*-1);
                if(($file != '.') && ($file != '..') && ($extension == $ext)) {
                    array_push($mods, $file);
                }
            }

            sort($mods);
            $i = 0;
            while($i != count($mods)) {
                include $dir . $mods[$i];
                $i = $i + 1;
            }

            closedir($directory);
        }

        public function permament($dir, $file) {
            echo $file;
        }
    }

    class spogaCrypt {
        public static function openssl_myrand($length) {
            $min = 0;
            $max = 100;
            $big = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $small = "abcdefghijklmnopqrstuvwxyz";
            $nums = "0123456789";
            $bigA = str_shuffle($big);
            $smallA = str_shuffle($small);
            $numsA = str_shuffle($nums);
            $subA = substr($bigA,0,5);
            $subB = substr($bigA,6,5);
            $subC = substr($bigA,10,5);
            $subD = substr($smallA,0,5);
            $subE = substr($smallA,6,5);
            $subF = substr($smallA,10,5);
            $subG = substr($numsA,0,5);
            $subH = substr($numsA,6,5);
            $subI = substr($numsA,10,5);

            $random1 = str_shuffle($subA . $subD . $subB . $subF . $subC . $subE);
            $random2 = str_shuffle($random1);
            $random = $random1 . $random2;

            if ($length > $min && $length < $max) {
                $code = substr($random, 0, $length);
            } else {
                $code = $random;
            }

            return $code;
        }

        public static function aes256ose($resi, $key, $iv) { //aes256 encrypt
            $string = $resi;
            $method = 'aes-256-cbc';
            $encrypt = openssl_encrypt($string, $method, $key, 0, $iv);
            return $encrypt;
        }

        public static function aes256osd($resi, $key, $iv) { //aes256 decrypt
            $string = $resi;
            $method = 'aes-256-cbc';
            $decrypt = openssl_decrypt($string, $method, $key, 0, $iv);
            return $decrypt;
        }
    }