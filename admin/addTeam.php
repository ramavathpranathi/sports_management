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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $TID=$_POST['TeamID'];
    $TName=$_POST['TeamName'];
    $CID=$row['CaptainID'];
    $EID=$row['EventID'];
    $SID=$row['SportID'];
    $sql2='select FirstName from Students where StudentID='.$CID.'';
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Club Already exists';
        }
        else{
          
        $sql = "insert into sports(SportID, SportName, Description,SportCordinator) values('$EID', '$EName', '$AQuantity', $CID)";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            // echo "Data Inserted";
            header('location:sports.php');
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
    <title>Add Sport</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Sport</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Team ID</label>
          <input type="text" placeholder="Enter " name="TeamID" required />
        </div>
          <div class="input-box">
            <label>Team Name</label>
            <input type="text" placeholder="Team Name" name="TeamName" required />
          </div>
        
        </div>
       
          <div class="input-box">
            <label>CaptainID</label>
            <input type="text" placeholder="Captain" name="CaptainID" required />
          </div>

          <div class="input-box">
            <label>EventID</label>
            <input type="text" placeholder="Event" name="EventID" required />
          </div>
       
          <div class="input-box">
            <label>SportID</label>
            <input type="text" placeholder="Sports" name="SportID" required />
          </div>

        <?php
        $sql='select * from students';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['StudentID'];
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