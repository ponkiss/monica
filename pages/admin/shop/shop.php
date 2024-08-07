<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monica C. Crum - Store</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <a href="gallery.php">Gallery</a>
                <a href="tienda.php">Store</a>
            </div>
            <div class="logo">
                <a href="index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">
                <a href="aboutme.php">About Me</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Store</h1>
        <div class="product">
            <img src="../assets/img/image.png" alt="Placeholder">
            <h3>Placeholder Product</h3>
            <p>$40.00</p>
            <button>Edit</button>
            <button>Delete</button>
        </div>
        <div class="container">
            <h2>Add New Product</h2>
            <form action="insert.php" method="POST">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" required>
                <label for="price">Price:</label>
                <input type="text" name="price" id="price" required>
                <label for="image">Image URL:</label>
                <input type="text" name="image" id="image" required>
                <button type="submit">Add Product</button>
            </form>
        </div>
    </div>
</body>
</html>
