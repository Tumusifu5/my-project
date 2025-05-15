<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) exit;

$sender_id = $_SESSION['user_id'];
$receiver_id = $_POST['receiver_id'];
$message = $conn->real_escape_string($_POST['message']);

$conn->query("INSERT INTO messages (sender_id, receiver_id, message) VALUES ($sender_id, $receiver_id, '$message')");
