<?php
session_start();
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'receiver') {
    header('Location: index.php');
    exit;
}

$senders = getUsersByRole('sender');
$selectedSender = isset($_GET['sender_id']) ? (int)$_GET['sender_id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    sendMessage($_SESSION['user_id'], $selectedSender, $_POST['message']);
}

require_once 'includes/header.php';
?>
<style>
#chatMessages {
    display: flex;
    flex-direction: column;
}

.message {
    margin-bottom: 15px;
    max-width: 75%;
    word-wrap: break-word;
}

.message.sent {
    align-self: flex-end;
    background-color: #e6f7ff;
    color: #000;
    border-radius: 10px;
    padding: 10px 15px;
    border: 1px solid #b3e5fc;
    text-align: right;
}

.message.received {
    background-color: #000; 
    color: white;           
    border: 2px solid white;
    border-radius: 10px;
    padding: 10px 15px;
    align-self: flex-start;
}

.message-content {
    font-size: 1rem;
}

.message-time {
    font-size: 0.8rem;
    color: #ccc;
    margin-top: 5px;
    text-align: left;
}
</style>


<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Senders</h4>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <?php foreach ($senders as $sender): ?>
                        <li class="list-group-item <?php echo ($selectedSender === $sender['id']) ? 'active' : ''; ?>">
                            <a href="receiver.php?sender_id=<?php echo $sender['id']; ?>" class="text-decoration-none d-block">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><?php echo htmlspecialchars($sender['username']); ?></span>
                                    <?php 
                                    $unreadStmt = $pdo->prepare("SELECT COUNT(*) FROM messages WHERE receiver_id = ? AND sender_id = ? AND is_read = FALSE");
                                    $unreadStmt->execute([$_SESSION['user_id'], $sender['id']]);
                                    $unreadCount = $unreadStmt->fetchColumn();
                                    if ($unreadCount > 0): ?>
                                        <span class="badge bg-danger rounded-pill"><?php echo $unreadCount; ?></span>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <?php if ($selectedSender): ?>
            <?php 
            $senderInfo = null;
            foreach ($senders as $s) {
                if ($s['id'] == $selectedSender) {
                    $senderInfo = $s;
                    break;
                }
            }
            ?>
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4>Chat with <?php echo htmlspecialchars($senderInfo['username']); ?></h4>
                </div>
                <div class="card-body chat-container" id="chatContainer">
                    <!-- Real-time messages will be loaded here -->
                    <div id="chatMessages"></div>
                </div>
                <div class="card-footer">
                    <form id="messageForm" method="POST">
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Type your reply..." required>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="card shadow">
                <div class="card-body text-center py-5">
                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                    <h4>Select a sender to view messages</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatContainer = document.getElementById('chatContainer');
    const chatMessages = document.getElementById('chatMessages');
    const senderId = new URLSearchParams(window.location.search).get('sender_id');

    function scrollToBottom() {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function fetchNewMessages() {
        if (!senderId) return;

        fetch(`fetch-messages.php?sender_id=${senderId}`)
            .then(response => response.json())
            .then(messages => {
                chatMessages.innerHTML = '';

                if (messages.length === 0) {
                    chatMessages.innerHTML = '<div class="text-center text-muted py-4 bg-dark-custom">No messages yet. When the sender messages you, it will appear here.</div>';
                    return;
                }

               messages.forEach(message => {
    const isSent = message.sender_id == <?php echo $_SESSION['user_id']; ?>;
    const messageDiv = document.createElement('div');
    messageDiv.className = 'message ' + (isSent ? 'sent' : 'received');

    const contentDiv = document.createElement('div');
    contentDiv.className = 'message-content';
    contentDiv.textContent = message.message;

    const timeDiv = document.createElement('div');
    timeDiv.className = 'message-time';

    const time = new Date(message.sent_at).toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
    });

    const readStatus = isSent && message.is_read == 1
        ? '<span class="read-indicator"><i class="fas fa-check-double text-info"></i></span>'
        : '';

    timeDiv.innerHTML = time + ' ' + readStatus;

    messageDiv.appendChild(contentDiv);
    messageDiv.appendChild(timeDiv);
    chatMessages.appendChild(messageDiv);
});


                scrollToBottom();
            })
            .catch(error => console.error('Fetch error:', error));
    }

    // Initial load and polling every 2 seconds
    fetchNewMessages();
    setInterval(fetchNewMessages, 2000);

    // Handle message form submission
    const messageForm = document.getElementById('messageForm');
    if (messageForm) {
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('ajax', 'true');

            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                messageForm.reset();
                fetchNewMessages(); // Immediately refresh messages
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>
