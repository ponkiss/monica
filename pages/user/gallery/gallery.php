<?php
session_start();
include '../../../includes/config.php';
include '../../../includes/functions.php';
$user_data = check_login($conn);

// Fetch gallery images and tags
$tag_filter = isset($_GET['tag']) ? mysqli_real_escape_string($conn, $_GET['tag']) : '';
$query = "SELECT * FROM gallery" . ($tag_filter ? " WHERE tag='$tag_filter'" : "");
$result = mysqli_query($conn, $query);
$images = mysqli_fetch_all($result, MYSQLI_ASSOC);

$tags_query = "SELECT DISTINCT tag FROM gallery";
$tags_result = mysqli_query($conn, $tags_query);
$tags = mysqli_fetch_all($tags_result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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
                <a href="../about/about.php">ABOUT ME</a>
                <a href="../logout/logout.php">LOG OUT</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="shop-grid">
            <h1>Gallery</h1>
            <form method="GET" action="gallery.php" class="filter-form">
                <label for="tag">Filter by tag:</label>
                <select name="tag" id="tag" onchange="this.form.submit()">
                    <option value="">All</option>
                    <?php foreach ($tags as $tag): ?>
                        <option value="<?php echo $tag['tag']; ?>" <?php echo $tag_filter == $tag['tag'] ? 'selected' : ''; ?>>
                            <?php echo $tag['tag']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
            <div class="gallery-grid">
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="../assets/img/<?php echo $image['image']; ?>" alt="<?php echo $image['description']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
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
