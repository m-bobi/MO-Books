function openProduct(i) {
    var images = document.querySelectorAll('.product-image');
    var targetImage;

    images.forEach(function (image) {
        if (image.getAttribute('item-data') === i) {
            targetImage = image.querySelector('img').getAttribute('src');
        }
    });

    var lbi = document.querySelector('.lightbox-blanket .product-image img');
    lbi.src = targetImage;

    var lightbox = document.querySelector('.lightbox-blanket');
    lightbox.style.display = (lightbox.style.display === 'block') ? 'none' : 'block';

    document.getElementById('product-quantity-input').value = '0';
    calcPrice(0);
}

function goBack() {
    var lightbox = document.querySelector('.lightbox-blanket');
    lightbox.style.display = 'none';
}

function calcPrice(qty) {
    var price = parseFloat(document.querySelector('.product-price').getAttribute('price-data'));
    var total = (price * qty).toFixed(2);
    document.querySelector('.product-checkout-total-amount').textContent = total;
}

document.addEventListener('click', function (event) {
    if (event.target.classList.contains('product-quantity-subtract')) {
        var value = parseInt(document.getElementById('product-quantity-input').value) - 1;
        if (value < 0) value = 0;
        document.getElementById('product-quantity-input').value = value;
        calcPrice(value);
    }

    if (event.target.classList.contains('product-quantity-add')) {
        var value = parseInt(document.getElementById('product-quantity-input').value) + 1;
        document.getElementById('product-quantity-input').value = value;
        calcPrice(value);
    }
});

document.getElementById('product-quantity-input').addEventListener('blur', function (event) {
    var value = parseInt(document.getElementById('product-quantity-input').value);
    calcPrice(value);
});
// ... Previous code ...

function addToCart(e) {
    e.preventDefault();
    var qty = parseInt(document.getElementById('product-quantity-input').value);
    if (qty === 0) {
        return;
    }
    var toast = '<div class="toast toast-success">Added ' + qty + ' to cart.</div>';
    document.body.insertAdjacentHTML('beforeend', toast);
    setTimeout(function () {
        var toastElement = document.querySelector('.toast');
        toastElement.classList.add('toast-transition');
        toastElement.addEventListener('click', function () {
            toastElement.style.display = 'none';
        });
    }, 100);
    setTimeout(function () {
        var toastElement = document.querySelector('.toast');
        toastElement.style.display = 'none';
        toastElement.parentNode.removeChild(toastElement);
    }, 3500);
}
    
