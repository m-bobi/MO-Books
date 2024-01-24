<?php

function updateBook($bookId, $newTitle, $newAuthor, $adminName)
{
    global $conn;

    $updateQuery = "UPDATE books
                    SET title = '$newTitle',
                        author = '$newAuthor',
                        last_modified_by = '$adminName',
                        last_modified_at = NOW()
                    WHERE id = $bookId";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $insertUpdateQuery = "INSERT INTO book_updates (book_id, updated_by)
                              VALUES ($bookId, '$adminName')";
        $insertUpdateResult = mysqli_query($conn, $insertUpdateQuery);

        if ($insertUpdateResult) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>