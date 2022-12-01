// NavBar
const menuToogle = document.querySelector('.menu-toggle input');

const nav = document.querySelector('nav ul');
const ovr = document.querySelector('.hamparan');

menuToogle.addEventListener('click', function () {
    nav.classList.toggle('slide');
    ovr.classList.toggle('ovrly');
});