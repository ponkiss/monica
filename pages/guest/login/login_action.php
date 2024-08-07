<?php
session_start();
include '../../../includes/config.php';
include '../../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $user_data = login($conn, $email, $password);

    if ($user_data) {
        $_SESSION['user_id'] = $user_data['user_id'];
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['role'] = $user_data['role'];
        if ($user_data['role'] == 'admin') {
            header("Location: ../../admin/index.php");
        } else {
            header("Location: ../../user/index.php");
        }
        die;
    } else {
        echo "Invalid email or password.";
    }
}
?>