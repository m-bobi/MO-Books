// -----------------------    NAVBAR RESPONSIVENESS

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navBar = document.querySelector('.navBar');

    menuToggle.addEventListener('click', function () {
        navBar.classList.toggle('active');
    });

    const navLinks = document.querySelectorAll('.formGroup a');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            navBar.classList.remove('active');
        });
    });

    document.addEventListener('click', function (event) {
        const isClickInside = navBar.contains(event.target) || menuToggle.contains(event.target);
        if (!isClickInside) {
            navBar.classList.remove('active');
        }
    });
});