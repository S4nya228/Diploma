var btnEdit = document.querySelector(".personal-details__edit-button");
var form = document.querySelector(".personal-details__form");
var inputs = document.querySelectorAll(".personal-details__txt");

btnEdit.addEventListener("click", function () {
    inputs.forEach(input => {
        input.disabled = false;
    });
    form.classList.toggle("edit--active");
});