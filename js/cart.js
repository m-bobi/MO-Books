// ------------------------------------ THIS IS NAVBAR RESPONSIVENESS

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

// -------------------------------------- THIS IS FOR CART UPDATES

document.addEventListener('DOMContentLoaded', function () {
    updateCartDisplay();
});

function updateCartDisplay() {

    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartContainer = document.getElementById('cart-container');

    // Clear the existing content in the cart container
    cartContainer.innerHTML = '';

    // Iterate through each item in the cart and update the display
    cart.forEach(item => {
        const productElement = document.createElement('div');
        productElement.classList.add('product');
        productElement.innerHTML = `
            <div class="product-image">
                <img src="${item.image}">
            </div>
            <div class="product-details">
                <div class="product-title">${item.name}</div>
                <p class="product-description">Quantity: ${item.quantity}</p>
            </div>
            <div class="product-price">${item.price}</div>
            <div class="product-quantity">
                <button class="quantity-btn" data-type="minus" data-product-id="${item.id}">-</button>
                <input type="number" value="${item.quantity}" min="1" data-product-id="${item.id}">
                <button class="quantity-btn" data-type="plus" data-product-id="${item.id}">+</button>
            </div>
            <div class="product-removal">
                <button class="remove-product" data-product-id="${item.id}">
                    Remove
                </button>
            </div>
            <div class="product-line-price">${(item.price * item.quantity).toFixed(2)}</div>
        `;
        cartContainer.appendChild(productElement);

        const minusButton = productElement.querySelector('.product-quantity .quantity-btn[data-type="minus"]');
        const plusButton = productElement.querySelector('.product-quantity .quantity-btn[data-type="plus"]');

        minusButton.addEventListener('click', function () {
            updateQuantity(item.id, item.quantity - 1);
        });

        plusButton.addEventListener('click', function () {
            updateQuantity(item.id, item.quantity + 1);
        });

        const removeButton = productElement.querySelector('.remove-product');
        removeButton.addEventListener('click', function () {
            const productIndex = cart.findIndex(product => product.id === item.id);
            cart.splice(productIndex, 1);
            cartContainer.removeChild(productElement);
            updateTotalPrice();
            localStorage.setItem('cart', JSON.stringify(cart));
        });
    });

    updateTotalPrice();
}

function updateQuantity(productId, newQuantity) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const productToUpdate = cart.find(item => item.id === productId);

    if (productToUpdate) {
        productToUpdate.quantity = newQuantity;

        if (productToUpdate.quantity < 0) {
            alert("You can't go below 0!");
        } else {
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        }
    }
}

function updateTotalPrice() {
    const totalPriceElement = document.getElementById('total-price');
    const totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);
    totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
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
