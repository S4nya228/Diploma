const textarea = document.getElementById('comment-textarea');

    textarea.addEventListener('input', function () {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
});