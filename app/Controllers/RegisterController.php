<?php

require_once '../app/Models/User.php';

class RegisterController extends Controller {
    public function showForm() {
        $this->view('form_register', [
            'csrf_token' => $_SESSION['csrf_token']
        ]);
    }

    public function submit() {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash_message'] = 'Invalid email format.';
            header('Location: /register');
            return;
        }
        if (!$this->checkCsrfToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['flash_message'] = 'Invalid CSRF token.';
            header('Location: /register');
            return;
        }

        $user = new User();
        $existing = $user->findByEmail($_POST['email']);

        if ($existing) {
            $_SESSION['flash_message'] = 'Email already registered.';
            header('Location: /register');
            return;
        }

        $user->create([
            'first_name' => $_POST['first_name'],
            'last_name'  => $_POST['last_name'],
            'email'      => $_POST['email'],
            'phone'      => $_POST['phone'],
            'password'   => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);

        $_SESSION['flash_message'] = 'Registration successful! Please log in.';
        header('Location: /login');
    }
}