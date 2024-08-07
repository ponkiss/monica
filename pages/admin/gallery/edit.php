<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
check_login($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    
    $query = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: tienda.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
