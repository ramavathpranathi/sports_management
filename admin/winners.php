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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">

    <title>Winner</title>
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
                    <!-- ... other menu items ... -->
                    <li class="nav-item">
                        <a class="nav-link active" href="./clubs.php">clubs</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="./clubleaders.php">Club Leaders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="./sports.php">Sports</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link active" href="./sportsEquipment.php">Sports Equipment</a>
                    </li>
                   <li class="nav-item">
                       <a class="nav-link active" href="./sportsevents.php">Sports Events</a>
                   </li>
                   <li class="nav-item">
          <a class="nav-link active" href="./schedule.php">schedule</a>
        </li>
                   <li class="nav-item">
                       <a class="nav-link active" href="./request.php">Request</a>
                   </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./winners.php">Winners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./Feedback.php">Feedback</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="./admins.php">Admins</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <button type="button" class="btn btn-primary mt-5 ml-2"><a class="text-light"
                href="./addwinner.php"> Add Winner</a> </button>
    </div>
    <table class="table container table-bordered table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Team_ID</th>
                <th scope="col">Team Name</th>
                <th scope="col">CaptainID</th>
                <th scope="col">points</th>
                <th scope="col">EventID</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1 = "SELECT * FROM winner";
            $result = mysqli_query($con, $sql1);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $WID = $row["winner_ID"];
                    $TID = $row["Team_ID"];
                    $TName=$row["TeamName"];
                    $CID = $row["CaptainID"];
                    $PName = $row["points"];
                    $EID = $row["EventID"];
                    $table="winners";
                    $on='winner_ID';
                   

                    // Fetch data related to Team, Captain, and Event using JOIN or separate queries

                    echo '
                    <tr>
                        <th>' . $WID . '</th>
                        <td>' . $TID . '</td>
                        <td>' . $TName . '</td>
                        <td>' . $CID . '</td>
                        <td>' . $PName . '</td>
                        <td>' . $EID . '</td>
                        <td>
                            <button type="button" class="btn btn-primary"><a class="text-light" href="./updatewinner.php?updateID=' . $WID . '">Update</a> </button>
                            <button type="button" class="btn btn-danger"><a class="text-light" href="./deletewinner.php?delID=' . $WID . '&table=winner&on=Winner_ID">Delete</a> </button>
                        </td>
                    </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>