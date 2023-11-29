// ------------ LOGIN VALIDATION

document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const storedEmail = localStorage.getItem('userEmail');
    const enteredEmail = document.getElementById('email').value;
    const accountCreated = localStorage.getItem('accountCreated');

    if (accountCreated === null || accountCreated === 'false') {
        alert("Please sign up first!");
    } else if (enteredEmail !== storedEmail) {
        alert('Invalid email. Please enter the correct email address.');
    } else {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (!email || !password) {
            alert('Please fill in both email and password.');
        } else if (!isValidEmail(email)) {
            alert('Please enter a valid email address.');
        } else {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';

            if (enteredEmail === storedEmail) {
                localStorage.setItem('accountCreated', 'true');
            } else {
                localStorage.setItem('accountCreated', 'false');
            }


            setTimeout(function () {
                closePopup();
                document.getElementById('overlay').style.display = 'none';
                window.location.href = '/home.html';
            }, 2000);
        }
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
