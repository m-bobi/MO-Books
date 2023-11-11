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
