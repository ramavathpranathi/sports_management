<?php
session_start();

include 'connect.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $SID = $_POST['SportsID'];
    $T1 = $_POST['Team1'];

    $sql = "SELECT * FROM schedule WHERE SportID='$SID' AND TeamID='$T1'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $n = mysqli_num_rows($result);
        if ($n > 0) {
            $_SESSION['schedule_data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
            header('location: scheduleResult.php');
            exit();
        } else {
            echo 'No schedule details found.';
        }
    }
} else {
    echo '';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Schedule Result</title>
    <link rel="stylesheet" href="../css/pranu.css">
    <meta name="viewport" content="width=device,initial-scale=1.0">
</head>

<body>
<div class="container">
    <div class="title">Schedule Result</div>

    <?php
    if (isset($_SESSION['schedule_data'])) {
        $scheduleData = $_SESSION['schedule_data'];

        echo '<table border="1">';
        echo '<tr><th>SportID</th><th>TeamID</th><th>Venue</th><th>Date</th><th>Time</th></tr>';
        foreach ($scheduleData as $row) {
            echo '<tr>';
            echo '<td>' . $row['SportID'] . '</td>';
            echo '<td>' . $row['TeamID'] . '</td>';
            echo '<td>' . $row['Venue'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td>' . $row['Time'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        unset($_SESSION['schedule_data']);
    } else {
        echo 'No schedule details found.';
    }
    ?>
</div>
</body>
</html>
