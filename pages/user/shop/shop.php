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
        </div>
    </div>
</body>
</html>
