<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if ($_SESSION['role'] !== 'admin') {
    header('location:../user/home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delID']) && isset($_GET['table']) && isset($_GET['on'])) {
    $id = $_GET['delID'];
    $table = $_GET['table'];
    $on = $_GET['on'];

    $sql = "DELETE FROM $table WHERE $on='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: clubs.php');
        exit();
    } else {
        echo 'Error deleting club.';
    }
} else {
    echo 'Invalid request.';
}
?>
