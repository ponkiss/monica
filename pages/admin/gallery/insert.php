<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
check_login($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    
    $query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: tienda.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
