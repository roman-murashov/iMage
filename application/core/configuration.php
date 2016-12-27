<?php
    DB::$user = '';
    DB::$password = '';
    DB::$dbName = '';
    DB::$host = 'localhost';
    DB::$port = '3306';
    DB::$encoding = 'utf8';

    class aeConfig {
        public function site() {
            $site = Array(
                'title' => 'iMage 2.0.0 - Demo',
                'theme' => 'theme',
                'theme_views' => 'view',
                'theme_static' => 'static',
                'upload_folder' => 'uploads'
            );

            return $site;
        }

        public function key() {
            $keys = Array(
                'auth_key' => '',
                'auth_salt' => ''
            );

            return $keys;
        }
    }