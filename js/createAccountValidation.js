document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();
        const username = document.querySelector('.formInput').value;
        localStorage.setItem('username', username);
        window.location.href = '/home.html';
    });
});
