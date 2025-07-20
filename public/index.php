<?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once '../config/config.php';
require_once '../core/Database.php';
require_once '../core/Router.php';
require_once '../core/Controller.php';

require_once '../app/Controllers/RegisterController.php';
require_once '../app/Controllers/AuthController.php';

Router::route($_SERVER['REQUEST_URI']);