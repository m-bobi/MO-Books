<?php

function deleteBook($isbn)
{
    global $conn;

    // Sanitize the input
    $isbn = mysqli_real_escape_string($conn, $isbn);

    // Delete the book from the books table
    $deleteQuery = "DELETE FROM books WHERE isbn = '$isbn'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Book deleted successfully
        header("Location: manage_books.php");
        exit();
    } else {
        // Failed to delete the book
        echo "Failed to delete the book: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
