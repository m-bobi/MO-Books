document.addEventListener('DOMContentLoaded', function () {
    const showButtons = document.querySelectorAll('.show');
    const hideButtons = document.querySelectorAll('.hide');

    showButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const productBox = this.closest('.product-wrap').querySelector('.product-box');
            if (productBox) {
                productBox.style.display = 'block';
                productBox.style.opacity = '1';
                productBox.style.transition = 'opacity 0.5s';
            }
            return false;
        });
    });

    hideButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const productBox = this.closest('.product-wrap').querySelector('.product-box');
            if (productBox) {
                productBox.style.opacity = '0';
                productBox.style.transition = 'opacity 0.5s';
                setTimeout(() => {
                    productBox.style.display = 'none';
                }, 500);
            }
            return false;
        });
    });
});

// -----------------------           Banner carousel

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
    x[slideIndex - 1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}


// --------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navBar = document.querySelector('.navBar');

    menuToggle.addEventListener('click', function () {
        navBar.classList.toggle('active');
    });

    // Close the navigation menu when a link is clicked
    const navLinks = document.querySelectorAll('.navBar a');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            navBar.classList.remove('active');
        });
    });

    // Close the navigation menu when clicking outside of it
    document.addEventListener('click', function (event) {
        const isClickInside = navBar.contains(event.target) || menuToggle.contains(event.target);
        if (!isClickInside) {
            navBar.classList.remove('active');
        }
    });
});
