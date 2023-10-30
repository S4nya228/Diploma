setTimeout(function() {
    var messageContainer = document.querySelector('.message-container');
    if (messageContainer) {
        messageContainer.style.transition = 'opacity 0.5s';
        messageContainer.style.opacity = '0';
        setTimeout(function() {
            messageContainer.style.display = 'none';
        }, 500);
    }
}, 3000);