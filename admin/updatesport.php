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

$SID = $SName = $AQuantity = $CID = ''; // Initialize variables

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $sql = "SELECT * FROM sports WHERE SportID = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $SID = $row['SportID'];
            $SName = $row['SportName'];
            $AQuantity = $row['Description'];
            $CID = $row['SportCordinator'];

            $sql2 = "SELECT FirstName FROM students WHERE StudentID = $CID";
            $r = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($r);
            $CName = $row2['FirstName'];
        } else {
            echo "No data found for SportID: $id";
            exit();
        }
    } else {
        echo "Error fetching data: " . mysqli_error($con);
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SID = $_POST['SportID'];
    $SName = $_POST['SportName'];
    $AQuantity = $_POST['Description'];
    $CID = $_POST['SportCordinator'];

    $sql = "UPDATE sports
            SET SportName = '$SName', Description = '$AQuantity', SportCordinator = $CID
            WHERE SportID = $SID";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data Updated";
        header('location:sports.php');
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
    <title>Update Sport</title>
    <link rel="stylesheet" href="../css/signup.css" />
</head>

<body>
    <section class="container">
        <header>Update Sport</header>
        <form method="post" class="form">
            <div class="column">
                <div class="input-box">
                    <label>Sport ID</label>
                    <input type="text" placeholder="Enter Sport ID" name="SportID" value="<?php echo $SID ?>" readonly />
                </div>
                <div class="input-box">
                    <label>Sport Name</label>
                    <input type="text" placeholder="Sport Name" name="SportName" value="<?php echo $SName ?>" required />
                </div>
            </div>
            <div class="input-box">
                <label>Description</label>
                <input type="text" placeholder="Description" name="Description" value="<?php echo $AQuantity ?>" required />
            </div>
            <div class="input-box">
                <p>Current Coordinator: <strong> <?php echo $CID ?>:</strong><?php echo $CName ?></p>
                <label>Coordinator ID</label>
                <select name="SportCordinator">
                    <?php
                    $sql = 'SELECT * FROM students';
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['StudentID'];
                        echo '<option value="' . $id . '">' . $id . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button>Update</button>
        </form>
    </section>
</body>

</html>
