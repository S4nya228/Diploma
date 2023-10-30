const textarea = document.getElementById('comment-textarea');
const sendButton = document.getElementById('send-button');
const cancelButton = document.getElementById('cancel-button');
const commentButtons = document.getElementById('comment-buttons');

textarea.addEventListener('input', function () {
    if (textarea.value.trim() !== '') {
        sendButton.disabled = false;
        commentButtons.style.display = 'flex';
    } else {
        sendButton.disabled = true;
        commentButtons.style.display = 'none';
    }
});

cancelButton.addEventListener('click', function () {
    commentButtons.style.display = 'none';
});