<?php
include 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $SID = $_POST['StudentID'];
    $Name = $_POST['Name'];
    $ITID = isset($_POST['Item']) ? $_POST['Item'] : null;
    $QID = isset($_POST['Quantity']) ? $_POST['Quantity'] : null;
    $CID = $_POST['clubID'];

    $sql = "SELECT * FROM request";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $n = mysqli_num_rows($result);
        $sql = "INSERT INTO request(StudentID, Name, Item, Quantity, clubID) VALUES ('$SID', '$Name', '$ITID', '$QID', '$CID')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location:request.php');
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Request Form</title>
    <link rel="stylesheet" href="../css/pranu.css">
    <meta name="viewport" content="width=device,initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Request</div>
        <form action="request.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">StudentID</span>
                    <input type="text" placeholder="Enter your id" name="StudentID" required>
                </div>
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="Enter your name" name="Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Item required</span>
                    <input type="text" placeholder="Item required " name="Item" required>
                </div>
                <div class="input-box">
                    <span class="details">Quantity</span>
                    <input type="text" placeholder="Quantity" name="Quantity" required>
                </div>
                <div class="input-box">
                    <span class="details">ClubID</span>
                    <input type="text" placeholder="Club id " name='clubID' required>
                </div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
