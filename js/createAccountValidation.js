// -------------------- CREATE ACCOUNT VALIDATION

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();
        const username = document.querySelector('.formInput').value;
        localStorage.setItem('username', username);
        localStorage.setItem('accountCreated', true);
        window.location.href = '/home.html';
    });
});
