<?php

session_start();

require '../core/database.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:../html/login.php');
    exit();
}


$query = "SELECT * FROM user_form";
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}


$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">

    <title>Admin Dashboard | MO' BOOKS</title>

</head>

<body>
    <div class="container">
        <div class="sectionWhite">
            <aside class="sections">
                <div class="sectionLeft">
                    <div class="leftText">
                        <h2>Welcome <span>
                                <?php echo $_SESSION['admin_name'] ?>
                            </span></h2>
                        <p>Manage your books and users.</p>
                        <div class="formGroup">
                            <a href="manage-books.php" rel="noopener noreferrer"> <input type="submit" name="submit"
                                    class="btnDashboard" value="Manage Books"></a>
                        </div>
                        <div class="formGroup">
                            <a href="manage-users.php" rel="noopener noreferrer"><input type="submit" name="submit"
                                    class="btnDashboard" value="Manage Users"></a>
                        </div>
                        <div class="formGroup">
                            <a href="../home.php" rel="noopener noreferrer"><input type="submit" name="submit"
                                    class="btnDashboard" value="Home"></a>
                        </div>
                        <div class="formGroup">
                            <a href="../core/logout.php" rel="noopener noreferrer"
                                onclick="return confirm('Are you sure you want to logout?')">
                                <input type="submit" name="submit" class="btnDashboard" value="Logout">
                            </a>
                        </div>

                    </div>
                </div>

                <div class="sectionRight">
                    <h1>Admin Dashboard</h1>

                    <div class="dashboardContent">
                        <h2>Dashboard Statistics</h2>
                        <p>Total Users:
                            <?php echo count($users); ?>
                        </p>
                    </div>
                </div>

            </aside>
        </div>
    </div>
    </div>

</body>

</html>