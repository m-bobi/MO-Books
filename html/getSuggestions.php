<?php
// Include your database connection
require '../core/database.php';
header('Content-Type: application/json');

if (isset($_GET['query'])) {
    // Sanitize the user input
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

    // Construct SQL query to retrieve suggestions
    $sql = "SELECT id, title FROM books WHERE title LIKE '%$searchQuery%' LIMIT 5";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    $suggestions = array();
    // Fetch and store suggestions in an array of objects
    while ($row = mysqli_fetch_assoc($result)) {
        // Include both id and title in the suggestion array
        $suggestions[] = array('id' => $row['id'], 'title' => $row['title']);
    }

    // Output the suggestions in JSON format
    echo json_encode($suggestions);

    // Free the result set
    mysqli_free_result($result);
}

// Close the database connection
mysqli_close($conn);
?>
