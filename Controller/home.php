<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once 'Database.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /signin');
    exit();
}

$user = $_SESSION['user'];
$username = $user['name'] ?? 'Guest';
$userId = isset($user['id']) ? filter_var($user['id'], FILTER_VALIDATE_INT) : null;