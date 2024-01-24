<?php

session_start();

require '../core/database.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:../html/login.php');
    exit();
}


$query = "SELECT * FROM user_form";
$result = mysqli_query($conn, $query);

$queryBooks = "SELECT COUNT(*) AS totalBooks FROM books";
$resultBooks = mysqli_query($conn, $queryBooks);
$totalBooks = mysqli_fetch_assoc($resultBooks)['totalBooks'];

$queryLastModification = "SELECT last_modified_by, last_modified_at FROM books ORDER BY last_modified_at DESC LIMIT 1";
$resultLastModification = mysqli_query($conn, $queryLastModification);
$lastModification = mysqli_fetch_assoc($resultLastModification);

$queryLogs = "SELECT * FROM log ORDER BY timestamp DESC LIMIT 5";
$resultLogs = mysqli_query($conn, $queryLogs);
$logs = mysqli_fetch_all($resultLogs, MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="dashboard.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">

    <title>Admin Dashboard | MO' BOOKS</title>

</head>

<body>
    <div class="container">
        <div class="sectionWhite">

            <div class="navbar">
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
                    <a href="../main/home.php" rel="noopener noreferrer"><input type="submit" name="submit"
                            class="btnDashboard" value="Home"></a>
                </div>
                <div class="formGroup">
                    <a href="../core/logout.php" rel="noopener noreferrer"
                        onclick="return confirm('Are you sure you want to logout?')">
                        <input type="submit" name="submit" class="btnDashboard" value="Logout">
                    </a>
                </div>
            </div>

            <aside class="sections">
                <div class="sectionLeft">
                    <div class="leftText">
                        <h2>Welcome <span>
                                <?php echo $_SESSION['admin_name'] ?>
                            </span></h2>
                        <p>Manage your books and users.</p>
                        <div class="formGroup">
                            <a href="manage_books.php" rel="noopener noreferrer"> <input type="submit" name="submit"
                                    class="btnDashboard" value="Manage Books"></a>
                        </div>
                        <div class="formGroup">
                            <a href="manage-users.php" rel="noopener noreferrer"><input type="submit" name="submit"
                                    class="btnDashboard" value="Manage Users"></a>
                        </div>
                        <div class="formGroup">
                            <a href="../main/home.php" rel="noopener noreferrer"><input type="submit" name="submit"
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
                        <p>Total Books:
                            <?php echo $totalBooks; ?>
                        </p>

                        <h2>Last Book Modification</h2>
                        <p>Last Modified By:
                            <?php echo $lastModification['last_modified_by']; ?>
                        </p>
                        <p>Last Modified At:
                            <?php echo $lastModification['last_modified_at']; ?>
                        </p>

                        <h2>Recent Activity Logs</h2>
                        <ul class="activity-logs">
                            <?php foreach ($logs as $log): ?>
                                <li>
                                    <span class="log-action">
                                        <?php echo htmlspecialchars($log['action']); ?>
                                    </span>
                                    <span class="log-timestamp">
                                        <?php echo $log['timestamp']; ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>


                    </div>
                </div>

            </aside>
        </div>
    </div>
    </div>

</body>

</html>