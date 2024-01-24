<?php

function insertLog($admin_name, $action, $book_id = null)
{
    global $conn;

    $action = mysqli_real_escape_string($conn, $action);
    $book_id = (int) $book_id;

    $query = "INSERT INTO log (admin_name, action, book_id) VALUES ('$admin_name', '$action', $book_id)";
    mysqli_query($conn, $query);
}

?>
