document.addEventListener('DOMContentLoaded', function () {
    var username = localStorage.getItem('username');
    if (username) {
        document.getElementById('username').value = username;
    }

    document.getElementById('popup').style.display = 'block';

    setTimeout(function () {
        closePopup();
    }, 2000);
});

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}