<?php
require 'insertLog.php';

function updateBook($book_id, $new_title, $new_author, $adminName)
{
    global $conn;

    $book_id = mysqli_real_escape_string($conn, $book_id);
    $new_title = mysqli_real_escape_string($conn, $new_title);
    $new_author = mysqli_real_escape_string($conn, $new_author);

    $bookDetailsQuery = "SELECT title, author FROM books WHERE id = '$book_id'";
    $bookDetailsResult = mysqli_query($conn, $bookDetailsQuery);
    $bookDetails = mysqli_fetch_assoc($bookDetailsResult);

    $updateQuery = "UPDATE books SET title = '$new_title', author = '$new_author' WHERE id = '$book_id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {

        $oldTitle = $bookDetails['title'];
        $oldAuthor = $bookDetails['author'];
        $action = "Updated book details: $oldTitle by $oldAuthor to $new_title by $new_author";
        insertLog($adminName, $action);

        header("Location: ../manage_books.php");
        exit();
    } else {

        echo "Failed to update the book: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>