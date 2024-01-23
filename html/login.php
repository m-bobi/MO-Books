<?php


include '../core/database.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? md5($_POST['confirmPassword']) : '';
    $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';



    $select = " SELECT * from  user_form where email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location: ../dashboard/admin_page.php');
        } else if ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location: ../home.php');
        }

    } else {
        $error[] = 'Invalid Credentials!';
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
                        <a href="signup.php" rel="noopener noreferrer">
                            <input type="button" class="btnSignup" value="Sign up">
                        </a>
                    </div>
                </div>

                <div class="sectionRight">
                    <form action="" method="POST" id="loginForm">
                        <h1>Sign in</h1>
                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<span class="error-msg">' . $error . '</span>';
                            }
                        }
                        ?>
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
                            <input type="submit" name="submit" class="btnLogin" value="Continue">
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
    </div>
    <!-- <script src="../js/loginValidation.js" defer></script> -->
</body>

</html>