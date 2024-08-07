<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../Normal/index.php");
    exit();
}

// Handle form submission for adding new images
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload_image'])) {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);
    $image = $_FILES['image']['name'];
    $target = "../assets/img/" . basename($image);
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
    $target = "../assets/img/" . $image;
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
    <title>Galería</title>
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
            <h1>Galería</h1>
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
                        <img src="../assets/img/<?php echo $image['image']; ?>" alt="<?php echo $image['description']; ?>">
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
        </div>
    <footer>
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
                <a href="login.php">Sign Up</a>
            </div>
        </nav>
    </footer>
</body>
</html>
