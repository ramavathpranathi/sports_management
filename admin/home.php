<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:../admin/login.php');
}
$username=$_SESSION['username'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Home</title>
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
          <a class="nav-link active" href="./request.php">Request</a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link active" href="./winners.php">Winners</a>
        </li>
        <li class="nav-item">
                        <a class="nav-link active" href="./Feedback.php">Feedback</a>
                    </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" href="./sportsevents.php">Registrations</a>
        </li> -->
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
<h4>Hello <?php echo $username    ?></h4>
</body>
</html>