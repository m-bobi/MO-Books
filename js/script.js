// -----------------------     CAROUSEL (slider)

var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) { slideIndex = 1 }
    // x[slideIndex - 1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}


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
        // User has created an account, replace the user image
        // Assuming 'userImage' is the ID of the image element
        const userImage = document.getElementById('userImage');

        // Update the image source
        userImage.src = '/resources/logos/panda.png';

        // Apply styles to the userImage
        userImage.style.backgroundColor = '#C05A34';
        userImage.style.borderRadius = '60px';
        userImage.style.height = '60px';
        userImage.style.width = '60px';

    }
});
