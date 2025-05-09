
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-[#010101] to-[#16254b] min-h-screen flex items-center justify-center text-white">
<div class="w-full max-w-md p-6 bg-black/40 rounded-xl shadow-lg">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold">Sign In</h1>
            <p class="text-gray-400 mt-2">Access to your account</p>
        </div>
        <!-- TODO: Insert image here -->
        <!-- <img src="path/to/robot.png" alt="Robot" class="w-24 h-24" /> -->
    </div>

    <?php if ($error): ?>
        <div class="bg-red-500 text-white p-2 rounded mb-4 text-center text-sm">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST"  class="flex flex-col space-y-4">
        <input
            type="text"
            name="email"
            placeholder="Email"
            class="bg-gray-800 border border-gray-600 rounded px-4 py-2 text-white"
            value="<?= htmlspecialchars($email) ?>"
        />
        <input
            type="password"
            name="password"
            placeholder="Password"
            class="bg-gray-800 border border-gray-600 rounded px-4 py-2 text-white"
        />
        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 rounded py-2 font-semibold"
        >
            Sign In
        </button>
    </form>

    <div class="text-center my-4 text-sm text-gray-400">
        Or Sign In With
    </div>

    <div class="space-y-2">
        <button class="w-full bg-gray-700 py-2 rounded hover:bg-gray-600">🍎 Sign in with Apple</button>
        <button class="w-full bg-gray-700 py-2 rounded hover:bg-gray-600">🔍 Sign in with Google</button>
        <button class="w-full bg-gray-700 py-2 rounded hover:bg-gray-600">🪟 Sign in with Microsoft</button>
    </div>

    
</div>
</body>
</html>
