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

$id = $_GET['updateID'];
$sql = "SELECT * FROM schedule WHERE SportID = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$SID = $row['SportID'];
$TID = $row['TeamID'];
$VID = $row['Venue'];
$DID = $row['Date'];
$TTID = $row['Time'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SID = $_POST['SportID'];
    $TID = $_POST['TeamID'];
    $VID = $_POST['Venue'];
    $DID = $_POST['Date'];
    $TTID = $_POST['Time'];

    $sql = "UPDATE schedule
            SET SportID='$SID', TeamID='$TID', Venue='$VID', Date='$DID', Time='$TTID'
            WHERE SportID='$id'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data Updated";
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
    <title>Edit Schedule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Edit Schedule</h2>
    <form method="post">
        <div class="mb-3">
            <label for="SportID" class="form-label">Sport ID</label>
            <input type="text" class="form-control" id="SportID" name="SportID" value="<?php echo $SID; ?>" required>
        </div>
        <div class="mb-3">
            <label for="TeamID" class="form-label">Team ID</label>
            <input type="text" class="form-control" id="TeamID" name="TeamID" value="<?php echo $TID; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Venue" class="form-label">Venue</label>
            <input type="text" class="form-control" id="Venue" name="Venue" value="<?php echo $VID; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Date" class="form-label">Date</label>
            <input type="date" class="form-control" id="Date" name="Date" value="<?php echo $DID; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Time" class="form-label">Time</label>
            <input type="time" class="form-control" id="Time" name="Time" value="<?php echo $TTID; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
</div>

</body>
</html>
