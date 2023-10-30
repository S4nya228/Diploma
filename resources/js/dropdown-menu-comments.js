document.addEventListener('click', function (event) {
    const dropdownMenu = document.querySelector('.pet-page__dropdown-menu');
    const dropdownLabel = document.querySelector('.pet-page__dropdown-menu-label');
    const dropdownItems = document.querySelectorAll('.pet-page__dropdown-menu-item-link');

    if (event.target === dropdownLabel) {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    } else if (!dropdownMenu.contains(event.target)) {
        dropdownMenu.style.display = 'none';
    }

    dropdownItems.forEach(function (item) {
        if (event.target === item) {
            dropdownMenu.style.display = 'none';
        }
    });
});