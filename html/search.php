<?php
require '../core/database.php';

if (isset($_GET['query']) && !empty(trim($_GET['query']))) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

    $sql = "SELECT * FROM books WHERE isbn LIKE '%$searchQuery%' OR title LIKE '%$searchQuery%' OR author LIKE '%$searchQuery%'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['isbn'] . ', ' . $row['title'] . ', ' . $row['author'] . '<br>';
        }
    } else {
        echo "No results found.";
    }

    mysqli_free_result($result);
} else {
    echo "Please enter a search query.";
}

mysqli_close($conn);
?>