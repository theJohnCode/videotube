const toggleBtn = document.querySelector("#toggleBtn");
const showMenu = document.querySelector("#showMenu");

toggleBtn.addEventListener("click", function () {
    showMenu.classList.toggle("show");
});
