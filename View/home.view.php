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

<!-- Main Part -->
<main class="flex flex-col w-full h-screen relative no-scrollbar">
    <!-- Header -->
    <header class="p-4 flex justify-start gap-4 items-center">
        <button id="openSidebar" class="text-white text-2xl focus:outline-none">
            ☰
        </button>

        <h1 class="text-2xl font-bold">ASTU ChatBot</h1>
        <!-- Add drawer toggle or menu icon here if needed -->
    </header>

    <!-- Suggestions (Brainstorming) -->
    <section class="px-4 overflow-y-auto no-scrollbar">
        <!-- Greeting -->
        <section id="greeting">
            <section class="text-center px-4  mb-10">
                <h2 class="text-3xl font-semibold mb-2">Hello, Ask Me Anything...</h2>
            </section>
            <?php
            $ideas = [
                [
                    "icon" => '☀️',
                    "idea1" => "Explain quantum computing in simple terms",
                    "idea2" => "How do I make HTTP in JavaScript",
                    "color" => "bg-purple-700"
                ],
                [
                    "icon" => '💻',
                    "idea1" => "What is an API?",
                    "idea2" => "How to use async/await",
                    "color" => "bg-blue-500"
                ],
                [
                    "icon" => '🧠',
                    "idea1" => "Basics of AI",
                    "idea2" => "How machine learning works",
                    "color" => "bg-pink-600"
                ],
            ];
            echo "<div class='flex flex-col items-center gap-8 mb-10'>";
            foreach ($ideas as $idea) {
                $brainstorming = new Brainstorming(
                    $idea['icon'],
                    $idea['idea1'],
                    $idea['idea2'],
                    $idea['color']
                );
                    echo $brainstorming->render();
            }
            echo '</div>';
            ?>
            <!-- A div that pushes the main content up to not be covered by the footer -->
            <div class="h-[200px]"></div>
        </section>
    </section>


    <section id="chatBox" class=" w-1/2  hidden -mt-8 mx-auto h-screen overflow-y-auto no-scrollbar">
        <ul id="chats" class="flex flex-col gap-6 p-4 overflow-y-auto no-scrollbar">

        </ul>
        <!-- A div that pushes the main content up to not be covered by the footer -->
        <div class="h-[200px]"></div>
    </section>

    <!-- Bottom Chat Bar -->
    <!-- Add this to your global CSS or inside a <style> block -->
    <footer class="w-[45%] max-w-4xl h-auto bg-black py-4 px-2 flex flex-col border border-gray-600  items-center gap-4 rounded-3xl absolute bottom-10 left-1/2 transform -translate-x-1/2">
        <!-- Textarea (scrollbar hidden) -->
        <textarea
                id="dynamicInput"
                class="w-full bg-transparent text-white px-4 py-2 outline-none placeholder-gray-100 max-h-[220px] overflow-y-auto resize-none no-scrollbar"
                placeholder="Ask me anything..."
        ></textarea>

        <!-- Action Buttons -->
        <div class="flex justify-between items-center w-full gap-4">
            <div class="flex gap-4">
                <!-- Star -->
                <div class="flex items-center gap-2 border border-gray-600 px-4 py-2 rounded-full text-white">
                    <img src="/icons/star.svg" alt="star" class="w-5 h-5"/>
                    <span class="text-sm text-gray-300">Save</span>
                </div>

                <!-- Image -->
                <div class="flex items-center gap-2 border border-gray-600 px-4 py-2 rounded-full text-white">
                    <i class="text-lg">🖼️</i>
                    <span class="text-sm text-gray-300">Image</span>
                </div>

                <!-- Mic -->
                <div class="flex items-center gap-2 border border-gray-600 px-4 py-2 rounded-full text-white">
                    <i class="text-lg">🎤</i>
                    <span class="text-sm text-gray-300">Voice</span>
                </div>
            </div>

            <!-- Send -->
            <div onclick="askGemini()"
                 class="flex items-center gap-2 border border-gray-600 px-4 py-2 rounded-full text-white pointer">
                <i class="text-lg">📤</i>
                <span class="text-sm text-gray-300 pointer ">Send</span>
            </div>
        </div>
    </footer>


</main>

</body>

<script src="/main.js">

</script>

</html>