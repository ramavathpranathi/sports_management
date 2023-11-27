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
    <link rel="stylesheet" href="../css/adminStyle.css">
    <title>Clubs</title>
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
          <a class="nav-link active" href="./scheduleDetails.php">schedule</a>
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
          <a class="nav-link active" href="./admins.php">Admins</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="clubs">
  <button class="btn btn-primary"><a class="text-light" href="./addClub.php">Add Club</a></button>


    <?php
    $sql='select * from clubs';
    $result=mysqli_query($con, $sql);
    if ($result){
      while($row=mysqli_fetch_assoc($result)){
      echo '<div class="club">';
        $id=$row['ClubID'];
        $name=$row['ClubName'];
        $des=$row['ClubDescription'];
        $cordID=$row['ClubCordinator'];
        $s='select FirstName, LastName from students where StudentID='.$cordID.'';
        $r=mysqli_query($con, $s);
        $row1=mysqli_fetch_assoc($r);
        $fName=$row1['FirstName'];
        $lName=$row1['LastName'];
        echo '<h3>'.$id.'  '.$name.'</h3>';
        $sql1='select * from clubleaders where ClubID='.$id.'';
        $result1= mysqli_query($con, $sql1);
        $row2=mysqli_fetch_assoc($result1);
        if ($row2!== NULL){
          $LID=$row2['LeaderID'];
          $LDName=$row2['FirstName'];
          echo '<h4>Club Leader: '.$LID.' '.$LDName.'</h4>';
        }
        $table='clubs';
        $on='ClubID';
        echo '
        <h4>Club Coordinator: '.$fName.' '.$lName.'</h4>
        <p>'.$des.'</p>
        <button type="button" class="btn btn-primary w-10"><a class="text-light" href="./updateClub.php?updateID='.$id.'">Edit</a> </button>
        <button type="button" class="btn btn-danger"><a class="text-light" href="./deleteadmin.php?delID='.$id.'&table='.$table.'&on='.$on.'">Delete Club</a> </button>

        ';
      
        echo '</div>';
      }
    }
  
   
?>


</div>


</body>
</html>