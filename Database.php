<?php
// Include the database configuration file
// This file should contain constants like DB_HOST, DB_NAME, DB_USER, DB_PASS
require_once __DIR__ . '/config/database.php';

// Database class to handle all database operations
class Database {
    // Private property to store PDO instance
    private $pdo;
    
    // Private property to store prepared statement
    private $stmt;
    
    /**
     * Constructor method
     * Initializes database connection using PDO
     */
    public function __construct() {
        try {
            // Create DSN (Data Source Name) for PDO connection
            // Specifies host, database name, and character set
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            
            // Initialize PDO connection with credentials from config
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
            
            // Set PDO error mode to throw exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Terminate script and display error if connection fails
            die("DB Connection failed: " . $e->getMessage());
        }
    }
    
    /**
     * Execute a prepared SQL query with optional parameters
     * @param string $sql The SQL query to prepare
     * @param array $params Parameters to bind to the query
     * @return bool Success status of query execution
     */
    public function query($sql, $params = []) {
        // Prepare the SQL statement
        $this->stmt = $this->pdo->prepare($sql);
        
        // Execute the prepared statement with parameters
        return $this->stmt->execute($params);
    }
    
    /**
     * Fetch all rows from the last executed query
     * @return array Array of associative arrays containing results
     */
    public function fetchAll() {
        // Return all results as associative array
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Fetch single row from the last executed query
     * @return array|bool Associative array of single row or false if none
     */
    public function fetch() {
        // Return single row as associative array
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get the ID of the last inserted record
     * @return string Last inserted ID
     */
    public function lastInsertId() {
        // Return the ID of the last inserted record
        return $this->pdo->lastInsertId();
    }
    
    /**
     * Create a new chat session for a user
     * @param int $userId The ID of the user
     * @param string|null $title Optional title for the chat
     * @return string The ID of the newly created chat
     */
    public function createChat($userId, $title = null) {
        // SQL query to insert new chat record
        $sql = "INSERT INTO chats (user_id, title) VALUES (:user_id, :title)";
        
        // Execute query with user ID and title parameters
        $this->query($sql, ['user_id' => $userId, 'title' => $title]);
        
        // Return the ID of the newly created chat
        return $this->lastInsertId();
    }
    
    /**
     * Retrieve all messages for a specific chat
     * @param int $chatId The ID of the chat
     * @return array Array of messages ordered by creation time
     */
    public function getChatMessages($chatId) {
        // SQL query to select all messages for a chat, ordered by creation time
        $sql = "SELECT * FROM chat_history WHERE chat_id = :chat_id ORDER BY created_at ASC";
        
        // Execute query with chat ID parameter
        $this->query($sql, ['chat_id' => $chatId]);
        
        // Return all messages
        return $this->fetchAll();
    }
    
    /**
     * Save or update a memory key-value pair for a user
     * @param int $userId The ID of the user
     * @param string $key The memory key
     * @param string $value The memory value
     */
    public function saveMemory($userId, $key, $value) {
        // SQL query to insert or update memory record
        // Uses ON DUPLICATE KEY UPDATE to handle existing keys
        $sql = "INSERT INTO memory (user_id, `key`, value) VALUES (:user_id, :key, :value)
                ON DUPLICATE KEY UPDATE value = :value";
                
        // Execute query with user ID, key, and value parameters
        $this->query($sql, ['user_id' => $userId, 'key' => $key, 'value' => $value]);
    }
    
    /**
     * Get all chat sessions for a user
     * @param int $userId The ID of the user
     * @return array Array of chat sessions ordered by last update
     */
    public function getUserChatSessions($userId) {
        // SQL query to select all chats for a user, ordered by update time
        $sql = "SELECT * FROM chats 
                WHERE user_id = :user_id 
                ORDER BY updated_at DESC";
                
        // Execute query with user ID parameter
        $this->query($sql, ['user_id' => $userId]);
        
        // Return all chat sessions
        return $this->fetchAll();
    }
    
    /**
     * Close database connection
     * Cleans up statement and PDO objects
     */
    public function close() {
        // Clear prepared statement
        $this->stmt = null;
        
        // Close PDO connection
        $this->pdo = null;
    }
}
