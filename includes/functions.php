<?php
require_once 'config.php';

function registerUser($username, $password, $email, $role) {
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$username, $hashedPassword, $email, $role]);
}

function loginUser($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}

function sendMessage($senderId, $receiverId, $message) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    return $stmt->execute([$senderId, $receiverId, $message]);
}

function getMessages($userId, $otherUserId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT m.*, u.username as sender_name FROM messages m 
                          JOIN users u ON m.sender_id = u.id 
                          WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)
                          ORDER BY sent_at ASC");
    $stmt->execute([$userId, $otherUserId, $otherUserId, $userId]);
    return $stmt->fetchAll();
}

function getUsersByRole($role) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE role = ?");
    $stmt->execute([$role]);
    return $stmt->fetchAll();
}

function markAsRead($messageId) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE messages SET is_read = TRUE WHERE id = ?");
    return $stmt->execute([$messageId]);
}
?>