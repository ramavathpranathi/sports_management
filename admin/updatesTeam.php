<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

$TID = $TName = $CID = $EID = $SID = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $sql = "SELECT * FROM teams WHERE EventID = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $TID = $row['Team_ID'];
            $TName = $row['TeamName'];
            $CID = $row['CaptainID'];
            $EID = $row['EventID'];
            $SID = $row['SportID'];

            // Additional queries to get names based on IDs
            $sql2 = "SELECT FirstName FROM Students WHERE StudentID = $CID";
            $r = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($r);
            $CName = $row2['FirstName'];

            $sql3 = "SELECT EventName FROM SportsEvents WHERE EventID = $EID";
            $r3 = mysqli_query($con, $sql3);
            $row3 = mysqli_fetch_assoc($r3);
            $EName = $row3['EventName'];

            $sql4 = "SELECT SportName FROM Sports WHERE SportID = $SID";
            $r4 = mysqli_query($con, $sql4);
            $row4 = mysqli_fetch_assoc($r4);
            $SName = $row4['SportName'];
        } else {
            echo "No data found for Team_ID: $id";
            exit();
        }
    } else {
        echo "Error fetching data: " . mysqli_error($con);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and update the database
    $TID = $_POST['Team_ID'];
    $TName = $_POST['TeamName'];
    $CID = $_POST['CaptainID'];
    $EID = $_POST['EventID'];
    $SID = $_POST['SportID'];

    $sql = "UPDATE teams
            SET TeamName = '$TName', CaptainID = $CID, EventID = $EID, SportID = $SID
            WHERE Team_ID = $TID";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data Updated";
        header('location:teams.php');
        exit();
    } else {
        echo "Error updating data: " . mysqli_error($con);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Team</title>
    <link rel="stylesheet" href="../css/signup.css" />
</head>

<body>
    <section class="container">
        <header>Update Team</header>
        <form method="post" class="form">
            <div class="column">
                <div class="input-box">
                    <label>Team ID</label>
                    <input type="text" placeholder="Enter Team ID" name="Team_ID" value="<?php echo $TID; ?>" readonly />
                </div>
                <div class="input-box">
                    <label>Team Name</label>
                    <input type="text" placeholder="Team Name" name="TeamName" value="<?php echo $TName; ?>" required />
                </div>
                <div class="input-box">
                    <label>Captain ID</label>
                    <input type="text" placeholder="Captain ID" name="CaptainID" value="<?php echo $CID; ?>" required />
                </div>
                <div class="input-box">
                    <label>Event ID</label>
                    <input type="text" placeholder="Event ID" name="EventID" value="<?php echo $EID; ?>" required />
                </div>
                <div class="input-box">
                    <label>Sport ID</label>
                    <input type="text" placeholder="Sport ID" name="SportID" value="<?php echo $SID; ?>" required />
                </div>
            </div>
            <button>Update</button>
        </form>
    </section>
</body>

</html>
