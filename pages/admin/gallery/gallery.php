<?php
session_start();
include '../../../includes/config.php';
include '../../../includes/functions.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../Normal/index.php");
    exit();
}

// Handle form submission for adding new images
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload_image'])) {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);
    $image = $_FILES['image']['name'];
    $target = "../../../assets/images/" . basename($image);
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageFileType, $allowed_types)) {
        $query = "INSERT INTO gallery (description, tag, image) VALUES ('$description', '$tag', '$image')";
        
        if (mysqli_query($conn, $query)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                header("Location: gallery.php");
                exit();
            } else {
                $msg = "Failed to upload image";
            }
        } else {
            $msg = "Failed to insert image data into database";
        }
    } else {
        $msg = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
    }
}

// Handle form submission for editing images
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_image'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);

    $query = "UPDATE gallery SET description='$description', tag='$tag' WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: gallery.php");
        exit();
    } else {
        $msg = "Failed to update image data";
    }
}

// Handle form submission for deleting images
if (isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    // Get image file name
    $query = "SELECT image FROM gallery WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];

    // Delete image file from server
    $target = "../../../assets/images/" . $image;
    if (file_exists($target)) {
        unlink($target);
    }

    // Delete image data from database
    $query = "DELETE FROM gallery WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: gallery.php");
        exit();
    } else {
        $msg = "Failed to delete image data";
    }
}

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
    <title>Gallery (Admin)</title>
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
            <?php if (isset($msg)) { echo "<p>$msg</p>"; } ?>
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
                        <images src="../../../assets/images/<?php echo $image['image']; ?>" alt="<?php echo $image['description']; ?>">
                        <div class="item-details">
                            <form method="POST" action="gallery.php">
                                <input type="hidden" name="id" value="<?php echo $image['id']; ?>">
                                <input type="text" name="description" value="<?php echo $image['description']; ?>" required>
                                <input type="text" name="tag" value="<?php echo $image['tag']; ?>" required>
                                <button type="submit" name="edit_image">Edit</button>
                            </form>
                            <form method="GET" action="gallery.php" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                <input type="hidden" name="delete_id" value="<?php echo $image['id']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </div>
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
