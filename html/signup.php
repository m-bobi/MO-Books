<?php
session_start();
include '../core/database.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $confirmPassword = $_POST['confirmPassword'];


    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = "Hey! You already have an account!";
    } else {
        if (!password_verify($confirmPassword, $password)) {
            $error[] = "Passwords do not match!";
        } else {
            $user_type = 'user';
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES ('$name', '$email', '$password', '$user_type')";
            mysqli_query($conn, $insert);
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">


    <title>Sign up to MO' Books</title>



</head>

<body>
    <div class="container">
        <div class="sectionWhite">
            <aside class="sections">
                <div class="sectionLeft">
                    <div class="leftText">
                        <h2>Welcome Back!</h2>
                        <p>Already have an account?</p>

                        <a href="login.php" rel="noopener noreferrer">
                            <input type="button" class="btnSignup" value="Sign in">
                        </a>
                    </div>
                </div>

                <div class="sectionRight">
                    <form action="" method="POST" id="signupForm">
                        <h1>Sign Up</h1>
                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<span class="error-msg">' . $error . '</span>';
                            }
                        }
                        ?>
                        <div class="formGroup">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="formInput" id="name" placeholder="Name" required>
                        </div>

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
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="formInput" id="confirmPassword"
                                placeholder="Confirm Password" required minlength="8">
                        </div>

                        <div class="formGroup">
                            <input type="submit" name="submit" class="btnLogin" value="Continue">
                            <p class="createAccountLink">Already have an account? <a href="login.php"
                                    rel="noopener noreferrer">Sign in</a></p>
                        </div>
                    </form>

                </div>

            </aside>
        </div>
    </div>
    </div>
</body>

<!-- <script src="../js/signupValidation.js" defer></script> -->
</body>

</html>