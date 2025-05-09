<?php
// index.php – main router file

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
    default:
        http_response_code(404);
        require __DIR__ . '/View/404.view.php';
        break;
}
?>
