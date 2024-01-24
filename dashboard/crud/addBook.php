<?php

function addBook($title, $author, $description, $price, $genre, $publicationYear, $isbn, $coverImage, $adminName)
{
    global $conn;

    $targetDirectory = "../resources/";
    $targetFile = $targetDirectory . basename($coverImage["name"]);
    move_uploaded_file($coverImage["tmp_name"], $targetFile);

    $insertQuery = "INSERT INTO books (title, author, description, price, genre, publication_year, isbn, cover_image, created_at, last_modified_by, last_modified_at)
                    VALUES ('$title', '$author', '$description', '$price', '$genre', '$publicationYear', '$isbn', '$targetFile', NOW(), '$adminName', NOW())";

    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        return true;
    } else {
        return false;
    }
}
?>