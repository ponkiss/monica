<?php
session_start();
include '../../../includes/config.php';
include '../../../includes/functions.php';
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store (Admin)</title>
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <a href="../gallery/gallery.php">GALLERY</a>
                <a href="shop.php">STORE</a>
            </div>
            <div class="logo">
                <a href="../index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">
                <a href="../about/about.php">ABOUT ME</a>
                <a href="../logout/logout.php">LOG OUT</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="shop-grid">
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 1">
                <h3>Product 1</h3>
                <p>$29.99</p>
                <a href="https://www.amazon.com/s?k=Product+1"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 2">
                <h3>Product 2</h3>
                <p>$39.99</p>
                <a href="https://www.amazon.com/s?k=Product+2"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 3">
                <h3>Product 3</h3>
                <p>$49.99</p>
                <a href="https://www.amazon.com/s?k=Product+3"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 3">
                <h3>Product 3</h3>
                <p>$49.99</p>
                <a href="https://www.amazon.com/s?k=Product+3"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 3">
                <h3>Product 3</h3>
                <p>$49.99</p>
                <a href="https://www.amazon.com/s?k=Product+3"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 3">
                <h3>Product 3</h3>
                <p>$49.99</p>
                <a href="https://www.amazon.com/s?k=Product+3"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 3">
                <h3>Product 3</h3>
                <p>$49.99</p>
                <a href="https://www.amazon.com/s?k=Product+3"><button>Buy now!</button></a>
            </div>
            <div class="shop-item">
                <img src="https://placehold.co/600x400" alt="Product 3">
                <h3>Product 3</h3>
                <p>$49.99</p>
                <a href="https://www.amazon.com/s?k=Product+3"><button>Buy now!</button></a>
            </div>
            <!-- Add more items as needed -->
        </section>
    </main>

    <footer>
        <nav>
            <div class="menu"></div>
            <div class="logo">
                <a>MONICA C. CRUM</a>
            </div>
            <div class="menu"></div>
        </nav>
    </footer>

    <div id="contact-bubble" class="contact-bubble">
        <i class="fas fa-envelope"></i>
    </div>
    <div id="contact-modal" class="contact-modal">
        <div class="contact-modal-content">
            <span class="close-button">x</span>
            <h2>Contact Me</h2>
            <p>Email: monicaccrum@gmail.com</p>
        </div>
    </div>
    <div id="logout-modal" class="contact-modal">
        <div class="contact-modal-content">
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to log out?</p>
            <div class="button-group">
                <button id="confirm-logout" class="confirm-button">Yes, log me out</button>
                <button id="cancel-logout" class="cancel-button">Cancel</button>
            </div>

        </div>
    </div>
    <script src="../../../assets/js/main.js"></script>
</body>
</html>
