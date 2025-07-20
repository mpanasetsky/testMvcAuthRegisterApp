<?php

class Router {
    public static function route($uri) {
        $path = parse_url($uri, PHP_URL_PATH);

        switch ($path) {
            case '/register':
                (new RegisterController())->showForm();
                break;
            case '/register/submit':
                (new RegisterController())->submit();
                break;
            case '/login':
                (new AuthController())->showLogin();
                break;
            case '/login/submit':
                (new AuthController())->login();
                break;
            default:
                echo "404 Not Found";
        }
    }
}