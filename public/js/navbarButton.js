
const openBtn = document.getElementById('openMenu');
const closeBtn = document.getElementById('closeMenu');
const sidebar = document.getElementById('navbarMobile');

openBtn.addEventListener('click', () => {
    sidebar.style.transform = 'translateX(0)';
});

closeBtn.addEventListener('click', () => {
    sidebar.style.transform = 'translateX(-100%)';
});
