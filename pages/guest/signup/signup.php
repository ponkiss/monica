<?php
session_start();
include '../../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: ../login/login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monica C. Crum | Sign Up</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <a href="gallery.php">GALLERY</a>
                <a href="tienda.php">STORE</a>
            </div>
            <div class="logo">
                <a href="../../../index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">
                <a href="../about/about.php">ABOUT ME</a>
                <a href="../login/login.php">LOG IN</a>
            </div>
        </nav>
    </header>
    <div class="parent-container">
        <div class="container3">
            <h2>Create New Account</h2>
            <p>Already Registered? <a href="Normal/../../login/login.php">Login</a></p>
            <form action="signup.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <footer>
        <nav>
            <div class="menu">
                <a href="gallery.php">PRIVACY</a>
                <a href="shop.php">CREDITS</a>
            </div>
            <div class="logo">
                <a href="index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">
                <a href="aboutme.php">INQUIRIES</a>
                <a href="login.php">MORE</a>
            </div>
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
    <script src="../../../assets/js/main.js"></script>
</body>
</html>
