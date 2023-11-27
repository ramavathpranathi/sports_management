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

    <title>Request</title>
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
          <a class="nav-link" href="./students.php">Students</a>
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
          <a class="nav-link" href="./admins.php">Admins</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
        
        
       
      </ul>
      
    </div>
  </div>
</nav>
<div class="container">
<button type="button" class="btn btn-primary mt-5 ml-2"><a class="text-light" href="./addrequest.php"> Add request</a> </button>
</div>
<table class="table container">
  <thead>
    <tr>
      <th scope="col">StudentID</th>
      <th scope="col">Name</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">ClubID</th>
     

    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    $sql='select * from request';
    $result=mysqli_query($con, $sql);
    if ($result){
        
        while($row=mysqli_fetch_assoc($result)){
            $SID=$row['StudentID'];
            $Name=$row['Name'];
            $ITID=$row['Item'];
            $QID=$row['Quantity'];
            $CID=$row['ClubID'];

            $table="request";
            $on='StudentID';
            $sql1='select * from request';
            $result1=mysqli_query($con, $sql1);
            $row1=mysqli_fetch_assoc($result1);
            if ($row1!== NULL && isset($row1['clubID'])){
              $CID=$row1['clubID'];
            }
            else{
              $CID=' ';
            }
            echo ' <tr>
            <td>'.$SID.'</td>
            <td>'.$Name.'</td>
            <td>'.$ITID.'</td>
            <td>'.$QID.'</td>
            <td>'.$CID.'</td>
            <td>
            <button type="button" class="btn btn-primary"><a class="text-light" href="./updateStudent.php?updateID='.$SID.'">Update</a> </button>
            <button type="button" class="btn btn-danger"><a class="text-light" href="./deleteadmin.php?delID='.$SID.'&table='.$table.'&on='.$on.'">Delete</a> </button>
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