<?php
// index.php – main router file

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
    case '/home' :
        require __DIR__ . '/Controller/home.php';
        break;

    case '/signup' :
        require __DIR__ . '/Controller/signup.php';
        break;

    case '/signin' :
        require __DIR__ . '/Controller/signin.php';
        break;

    case '/chat' :
        require __DIR__ . '/api/chat.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/View/404.view.php';
        break;
}
?>
