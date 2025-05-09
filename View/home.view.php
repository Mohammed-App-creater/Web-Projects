<?php
require_once 'View/components/brainstorming.view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Chat Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }

    #chats li:nth-child(odd) {
        text-align: right;
    }
</style>
<body class="bg-gradient-to-br from-black to-[#16254b] text-white min-h-screen flex overflow-y-auto no-scrollbar">


<!-- Aside Bar -->
<aside id="sidebar"
       class="w-72 h-screen bg-[#000000] transition-transform duration-500 ease-in-out transform -translate-x-full fixed z-50">
    <!-- Sidebar Header: Toggle Menu Button -->
    <div class="flex justify-between items-center p-4 border-b border-gray-600">
        <h2 class="text-xl font-bold">Menu</h2>
        <button id="toggleSidebar" class="text-white text-2xl focus:outline-none">
            ✕ <!-- X icon -->
        </button>
    </div>

    <!-- Avatar and Email -->
    <div class="flex flex-col items-center gap-4 w-full my-5 ">
        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-500 ">
            <h1 class="text-2xl font-semibold"><?= htmlspecialchars($username[0]) ?></h1>
        </div>
        <p class="text-2xl font-semibold "><?= htmlspecialchars($username) ?></p>
    </div>

    <!-- Chat History -->
    <div class="overflow-y-auto px-4 py-2" style="height: 70%;">
        <h3 class="text-lg font-semibold mb-2">Chat History</h3>
        <ul class="space-y-2">
            <?= $chatItemsHtml ?>
        </ul>
    </div>

    <!-- Logout Button -->
    <div class="absolute bottom-4 left-0 w-full px-4">
        <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded-md text-white font-medium">
            Logout
        </button>
    </div>
</aside>




</body>

<script src="/main.js">

</script>

</html>