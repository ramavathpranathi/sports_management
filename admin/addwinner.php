<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if ($_SESSION['role'] !== 'admin') {
    // If the user is not an admin, redirect them to a restricted access page or show an error message
    header('location:../user/home.php'); // Replace 'restricted.php' with the appropriate page
    exit();
}

// $EID=$_GET['updateID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $WID = $_POST['winner_ID'];
    $TID = $_POST['Team_ID'];
    $TName = $_POST['TeamName'];
    $CID = $_POST['CaptainID'];
    $EID=$_POST['EventID'];
 
   
    $sql = "SELECT * FROM winner WHERE winner_ID='$WID'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $n = mysqli_num_rows($result);
        if ($n > 0) {
            echo 'Winner Already exists';
        } else {
            $sql = "INSERT INTO winner (winner_ID, Team_ID, TeamName, CaptainID, points, EventID) VALUES ('$WID', '$TID', '$TName', '$CID', 0, '$EID')";
        
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "Data Inserted";
                header("location:winners.php"); // Change this to the appropriate page
            } else {
                die(mysqli_error($con));
                echo "Error";
            } 
        }
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Winner</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
</head>
<body>
    <section class="container">
        <header>Add Winner</header>
        <form method="post" class="form">
            <div class="column">
                <div class="input-box">
                    <label>Winner ID</label>
                    <input type="text" placeholder="Enter Winner ID" name="winner_ID" required />
                </div>
                <div class="input-box">
                    <label>Team ID</label>
                    <input type="text" placeholder="Enter Team ID" name="Team_ID" required />
                </div>
                <div class="input-box">
                    <label>Team Name</label>
                    <input type="text" placeholder="Enter Team Name" name="TeamName" required />
                </div>
                <div class="input-box">
                    <label>Event ID</label>
                    <input type="text" placeholder="Enter Event ID" name="EventID" required />
                </div>

            </div>
            <div class="input-box">
                <label>Captain ID</label>
                <select name="CaptainID">
                    <?php
                    $sql = 'SELECT * FROM Students';
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['StudentID'];
                        echo '<option value="' . $id . '">' . $id . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="input-box">
                <label>Sport</label>
                <select name="SportID">
                    <?php
                    $sql = 'SELECT * FROM Sports';
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['SportID'];
                        echo '<option value="' . $id . '">' . $id . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Add</button>
        </form>
    </section>
</body>
</html>