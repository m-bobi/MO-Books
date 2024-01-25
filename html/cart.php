function getUserRedirectUrl()
{
if (!isset($_SESSION['admin_name']) && !isset($_SESSION['user_name'])) {
return '../html/login.php';
}

if (isset($_SESSION['admin_name'])) {
return '../dashboard/admin_page.php';
} else {
return '../html/user.php';
}
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="shortcut icon" href="../resources/logos/books.png" type="image/x-icon">
    <title>Checkout | MO' BOOKS </title>
</head>

<body>
    <div class="container">
        <div class="sectionWhite">
            <header>
                <div class="searchBar">
                    <div class="logo-toggle">
                        <h1 class="logo">MO'</h1>
                        <div class="menu-toggle" id="menuToggle">&#9776;</div>
                    </div>
                    <input type="text" class="search" placeholder="Search for ISBN, name, author">
                    <div class="icons">
                        <a href="<?php echo getUserRedirectUrl(); ?>">
                            <img loading="lazy" src="../resources/logos/shopping.png" class="img-3" />
                        </a>
                        <a href="<?php echo getUserRedirectUrl(); ?>">
                            <img loading="lazy" src="../resources/logos/user.png" class="img-4" id="userImage" />
                        </a>
                    </div>
                </div>
                <hr class="div-8">
                </hr>
                <div class="navBar">
                    <a href="../home.php">HOME</a>
                    <a href="browse.php">BROWSE</a>
                    <a href="">NEW RELEASES</a>
                    <a href="contact.html">CONTACT</a>
                </div>
            </header>
            <hr class="div-8">
            </hr>

            <div class="div-9">SHOPPING CART</div>
            <div class="div-10"></div>
            <div class="shopping-cart">

                <div class="column-labels">
                    <label class="product-image">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-price">Price</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">REMOVE</label>
                    <label class="product-line-price">Total</label>
                </div>

                <div id="cart-container" class="column-labels">
                    <!-- Cart items will be displayed here -->
                </div>

                <div id="total-price"></div>

                <button class="checkout">Checkout</button>

            </div>

            <script src="../js/cart.js"></script>

</body>

</html>