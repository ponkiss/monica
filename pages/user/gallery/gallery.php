<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
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
    <title>Monica C. Crum - Gallery</title>
    <link rel="stylesheet" href="../assets/css/main.css">
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
        <div class="main-content">
            <h1>Gallery</h1>
            <form method="GET" action="gallery.php">
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
            <?php foreach ($images as $image): ?>
                <div class="gallery-item">
                    <img src="../assets/img/<?php echo $image['image']; ?>" alt="<?php echo $image['description']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
