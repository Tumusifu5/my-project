<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) exit;

$user_id = $_SESSION['user_id'];
$receiver_id = $_GET['receiver_id'];

$result = $conn->query("
    SELECT * FROM messages
    WHERE (sender_id=$user_id AND receiver_id=$receiver_id)
       OR (sender_id=$receiver_id AND receiver_id=$user_id)
    ORDER BY timestamp ASC
");

while ($row = $result->fetch_assoc()) {
    $who = $row['sender_id'] == $user_id ? 'You' : 'Them';
    echo "<p><strong>$who:</strong> " . htmlspecialchars($row['message']) . "</p>";
}
?>