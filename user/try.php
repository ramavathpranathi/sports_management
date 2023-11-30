<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if ($_SESSION['role'] !== 'admin') {
    header('location:../user/home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $CID = $_POST['ClubID'];

    $sql = "DELETE FROM Clubs WHERE ClubID='$CID'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data Deleted";
        header('location:clubs.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Club</title>
    <link rel="stylesheet" href="../css/signup.css" />
</head>
<body>
    <section class="container">
        <header>Delete Club</header>
        <form method="post" action="deleteclub.php" class="form">
            <!-- Add an input field for ClubID -->
            <input type="text" placeholder="Enter Club ID" name="ClubID" required />

            <button type="submit" name="delete">Delete</button>
        </form>
    </section>
</body>
</html>
