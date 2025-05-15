<?php
session_start();
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$otherUserId = isset($_GET['receiver_id']) ? (int)$_GET['receiver_id'] : (isset($_GET['sender_id']) ? (int)$_GET['sender_id'] : null);
if (!$otherUserId) {
    echo json_encode([]);
    exit;
}

$messages = getMessages($_SESSION['user_id'], $otherUserId);

// Optionally mark messages as read
foreach ($messages as $msg) {
    if ($msg['receiver_id'] == $_SESSION['user_id'] && !$msg['is_read']) {
        markAsRead($msg['id']);
    }
}

header('Content-Type: application/json');
echo json_encode($messages);
?>