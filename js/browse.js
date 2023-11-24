// ---------------------------- THIS IS NAVBAR RESPONSIVENESS

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

// -------------------------- THIS IS FOR CAROUSEL (slider)

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
    setTimeout(carousel, 2000);
}


// ---------------------- ADD TO CART FUNCTIONALITY

function addToCart(productId, productName, productPrice, productImage) {
    // Get the cart data from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if the product is already in the cart
    const existingProduct = cart.find(item => item.id === productId);

    if (existingProduct) {
        // If the product is already in the cart, update the quantity
        existingProduct.quantity += 1;
    } else {
        // If the product is not in the cart, add it
        const newProduct = {
            id: productId,
            name: productName,
            price: productPrice,
            quantity: 1,
            image: productImage, // Add the image property
        };
        cart.push(newProduct);
    }

    // Save the updated cart data to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Product added to cart!');
}

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

