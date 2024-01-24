<?php
// require 'insertLog.php';

function deleteBook($isbn)
{
    global $conn;

    // Sanitize the input
    $isbn = mysqli_real_escape_string($conn, $isbn);

    // Get book details before deletion
    $bookDetailsQuery = "SELECT title, author FROM books WHERE isbn = '$isbn'";
    $bookDetailsResult = mysqli_query($conn, $bookDetailsQuery);
    $bookDetails = mysqli_fetch_assoc($bookDetailsResult);

    // Delete the book from the books table
    $deleteQuery = "DELETE FROM books WHERE isbn = '$isbn'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Book deleted successfully
        $bookTitle = $bookDetails['title'];
        $bookAuthor = $bookDetails['author'];
        $adminName = $_SESSION['admin_name'];
        $action = "Deleted book: $bookTitle by $bookAuthor";
        insertLog($adminName, $action);

        header("Location: manage_books.php");
        exit();
    } else {
        // Failed to delete the book
        echo "Failed to delete the book: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>