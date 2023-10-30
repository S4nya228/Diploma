const menu = document.querySelector('.header__top')
const createPetition = document.querySelector('.header__create-petition')
const search = document.querySelector('.header__search-box')
const info = document.querySelector('.header__info')
const menuBtn = document.querySelector('.burger')
const body = document.body;
if (menu && menuBtn) {
    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('active')
        menuBtn.classList.toggle('active')
        createPetition.classList.toggle('active')
        search.classList.toggle('active')
        info.classList.toggle('active')
        body.classList.toggle('lock')
    })
}