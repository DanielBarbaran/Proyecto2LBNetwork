document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menuBtn');
    const closeMenu = document.getElementById('closeMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const fadeOverlay = document.getElementById('fadeOverlay');

    const openMenu = () => {
        mobileMenu.classList.add('open');
        fadeOverlay.style.opacity = '1';
        fadeOverlay.style.pointerEvents = 'auto';
    };

    const hideMenu = () => {
        mobileMenu.classList.remove('open');
        fadeOverlay.style.opacity = '0';
        fadeOverlay.style.pointerEvents = 'none';
    };

    menuBtn?.addEventListener('click', openMenu);
    closeMenu?.addEventListener('click', hideMenu);
    fadeOverlay?.addEventListener('click', hideMenu);
});
