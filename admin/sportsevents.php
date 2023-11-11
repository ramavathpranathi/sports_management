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
          <a class="nav-link" href="./sports.php">Sports</a>
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
<button type="button" class="btn btn-primary mt-5 ml-2"><a class="text-light" href="./addsportsevents.php"> Add Event</a> </button>
</div>
<table class="table container table-bordered table-hover mt-3">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Event Name</th>
      <th scope="col">Event Date</th>
      <th scope="col">Venue</th>
      <th scope="col">Discription</th>
      <th scope="col">Club</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql1="select * from sportsevents";
    $result=mysqli_query($con, $sql1);
    if ($result){
    while($row=mysqli_fetch_assoc($result)){
        $EID=$row["EventID"];
        $EName=$row['EventName'];
        $Edesc=$row['EventDate'];
        $quantity=$row['Location'];
        $Aquantity=$row['Description'];
        $CID=$row['ClubID'];
        $sql2='select ClubName from CLubs where ClubID='.$CID.'';
        $r=mysqli_query($con, $sql2);
        $row2=mysqli_fetch_assoc($r);
        $CName=$row2['ClubName'];
        $table='sportsevents';
        $on='EventID';

        echo '
        <tr>
        <th>'.$EID.'</th>
        <td>'.$EName.'</td>
        <td>'.$Edesc.'</td>
        <td>'.$quantity.'</td>
        <td>'.$Aquantity.'</td>
        <td><strong>'.$CID.':</strong> '.$CName.'</td>
        <td>
        <button type="button" class="btn btn-primary"><a class="text-light" href="./teams.php?updateID='.$EID.'">Teams</a> </button>
        <button type="button" class="btn btn-primary w-10"><a class="text-light" href="./updatesportsevents.php?updateID='.$EID.'">Edit</a> </button>
        <button type="button" class="btn btn-danger"><a class="text-light" href="./deleteadmin.php?delID='.$EID.'&table='.$table.'&on='.$on.'">Delete</a> </button>

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