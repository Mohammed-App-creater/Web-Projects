<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Adjust path if needed
require_once __DIR__ . '/../config/database.php';
require_once 'Database.php';

session_start();

if( !isset($_SESSION['user'])){
    header('Location: /signin');
}

// Fallback if not logged in
$username = $_SESSION['user']['name'] ?? 'Guest';
// $user_id now contains 1 and can be used normally
$chatItemsHtml = '';
$td = $_SESSION['user']['id'];
$userId = $td + 1;
$user = $_SESSION['user'];

if (isset($_SESSION['user']['id'])) {
    $db = new Database();
    $userId = filter_var($_SESSION['user']['id'], FILTER_VALIDATE_INT);
    $sessions = $db->getUserChatSessions($userId);

    if (empty($sessions)) {
        $chatItemsHtml .= "<li class='bg-[#1f2937] py-2 rounded-md text-start px-2'>No chat history found.</li>";
    }

    foreach ($sessions as $session) {
        $title = !empty($session['title']) ? htmlspecialchars($session['title']) : 'Untitled Chat';
        $chatItemsHtml .= "<li class='bg-[#1f2937] py-2 px-2 rounded-md text-start truncate overflow-hidden whitespace-nowrap'>{$title}</li>";
    }

    $db->close();
} else {
    $chatItemsHtml .= "<li class='bg-[#1f2937] py-2 px-2 rounded-md text-center'>No chat history found.</li>";
}


require_once __DIR__ . '/../View/home.view.php';
?>



