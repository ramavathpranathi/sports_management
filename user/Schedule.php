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

?>


<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Schedule</title>
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
          <a class="nav-link active" href="./Students.php">Students</a>
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
<button type="button" class="btn btn-primary mt-5 ml-2"><a class="text-light" href="./addschedule.php"> Add Schedule</a> </button>
</div>
<table class="table container table-bordered table-hover mt-3">
  <thead>
    <tr>
      <th scope="col">SportID</th>
      <th scope="col">TeamID</th>
      <th scope="col">Venue</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql1="select * from schedule";
    $result=mysqli_query($con, $sql1);
    if ($result){
    while($row=mysqli_fetch_assoc($result)){
        $SID=$row["SportID"];
        $TID=$row['TeamID'];
        $VID=$row['Venue'];
        $DID=$row['Date'];
        $TTID=$row['Time'];

        $sql2='select SportID from sports where SportID='.$SID.'';
        
        $r=mysqli_query($con, $sql2);
        $row2=mysqli_fetch_assoc($r);
        // $SID=$row2['SportsID'];
        $table='schedule';
        $on='schedule';

        echo '
        <tr>
        <th>'.$SID.'</th>
        <td>'.$TID.'</td>
        <td>'.$VID.'</td>
        <td>'.$DID.'</td>
        <td>'.$TTID.'</td>
 
      </tr>
        ';

    }
}

?>


    
    
    
  </tbody>
</table>

</body>
</html>