<?php
session_start();
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once 'includes/header.php';
?>

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Dashboard</h3>
    </div>
    <div class="card-body text-center">
        <h4>Welcome, <?php echo $_SESSION['username']; ?>!</h4>
        <p>You are logged in as <?php echo $_SESSION['role']; ?>.</p>
        
        <div class="mt-4">
            <?php if ($_SESSION['role'] === 'sender'): ?>
                <a href="sender.php" class="btn btn-primary btn-lg mx-2">Go to Sender Page</a>
            <?php else: ?>
                <a href="receiver.php" class="btn btn-primary btn-lg mx-2">Go to Receiver Page</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>