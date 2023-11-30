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
$EID=$_GET['updateID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $TID=$_POST['Team_ID'];
    $TName=$_POST['TeamName'];
    $CID=$_POST['CaptainID'];
    $SID=$_POST['SportID'];

    
   
    $sql = "select * from Teams where Team_ID='$TID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Team Already exists';
        }
        else{
          
        $sql = "insert into Teams(Team_ID, TeamName, CaptainID, EventID, SportID) values('$TID', '$TName', $CID, $EID, '$SID')";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            // echo "Data Inserted";
            header("location:sportsevents.php");
        }
        else{
            die(mysqli_error($con));
            // echo "eeeeerror";
        } 
        }
    }
    else{
        echo "eeeeerror";
    }

}


?>

<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Team</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Team</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Team ID</label>
          <input type="text" placeholder="Enter Team ID" name="Team_ID" required />
        </div>
          <div class="input-box">
            <label>Event Name</label>
            <input type="text" placeholder="Team Name" name="TeamName" required />
          </div>
        
        </div>
       
        <div class="input-box">
        <label>Captain ID</label>
        <select name="CaptainID">
        <?php
        $sql='select * from Students';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['StudentID'];
          echo '<option value="'.$id.'">'.$id.'</option>';
        }
        ?>
          </select>
        </div>

        <div class="input-box">
        <label>Sport</label>
        <select name="SportID">
        <?php
        $sql='select * from Sports';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['SportID'];
          echo '<option value="'.$id.'">'.$id.'</option>';
        }
        ?>
          </select>
        </div>
        
</div>

       
        <button>Add</button>
      </form>
    </section>
  </body>
</html>