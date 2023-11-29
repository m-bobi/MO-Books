// ------------------------ SIGNUP VALIDATION

document.getElementById('signupForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (!email || !password || !confirmPassword) {
        alert('Please fill in all fields.');
    } else if (!isValidEmail(email)) {
        alert('Please enter a valid email address.');
    } else if (password !== confirmPassword) {
        alert('Passwords do not match.');
    } else {

        localStorage.setItem('accountCreated', true);
        localStorage.setItem('userEmail', email);
        // localStorage.setItem('username', email);

        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';

        setTimeout(function () {
            closePopup();
            document.getElementById('overlay').style.display = 'none';
            window.location.href = '/html/createAccount.html';
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