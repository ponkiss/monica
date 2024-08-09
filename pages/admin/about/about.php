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
    <title>About Me (Admin)</title>
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <a href="gallery.php">GALLERY</a>
                <a href="../shop/shop.php">STORE</a>
            </div>
            <div class="logo">
                <a href="../index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">
                <a href="about.php">ABOUT ME</a>
                <a href="../logout/logout.php">LOG OUT</a>
            </div>
        </nav>
    </header>
    <div class="parent-container">
        <div class="container">
            <div class="intro-content">
                <div class="intro-text">
                    <h1>About Me</h1>
                    <p>Hello! I’m Monica C. Crum, a passionate poet and writer. Writing is more than just a hobby for me; it is a deeply therapeutic practice that allows me to connect with my innermost thoughts and emotions. Each word I pen down is a reflection of my experiences, my struggles, and my triumphs.</p>
                    <p>Through poetry, I find a way to express the profound impact that certain events and moments have had on my day-to-day life. My poems capture the essence of what moves me, what inspires me, and what keeps me going even in the face of adversity. They are my way of making sense of the chaos, of finding beauty in the midst of pain, and of celebrating the small victories that often go unnoticed.</p>
                    <p>My first book, <em>Nena No More</em>, is a collection of dark poetry based on my life, my feelings, and my thoughts. It took me three years to write and is a deeply personal journey through my past.</p>
                    <p>I hope my writing will help others understand my thoughts better and see how I work through my experiences. Thank you for visiting my page!</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <nav>
            <div class="menu">
            </div>
            <div class="logo">
                <a>MONICA C. CRUM</a>
            </div>
            <div class="menu">
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
