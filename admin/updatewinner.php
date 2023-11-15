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

$winnerID = $_GET['updateID'];
$sql = "SELECT * FROM Winner WHERE WinnerID=$winnerID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$teamID = $row['TeamID'];
$teamName = $row['TeamName'];
$captainID = $row['CaptainID'];
$points = $row['Points'];
$eventID = $row['EventID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $teamID = $_POST['TeamID'];
    $teamName = $_POST['TeamName'];
    $captainID = $_POST['CaptainID'];
    $points = $_POST['Points'];
    $eventID = $_POST['EventID'];

    $sql = "UPDATE Winner SET TeamID='$teamID', TeamName='$teamName', CaptainID=$captainID, Points=$points, EventID=$eventID WHERE WinnerID=$winnerID";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:winners.php'); // Assuming winners.php is the appropriate page
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Update Winner</title>
    <link rel="stylesheet" href="../css/signup.css"/>
</head>
<body>
<section class="container">
    <header>Update Winner</header>
    <form method="post" class="form">
        <div class="input-box">
            <label>WinnerID</label>
            <input type="text" placeholder="Winner ID" name="WinnerID" value=<?php echo $winnerID ?> readonly/>
        </div>

        <div class="input-box">
            <label>TeamID</label>
            <input type="text" placeholder="Team ID" name="TeamID" value=<?php echo $teamID ?> required/>
        </div>

        <div class="input-box">
            <label>Team Name</label>
            <input type="text" placeholder="Team Name" name="TeamName" value=<?php echo $teamName ?> required/>
        </div>

        <div class="input-box">
            <label>CaptainID</label>
            <input type="text" placeholder="Captain ID" name="CaptainID" value=<?php echo $captainID ?> required/>
        </div>

        <div class="input-box">
            <label>Points</label>
            <input type="text" placeholder="Points" name="Points" value=<?php echo $points ?> required/>
        </div>

        <div class="input-box">
            <label>EventID</label>
            <input type="text" placeholder="Event ID" name="EventID" value=<?php echo $eventID ?> required/>
        </div>

        <button>Update</button>
    </form>
</section>
</body>
</html>
