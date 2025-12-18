document.addEventListener("DOMContentLoaded", function() {
    const toggle = document.querySelector('#menu-btn'); // Utilise #menu-btn au lieu de .nav-toggle
    const nav = document.querySelector('#main-nav');
    const overlay = document.querySelector('.overlay');
    if (toggle && nav && overlay) {
        toggle.addEventListener('click', () => {
            nav.classList.toggle('open');
            overlay.classList.toggle('active');
        });
        // Fermer le menu en cliquant sur l'overlay
        overlay.addEventListener('click', () => {
            nav.classList.remove('open');
            overlay.classList.remove('active');
        });
    }
});