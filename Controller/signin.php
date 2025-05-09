<?php
require_once __DIR__ . '/../config/database.php';
require_once 'Database.php';

$error = '';
$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Email and Password are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format.';
    } else {
        try {
            $db = new Database();
            $db->query("SELECT * FROM users WHERE email = ?", [$email]);
            $user = $db->fetch();

            if ($user && password_verify($password, $user['password'])) {
                 session_start(); // optional if you're tracking login
                 $_SESSION['user'] = $user;

                header('Location: /home');
                exit();
            } else {
                $error = 'Invalid email or password.';
            }
        } catch (Exception $e) {
            $error = 'An error occurred: ' . $e->getMessage();
        }
    }
}

require __DIR__ . '/../View/auth/singin.view.php';


