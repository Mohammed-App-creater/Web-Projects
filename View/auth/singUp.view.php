<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-[#010101] to-[#16254b] min-h-screen flex items-center justify-center text-white">
<div class="w-full max-w-md p-6 bg-black/40 rounded-xl shadow-lg">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold">Sign Up</h1>
            <p class="text-gray-400 mt-2">Create a new account</p>
        </div>
        <!-- TODO: Insert robot image here -->
        <!-- <img src="path/to/robot.png" alt="Robot" class="w-24 h-24" /> -->
    </div>

    <?php if ($error): ?>
        <div class="bg-red-500 text-white p-2 rounded mb-4 text-center text-sm">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="flex flex-col space-y-4">
        <div class="flex items-center gap-2 bg-gray-800 rounded px-4 py-2">
            <span></span>
            <input
                    type="text"
                    name="username"
                    placeholder="Username"
                    class="bg-transparent outline-none text-white w-full"
                    value="<?= htmlspecialchars($username) ?>"
            />
        </div>

        <div class="flex items-center gap-2 bg-gray-800 rounded px-4 py-2">
            <span>👤</span>
            <input
                    type="text"
                    name="email"
                    placeholder="Email"
                    class="bg-transparent outline-none text-white w-full"
                    value="<?= htmlspecialchars($email) ?>"
            />
        </div>

        <div class="flex items-center gap-2 bg-gray-800 rounded px-4 py-2">
            <span>🔒</span>
            <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="bg-transparent outline-none text-white w-full"
            />
        </div>

        <div class="flex items-center gap-2 bg-gray-800 rounded px-4 py-2">
            <span>🔒</span>
            <input
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm Password"
                    class="bg-transparent outline-none text-white w-full"
            />
        </div>

        <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 rounded py-2 font-semibold"
        >
            Sign Up
        </button>
    </form>

    
</div>
</body>
</html>
