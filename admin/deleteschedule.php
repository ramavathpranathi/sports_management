<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if ($_SESSION['role'] !== 'admin') {
    // If the user is not an admin, redirect them to a restricted access page or show an error message
    header('location:../user/home.php'); // Replace 'restricted.php' with the appropriate page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delID'])) {
    $id = $_GET['delID'];

    $sql = "DELETE FROM schedule WHERE SportID = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "schedule deleted successfully.";
    } else {
        echo "Error deleting schedule: " . mysqli_error($con);
    }
}

// Redirect to the feedback page after deleting
header('location:schedule.php');
exit();
?>
