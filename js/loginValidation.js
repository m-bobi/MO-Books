document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;


    if (!email || !password) {

        alert('Please fill in both email and password.');
    } else if (!isValidEmail(email)) {

        alert('Please enter a valid email address.');
    } else {

        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';

        setTimeout(function () {
            closePopup();
            document.getElementById('overlay').style.display = 'none';
            window.location.href = '/home.html';
        }, 2000);
    }
});

function isValidEmail(email) {
    var emailRegex = /\S+@\S+\.\S+/;
    return emailRegex.test(email);
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

