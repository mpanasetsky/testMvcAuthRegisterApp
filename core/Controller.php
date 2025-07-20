<?php

class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once "../app/Views/$view.php";
    }

    protected function checkCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}