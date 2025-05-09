<?php
require_once __DIR__ . '/config/database.php';

class Database {
    private $pdo;
    private $stmt;
}
public function __construct() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("DB Connection failed: " . $e->getMessage());
    }
}
public function query($sql, $params = []) {
    $this->stmt = $this->pdo->prepare($sql);
    return $this->stmt->execute($params);
}
public function fetchAll() {
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function fetch() {
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
}
public function lastInsertId() {
    return $this->pdo->lastInsertId();
}
public function createChat($userId, $title = null) {
    $sql = "INSERT INTO chats (user_id, title) VALUES (:user_id, :title)";
    $this->query($sql, ['user_id' => $userId, 'title' => $title]);
    return $this->lastInsertId();
}
public function getChatMessages($chatId) {
    $sql = "SELECT * FROM chat_history WHERE chat_id = :chat_id ORDER BY created_at ASC";
    $this->query($sql, ['chat_id' => $chatId]);
    return $this->fetchAll();
}
public function saveMemory($userId, $key, $value) {
    $sql = "INSERT INTO memory (user_id, `key`, value) VALUES (:user_id, :key, :value)
        ON DUPLICATE KEY UPDATE value = :value";
    $this->query($sql, ['user_id' => $userId, 'key' => $key, 'value' => $value]);
}
public function getUserChatSessions($userId) {
    $sql = "SELECT * FROM chats 
        WHERE user_id = :user_id 
        ORDER BY updated_at DESC";
    $this->query($sql, ['user_id' => $userId]);
    return $this->fetchAll();
}
public function close() {
    $this->stmt = null;
    $this->pdo = null;
}
