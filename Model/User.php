<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Register a new user with a username and password.
     * @param string $username
     * @param string $password
     * @return bool|string True on success, error message on failure
     */
    public function register($username, $password) {
        try {
            // Check if username already exists
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->fetch()) {
                return "Username already exists";
            }
            return true;
        } catch (PDOException $e) {
            return "Registration failed: " . $e->getMessage();
        }
    }
}
?>