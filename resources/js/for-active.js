var sectionList = document.querySelectorAll('.main__active-link')
var url = window.location.href;


sectionList.forEach(section => {
    if (url.includes(section.id)) {
        section.classList.toggle('active');
    }
});