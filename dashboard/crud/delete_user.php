<?php
include '../../core/database.php';


if (isset($_GET['id'])) {
    $userId = $_GET['id'];


    $deleteQuery = "DELETE FROM user_form WHERE id = $userId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header('Location: ../manage_users.php');
        exit();
    } else {
        die("Delete operation failed: " . mysqli_error($conn));
    }
} else {
    header('Location: ../manage_users.php');
    exit();
}
?>