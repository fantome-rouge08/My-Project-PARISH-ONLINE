document.addEventListener("DOMContentLoaded", function() {
    const menuBtn = document.getElementById("menu-btn");
    const nav = document.getElementById("main-nav");

    menuBtn.addEventListener("click", function(event) {
        nav.classList.toggle("open");
        event.stopPropagation(); 
    });

    nav.addEventListener("click", function(event) {
        event.stopPropagation(); 
    });

    document.addEventListener("click", function() {
        nav.classList.remove("open");
    });
});