<?php
include '../core/database.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:../html/login.php');
    exit();
}


$usersPerPage = 4;

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($current_page - 1) * $usersPerPage;

$query = "SELECT * FROM user_form LIMIT $offset, $usersPerPage";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$totalUsersQuery = "SELECT COUNT(*) as total FROM user_form";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalUsers = mysqli_fetch_assoc($totalUsersResult)['total'];

$totalPages = ceil($totalUsers / $usersPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="manage_users.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">

    <title>Manage Users | MO' BOOKS</title>
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
                    <a href="admin_page.php" rel="noopener noreferrer"> <input type="submit" name="submit"
                            class="btnDashboard" value="Dashboard"></a>
                </div>
                <div class="formGroup">
                    <a href="manage_books.php" rel="noopener noreferrer"><input type="submit" name="submit"
                            class="btnDashboard" value="Manage Books"></a>
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
                        <p>Manage Users.</p>
                        <div class="formGroup">
                            <a href="admin_page.php" rel="noopener noreferrer"> <input type="submit" name="submit"
                                    class="btnDashboard" value="Dashboard"></a>
                        </div>
                        <div class="formGroup">
                            <a href="manage_books.php" rel="noopener noreferrer"><input type="submit" name="submit"
                                    class="btnDashboard" value="Manage Books"></a>
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
                    <h1>Manage Users</h1>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['user_type']; ?>
                                </td>

                                <td>
                                    <a href="crud/delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination">
                        <?php
                        // Generate pagination links
                        for ($i = 1; $i <= $totalPages; $i++) {
                            $activeClass = ($i == $current_page) ? 'current-page' : '';
                            echo "<a class='page-link $activeClass' href='?page=$i'>$i</a>";
                        }
                        ?>
                    </div>

                </div>

        </div>
        </aside>
    </div>

    </div>
</body>

</html>