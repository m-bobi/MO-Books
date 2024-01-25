<?php

function deleteBook($isbn)
{
    global $conn;

    $isbn = mysqli_real_escape_string($conn, $isbn);

    $bookDetailsQuery = "SELECT title, author FROM books WHERE isbn = '$isbn'";
    $bookDetailsResult = mysqli_query($conn, $bookDetailsQuery);
    $bookDetails = mysqli_fetch_assoc($bookDetailsResult);

    $deleteQuery = "DELETE FROM books WHERE isbn = '$isbn'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {

        $bookTitle = $bookDetails['title'];
        $bookAuthor = $bookDetails['author'];
        $adminName = $_SESSION['admin_name'];
        $action = "Deleted book: $bookTitle by $bookAuthor";
        insertLog($adminName, $action);

        header("Location: ../manage_books.php");
        exit();
    } else {

        echo "Failed to delete the book: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>