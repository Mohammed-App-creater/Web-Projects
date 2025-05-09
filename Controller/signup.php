
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // ─────────────── Validate Inputs ───────────────
    if (!$email || !$username || !$password || !$confirmPassword) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        // ─────────────── Create New User ───────────────
        try {
            $db = new Database();

            // Check if user exists
            $db->query("SELECT id FROM users WHERE email = ? OR name = ?", [$email, $username]);
            $existingUser = $db->fetch();

            if ($existingUser) {
                $error = 'Email or username already taken.';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $db->query(
                    "INSERT INTO users (email, name, password) VALUES (?, ?, ?)",
                    [$email, $username, $hashedPassword]
                );

                header('Location: /home');
                exit();
            }

        } catch (Exception $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    }
}
