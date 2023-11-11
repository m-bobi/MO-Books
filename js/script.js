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


console.clear();

var slideDelay = 1500;
var slideDuration = 300;

var slides = document.querySelectorAll(".slide");
var prevButton = document.querySelector("#prevButton");
var nextButton = document.querySelector("#nextButton");

var numSlides = slides.length;

for (var i = 0; i < numSlides; i++) {
    slides[i].style.backgroundColor = "#" + (Math.random() * 0xffffff).toString(16).slice(0, 6);
    slides[i].style.left = i * 100 + "%";
}

var wrap = wrapPartial(-100, (numSlides - 1) * 100);
var timer;

var animation = TweenMax.to(slides, 1, {
    x: "+=" + (numSlides * 100) + "%",
    ease: Linear.easeNone,
    paused: true,
    repeat: -1,
    modifiers: {
        x: wrap
    }
});

var proxy = document.createElement("div");
proxy.style.transform = "translateX(0)";
var slideAnimation;
var transform;
var slideWidth = 0;
var wrapWidth = 0;
resize();

var isDragging = false;
var isThrowing = false;

document.querySelector(".slides-container").addEventListener("mousedown", function () {
    isDragging = true;
    isThrowing = false;
    timer && timer.restart(true);
    slideAnimation && slideAnimation.kill();
});

document.querySelector(".slides-container").addEventListener("mousemove", function () {
    if (isDragging) updateDraggable();
});

document.addEventListener("mouseup", function () {
    isDragging = false;
    if (isThrowing) {
        timer && timer.restart(true);
    } else {
        animateSlides(-1);
    }
});

function updateDraggable() {
    isDragging = true;
    isThrowing = false;
    timer && timer.restart(true);
    slideAnimation && slideAnimation.kill();
}

function animateSlides(direction) {
    timer && timer.restart(true);
    slideAnimation && slideAnimation.kill();
    var x = snapX(transform.x + direction * slideWidth);
    slideAnimation = TweenLite.to(proxy, slideDuration / 1000, {
        x: x,
        onUpdate: updateProgress
    });
}

function autoPlay() {
    if (isDragging || isThrowing) {
        timer && timer.restart(true);
    } else {
        animateSlides(-1);
    }
}

function updateProgress() {
    animation.progress(transform.x / wrapWidth);
}

function snapX(x) {
    return Math.round(x / slideWidth) * slideWidth;
}

function resize() {
    var norm = (transform.x / wrapWidth) || 0;
    slideWidth = slides[0].offsetWidth;
    wrapWidth = slideWidth * numSlides;
    proxy.style.transform = "translateX(" + (norm * wrapWidth) + "px)";
    animateSlides(0);
    slideAnimation && slideAnimation.progress(1);
}

function wrapPartial(min, max) {
    var r = max - min;
    return function (value) {
        var v = value - min;
        return ((r + (v % r)) % r) + min;
    };
}

prevButton.addEventListener("click", function () {
    animateSlides(1);
});

nextButton.addEventListener("click", function () {
    animateSlides(-1);
});

