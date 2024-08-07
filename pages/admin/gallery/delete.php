<?php
session_start();
include '../includes/config.php';
include '../includes/functions.php';
check_login($conn);

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM products WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: tienda.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
