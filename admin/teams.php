<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$EID=$_GET['updateID'];


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

    <title>Sports Events</title>
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
    <?php
    echo'
<button type="button" class="btn btn-primary mt-5 ml-2"><a class="text-light" href="./addteam.php?updateID='.$EID.'"> Add Team</a> </button>'
?>
</div>
<table class="table container table-bordered table-hover mt-3">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Team Name</th>
      <th scope="col">Captain</th>
      <th scope="col">Event name</th>
      <th scope="col">Game</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql1="select * from teams where EventID=$EID";
    $result=mysqli_query($con, $sql1);
    if ($result){
    while($row=mysqli_fetch_assoc($result)){
        $TID=$row["Team_ID"];
        $TName=$row['TeamName'];
        $CID=$row['CaptainID'];
        $EID=$row['EventID'];
        $SID=$row['SportID'];
        $sql2='select FirstName from Students where StudentID='.$CID.'';
        $r=mysqli_query($con, $sql2);
        $row2=mysqli_fetch_assoc($r);
        $CName=$row2['FirstName'];
        $sql3='select EventName from SportsEvents where EventID='.$EID.'';
        $r3=mysqli_query($con, $sql3);
        $row3=mysqli_fetch_assoc($r3);
        $EName=$row3['EventName'];
        $sql4='select SportName from Sports where SportID='.$SID.'';
        $r4=mysqli_query($con, $sql4);
        $row4=mysqli_fetch_assoc($r4);
        $SName=$row4['SportName'];
        $table="Teams";
        $on='Team_ID';

        echo '
        <tr>
        <th>'.$TID.'</th>
        <td>'.$TName.'</td>
        <td><strong>'.$CID.':</strong> '.$CName.'</td>
        <td><strong>'.$EID.':</strong> '.$EName.'</td>
        <td><strong>'.$SID.':</strong> '.$SName.'</td>
        
        <td>
        <button type="button" class="btn btn-primary w-10"><a class="text-light" href="./updatesportsevents.php?updateID='.$EID.'">Edit</a> </button>
        <button type="button" class="btn btn-danger"><a class="text-light" href="./deleteTeam.php?delID='.$TID.'&table='.$table.'&on='.$on.'">Delete</a> </button>

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