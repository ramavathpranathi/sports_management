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

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $sql = "SELECT * FROM clubs WHERE ClubID='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['ClubName'];
        $des = $row['ClubDescription'];
        $cordID = $row['ClubCordinator'];
        $s = "SELECT FirstName, LastName FROM students WHERE StudentID='$cordID'";
        $r = mysqli_query($con, $s);
        $row1 = mysqli_fetch_assoc($r);
        $fName = $row1['FirstName'];
        $lName = $row1['LastName'];
    } else {
        echo 'Error fetching club details.';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ClubID'];
    $name = $_POST['ClubName'];
    $des = $_POST['ClubDescription'];
    $cordID = $_POST['ClubCoordinator'];

    $sql = "UPDATE clubs SET ClubID='$id', ClubName='$name', ClubDescription='$des', ClubCordinator='$cordID' WHERE ClubID='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: clubs.php');
        exit();
    } else {
        echo 'Error updating club.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adminStyle.css">
    <title>Update Club</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sports Club Admin</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="./students.php">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./clubs.php">Clubs</a>
                </li>
                <!-- Add other menu items as needed -->
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Update Club</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="ClubID" class="form-label">Club ID</label>
            <input type="text" class="form-control" id="ClubID" name="ClubID" value="<?php echo $id; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="ClubName" class="form-label">Club Name</label>
            <input type="text" class="form-control" id="ClubName" name="ClubName" value="<?php echo $name; ?>" required>
        </div>
        <div class="mb-3">
            <label for="ClubDescription" class="form-label">Club Description</label>
            <textarea class="form-control" id="ClubDescription" name="ClubDescription" rows="3" required><?php echo $des; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="ClubCoordinator" class="form-label">Club Coordinator</label>
            <input type="text" class="form-control" id="ClubCoordinator" name="ClubCoordinator" value="<?php echo $cordID; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Club</button>
    </form>
</div>
</body>
</html>
