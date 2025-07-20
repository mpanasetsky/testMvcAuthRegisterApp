<?php

require_once '../app/Models/User.php';

class AuthController extends Controller {
    public function showLogin() {
        $this->view('form_login', [
            'csrf_token' => $_SESSION['csrf_token']
        ]);
    }

    public function login() {
        if (!$this->checkCsrfToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['flash_message'] = 'Invalid CSRF token.';
            header('Location: /login');
            return;
        }

        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt_time'] = time();
        }

        if (
            $_SESSION['login_attempts'] >= MAX_LOGIN_ATTEMPTS &&
            (time() - $_SESSION['last_attempt_time']) < LOGIN_TIMEOUT_SECONDS
        ) {
            $_SESSION['flash_message'] = 'Too many failed login attempts. Please try again later.';
            header('Location: /login');
            return;
        }

        $userModel = new User();
        $user = $userModel->findByEmail($_POST['email']);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['login_attempts'] = 0;
            $_SESSION['flash_message'] = 'Login successful!';
            header('Location: /login');
            return;
        } else {
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time'] = time();
            $_SESSION['flash_message'] = 'Invalid credentials.';
            header('Location: /login');
            return;
        }
    }
}