// ALL SELECTORS BURGER MENU
const burgerMenu = document.querySelector(".burger-menu");
const burgerIcon = document.querySelector(".burger-icon");
const navLinks = document.querySelector(".nav-links");

// ALL SELECTORS  SEARCH BAR
const searchBox = document.querySelector(".search-bar");
const searchToggle = document.querySelector(".search-toggle");
const searchClose = document.querySelector(".search-close");

// ALL SELECTORS LANGUAGE MENU
const languageBox = document.querySelector(".change-language");
const languageToggle = document.querySelector(".language-toggle");
const languageClose = document.querySelector(".language-close");

// ALL SELECTORS TO DISPLAY SOME MOVIES IN HOME PAGE
const moviesScroll = document.getElementById("moviesScroll");
const scrollLeft = document.getElementById("scrollLeft");
const scrollRight = document.getElementById("scrollRight");


// SCRIPT BURGER MENU
if (burgerMenu && burgerIcon && navLinks) {
    burgerMenu.addEventListener("click", () => {
        navLinks.classList.toggle("active");
        const isOpen = navLinks.classList.contains("active");
        
        burgerIcon.classList.toggle("fa-bars", !isOpen);
        burgerIcon.classList.toggle("fa-xmark", isOpen);
    });
}

// SCRIPT SEARCH  BAR
if (searchBox && searchClose) {
    searchBox.addEventListener("click", (e) => {
        // if user clicks on input -> he can write
        if (e.target.tagName === "INPUT") return;

        searchBox.classList.add("active");
    });

    searchClose.addEventListener("click", (e) => {
        e.stopPropagation();
        searchBox.classList.remove("active");
    });
}

// SCRIPT LANGUAGE MENU 
if (languageBox && languageClose) {
    languageBox.addEventListener("click", (e) => {

        // Don"t close instantly if we click on a link
        if (e.target.tagName === "A") return;
        languageBox.classList.add("active");
    });

    languageClose.addEventListener("click", (e) => {
        e.stopPropagation();
        languageBox.classList.remove("active");
    });
}

// Close all menus if click outside : 
document.addEventListener("click", (e) => {
    if (!searchBox.contains(e.target)) {
        searchBox.classList.remove("active");
    }

    if (!languageBox.contains(e.target)) {
        languageBox.classList.remove("active");
    }

    if (!burgerMenu.contains(e.target) && !navLinks.contains(e.target)) {
        navLinks.classList.remove("active");
        burgerIcon.classList.add("fa-bars");
        burgerIcon.classList.remove("fa-xmark");
    }
});


// SCRIPT TO SCROLL MOVIES IN HOME PAGE
if (moviesScroll && scrollLeft && scrollRight) {

    const scrollAmount = 350;

    scrollLeft.addEventListener("click", () => {
        moviesScroll.scrollBy({
            left: -scrollAmount,
            behavior: "smooth"
        });
    });

    scrollRight.addEventListener("click", () => {
        moviesScroll.scrollBy({
            left: scrollAmount,
            behavior: "smooth"
        });
    });

}