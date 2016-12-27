<?php
    function index() {
        $cfg = new aeConfig();
        //$sql = new DB();
        $sc = new spogaCrypt();
        $user = new userClass();

        try {
            $loader = new Twig_Loader_Filesystem($cfg->site()['theme'] . DS . $cfg->site()['theme_views']);
            $twig = new Twig_Environment($loader);
            $twig->addExtension(new Twig_Extension_StringLoader());
            $template = $twig->loadTemplate('index.tpl');

            if($user->isAuth()) {
                echo $template->render(array(
                    'title' => $cfg->site()['title'],
                    'tds' => $cfg->site()['theme'] . DS . $cfg->site()['theme_static'], //link to static dir
                    //'sql_query' => json_encode($eq),
                    //'user' => $user->getUserInfo()[0],
                    //'auth' => $user->isAuth()
                ));
            } else {
                echo $template->render(array(
                    'title' => $cfg->site()['title'],
                    'tds' => $cfg->site()['theme'] . DS . $cfg->site()['theme_static'], //link to static dir
                    //'sql_query' => json_encode($eq),
                    //'auth' => $user->isAuth()
                ));
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    Flight::route('/', 'index');