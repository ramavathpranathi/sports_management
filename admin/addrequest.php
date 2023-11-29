<?php
include 'connect.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    // If the user is not an admin, redirect them to a restricted access page or show an error message
    header('location:../user/home.php'); // Replace 'restricted.php' with the appropriate page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission
    $SID = mysqli_real_escape_string($con, $_POST['StudentID']);
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Item = mysqli_real_escape_string($con, $_POST['Item']);
    $Quantity = mysqli_real_escape_string($con, $_POST['Quantity']);
    $ClubID = mysqli_real_escape_string($con, $_POST['ClubID']);

    // Assuming you have appropriate validation and sanitization here

    // Check if Quantity is numeric
    if (!is_numeric($Quantity)) {
        echo "Error: Quantity must be a number.";
        exit();
    }

    // Insert the request into the database
    $sql = "INSERT INTO request (StudentID, Name, Item, Quantity, ClubID) VALUES ('$SID', '$Name', '$Item', '$Quantity', '$ClubID')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Request added successfully.";
    } else {
        echo "Error adding request: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">

    <title>Add Request</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Add Request</h2>
        <form method="post">
            <!-- Your form fields go here -->
            <div class="mb-3">
                <label for="StudentID" class="form-label">StudentID</label>
                <input type="text" class="form-control" name="StudentID" required>
            </div>
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" name="Name" required>
            </div>
            <div class="mb-3">
                <label for="Item" class="form-label">Item</label>
                <input type="text" class="form-control" name="Item" required>
            </div>
            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" name="Quantity" required>
            </div>
            <div class="mb-3">
                <label for="ClubID" class="form-label">ClubID</label>
                <input type="text" class="form-control" name="ClubID" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
