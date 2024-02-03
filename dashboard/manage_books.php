<?php
session_start();

require '../core/database.php';
require 'crud/addBook.php';
require 'crud/deleteBook.php';
require 'crud/updateBook.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:../html/login.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['book_id'], $_POST['new_title'], $_POST['new_author'])) {
        updateBook($_POST['book_id'], $_POST['new_title'], $_POST['new_author'], $_SESSION['admin_name']);
    }


    if (isset($_POST['add_book'])) {
        addBook($_POST['new_title'], $_POST['new_author'], $_POST['new_description'], $_POST['new_price'], $_POST['new_genre'], $_POST['new_publication_year'], $_POST['new_isbn'], $_FILES['new_coverimage'], $_SESSION['admin_name']);
    }

    if (isset($_POST['delete_book'])) {
        deleteBook($_POST['book_isbn']);
    }

}


$queryBooks = "SELECT * FROM books";
$resultBooks = mysqli_query($conn, $queryBooks);
$books = mysqli_fetch_all($resultBooks, MYSQLI_ASSOC);

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="manage_books.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">

    <title>Manage Books | MO' BOOKS</title>
</head>

<body>
    <div class="container">
        <div class="sectionWhite">
            <div class="navbar">
                <h2>Welcome <span>
                        <?php echo $_SESSION['admin_name'] ?>
                    </span></h2>
                <p>Manage your books and users.</p>
                <div class="formGroup">
                    <a href="manage_books.php" rel="noopener noreferrer"> <input type="submit" name="submit"
                            class="btnDashboard" value="Manage Books"></a>
                </div>
                <div class="formGroup">
                    <a href="manage_users.php" rel="noopener noreferrer"><input type="submit" name="submit"
                            class="btnDashboard" value="Manage Users"></a>
                </div>
                <div class="formGroup">
                    <a href="../main/home.php" rel="noopener noreferrer"><input type="submit" name="submit"
                            class="btnDashboard" value="Home"></a>
                </div>
                <div class="formGroup">
                    <a href="../core/logout.php" rel="noopener noreferrer"
                        onclick="return confirm('Are you sure you want to logout?')">
                        <input type="submit" name="submit" class="btnDashboard" value="Logout">
                    </a>
                </div>
            </div>

            <aside class="sections">
                <div class="sectionLeft">
                    <div class="leftText">
                        <h2>Welcome <span>
                                <?php echo $_SESSION['admin_name'] ?>
                            </span></h2>
                        <p>Manage your books and users.</p>
                        <div class="formGroup">
                            <a href="admin_page.php" rel="noopener noreferrer"> <input type="submit" name="submit"
                                    class="btnDashboard" value="Dashboard"></a>
                        </div>
                        <div class="formGroup">
                            <a href="manage-users.php" rel="noopener noreferrer"><input type="submit" name="submit"
                                    class="btnDashboard" value="Manage Users"></a>
                        </div>
                        <div class="formGroup">
                            <a href="../main/home.php" rel="noopener noreferrer"><input type="submit" name="submit"
                                    class="btnDashboard" value="Home"></a>
                        </div>
                        <div class="formGroup">
                            <a href="../core/logout.php" rel="noopener noreferrer"
                                onclick="return confirm('Are you sure you want to logout?')">
                                <input type="submit" name="submit" class="btnDashboard" value="Logout">
                            </a>
                        </div>

                    </div>
                </div>

                <div class="sectionRight">
                    <h1>Manage Books</h1>
                    <div class="bookList">
                        <?php foreach ($books as $book): ?>
                            <div class="book">
                                <h2>
                                    <?php echo $book['title']; ?>
                                </h2>
                                <p>
                                    <?php echo $book['author']; ?>
                                </p>

                                <form method="post" action="">
                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <input type="text" name="new_title" placeholder="New Title" required>
                                    <input type="text" name="new_author" placeholder="New Author" required>
                                    <input type="submit" name="submit" class="btnUpdate" value="Update">
                                </form>

                                <form method="post" action="">

                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <input type="hidden" name="book_isbn" value="<?php echo $book['isbn']; ?>">

                                    <input type="submit" name="delete_book" class="btnUpdate" value="Delete"
                                        onclick="return confirm('Are you sure you want to delete?')">
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </aside>
        <div class="newBookSection">
            <form class="newBook" method="post" action="" enctype="multipart/form-data">
                <h2>Add New Book</h2>
                <label for="new_title">Title:</label>
                <input type="text" name="new_title" required>

                <label for="new_author">Author:</label>
                <input type="text" name="new_author">

                <label for="new_description">Description:</label>
                <input type="text" name="new_description">

                <label for="new_price">Price:</label>
                <input type="text" name="new_price">

                <label for="new_genre">Genre:</label>
                <input type="text" name="new_genre">

                <label for="new_publication_year">Publication Year:</label>
                <input type="text" name="new_publication_year">

                <label for="new_isbn">ISBN:</label>
                <input type="text" name="new_isbn">

                <label for="new_coverimage">Cover Image:</label>
                <input type="file" name="new_coverimage" accept="image/*" class="btnUpdate">

                <input type="submit" name="add_book" class="btnUpdate" value="Add Book">
            </form>

        </div>
        </div>

    </div>
</body>

</html>