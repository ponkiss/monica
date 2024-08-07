<nav>
    <div class="menu">
        <a href="gallery.php">Gallery</a>
        <a href="shop.php">Store</a>
    </div>
    <div class="logo">MONICA C. CRUM</div>
    <div class="menu">
        <a href="aboutme.php">About Me</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Sign Up</a>
        <?php endif; ?>
    </div>
</nav>