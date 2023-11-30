<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';
    $SID = $_POST['SportsID'];
    $T1 = $_POST['Team1'];

    $sql = "SELECT * FROM schedule WHERE SportID='$SID' AND TeamID='$T1'";
    $result = mysqli_query($con, $sql);
    
    if ($result){
        $n = mysqli_num_rows($result);
        if ($n > 0){
            $_SESSION['schedule_data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
            header('location: scheduleResult.php');
            exit();
        } else {
            echo 'No schedule details found.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>ScheduleDetails</title>
    <link rel="stylesheet" href="../css/pranu.css">
    <meta name="viewport"content="width=device,initial-scale=1.0">
</head>

<body>
<div class="container">
    <div class="title">ScheduleDetails</div>
    <form action="scheduleResult.php" method="post">
        <div class="user-details">
            <div class="input-box">
                <span class="details">SportsID</span>
                <input type="text" placeholder="Enter Sports ID" name="SportsID" required>  
            </div> 
            <div class="input-box">
                <span class="details">Team ID</span>
                <input type="number" placeholder="Enter Team ID" name="Team1" required>  
            </div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
