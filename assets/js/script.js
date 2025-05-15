// This could be used for additional JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Notification for new messages
    function checkNewMessages() {
        fetch('includes/functions.php?action=check_messages')
            .then(response => response.json())
            .then(data => {
                if (data.unread > 0) {
                    // Show notification
                    if (!document.getElementById('messageNotification')) {
                        const notification = document.createElement('div');
                        notification.id = 'messageNotification';
                        notification.className = 'position-fixed bottom-0 end-0 p-3';
                        notification.innerHTML = `
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header bg-primary text-white">
                                    <strong class="me-auto">New Message</strong>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    You have ${data.unread} new message(s)
                                </div>
                            </div>
                        `;
                        document.body.appendChild(notification);
                        
                        // Close button functionality
                        notification.querySelector('.btn-close').addEventListener('click', function() {
                            notification.remove();
                        });
                    }
                }
            });
    }
    
    // Check for new messages every 10 seconds
    setInterval(checkNewMessages, 10000);
});