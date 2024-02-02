<?php
// Include your database connection
require '../core/database.php';
header('Content-Type: application/json');

if (isset($_GET['query'])) {

    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);


    $sql = "SELECT id, title FROM books WHERE title LIKE '%$searchQuery%' LIMIT 5";


    $result = mysqli_query($conn, $sql);

    $suggestions = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $suggestions[] = array('id' => $row['id'], 'title' => $row['title']);
    }


    echo json_encode($suggestions);

    mysqli_free_result($result);
}

mysqli_close($conn);
?>