document.addEventListener("DOMContentLoaded", function() {
    const menuBtn = document.getElementById("menu-btn");
    const nav = document.getElementById("main-nav");

    menuBtn.addEventListener("click", function(event) {
        nav.classList.toggle("open");
        event.stopPropagation(); // Empêche la propagation du clic
    });

    nav.addEventListener("click", function(event) {
        event.stopPropagation(); // Empêche la fermeture si on clique dans le menu
    });

    document.addEventListener("click", function() {
        nav.classList.remove("open");
    });
});