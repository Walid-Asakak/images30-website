// All selectors :
let burgerIcon = document.querySelector(".burger-icon");
let navLinks = document.querySelector(".nav-links");

burgerIcon.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});