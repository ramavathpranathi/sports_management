<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}

$username = $_SESSION['username'];

if ($_SESSION['role'] !== 'admin') {
    header('location:../user/home.php');
    exit();
}

if (isset($_GET['delID'])) {
    $id = $_GET['delID'];
    $table = $_GET['table'];
    
    if (isset($_GET['on'])) {
        $on = $_GET['on'];
    } else {
        // Handle the case when 'on' is not set, for example, redirect or show an error message.
        // For now, I'll set a default value as an example.
        $on = 'id'; // Replace with your actual default value or handle it appropriately.
    }
    
    $sql = "DELETE FROM $table WHERE `$on` = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:' . $table . '.php');
        exit();
    } else {
        die(mysqli_error($con));
    }
}
?>
