<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">


    <title>Login | MO' BOOKS</title>

</head>

<body>
    <div class="container">
        <div class="sectionWhite">
            <aside class="sections">
                <div class="sectionLeft">
                    <div class="leftText">
                        <h2>Welcome!</h2>
                        <p>Don't have an account?</p>
                        <a href="signup.html" rel="noopener noreferrer">
                            <input type="button" class="btnSignup" value="Sign up">
                        </a>
                    </div>
                </div>

                <div class="sectionRight">
                    <form action="" method="POST" id="loginForm">
                        <h1>Sign in</h1>
                        <div class="formGroup">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" class="formInput" id="email" placeholder="E-mail" required>
                        </div>
                        <div class="formGroup">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="formInput" id="password"
                                placeholder="Password" required minlength="8">
                        </div>
                        <div class="formGroup">
                            <input type="submit" class="btnLogin" value="Continue">
                        </div>
                        <div class="formGroup">
                            <p class="createAccountLink">Don't have an Account? <a href="signup.php"
                                    rel="noopener noreferrer">Sign Up</a></p>
                        </div>
                    </form>
                </div>

            </aside>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>You've successfully logged in!</h2>
        </div>
    </div>
    </div>
    <script src="../js/loginValidation.js" defer></script>
</body>

</html>