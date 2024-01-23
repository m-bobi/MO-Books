// -----------------------    NAVBAR RESPONSIVENESS

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navBar = document.querySelector('.navBar');

    menuToggle.addEventListener('click', function () {
        navBar.classList.toggle('active');
    });

    const navLinks = document.querySelectorAll('.navBar a');
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


// ---------------------- USER VALIDATION

document.addEventListener('DOMContentLoaded', function () {

    const accountCreated = localStorage.getItem('accountCreated');

    if (accountCreated === 'true') {

        const userImage = document.getElementById('userImage');


        userImage.src = '/resources/logos/panda.png';


        userImage.style.backgroundColor = '#C05A34';
        userImage.style.borderRadius = '60px';
        userImage.style.height = '60px';
        userImage.style.width = '60px';

    }
});