<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <a href="tienda.php">STORE</a>
            </div>
            <div class="logo">
                <a href="../../../index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">
                <a href="../about/about.php">ABOUT ME</a>
                <a href="login.php">LOG IN</a>
            </div>
        </nav>
    </header>
    <div class="parent-container">
        <div class="container3">
            <h2>Log In</h2>
        <form action="login_action.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Log In</button>
        </form>
        <p>Have no account? <a href="../signup/signup.php">Sign up here</a></p>
        </div>
    </div>
    <footer>
        <nav>
            <div class="menu">
            </div>
            <div class="logo">
                <a href="index.php">MONICA C. CRUM</a>
            </div>
            <div class="menu">

            </div>
        </nav>
    </footer>
    <script src="../../../assets/js/main.js"></script>
</body>
</html>
