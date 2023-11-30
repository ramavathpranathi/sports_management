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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SID = $_POST['SportID'];
    $TID = $_POST['TeamID'];
    $VID = $_POST['Venue'];
    $DID = $_POST['Date'];
    $TTID = $_POST['Time'];

    $sql = "INSERT INTO schedule (SportID, TeamID, Venue, Date, Time) 
            VALUES ('$SID', '$TID', '$VID', '$DID', '$TTID')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data Inserted";
        header('location:schedule.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Add Schedule</h2>
    <form method="post">
        <div class="mb-3">
            <label for="SportID" class="form-label">Sport ID</label>
            <input type="text" class="form-control" id="SportID" name="SportID" required>
        </div>
        <div class="mb-3">
            <label for="TeamID" class="form-label">Team ID</label>
            <input type="text" class="form-control" id="TeamID" name="TeamID" required>
        </div>
        <div class="mb-3">
            <label for="Venue" class="form-label">Venue</label>
            <input type="text" class="form-control" id="Venue" name="Venue" required>
        </div>
        <div class="mb-3">
            <label for="Date" class="form-label">Date</label>
            <input type="date" class="form-control" id="Date" name="Date" required>
        </div>
        <div class="mb-3">
            <label for="Time" class="form-label">Time</label>
            <input type="time" class="form-control" id="Time" name="Time" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Schedule</button>
    </form>
</div>

</body>
</html>
