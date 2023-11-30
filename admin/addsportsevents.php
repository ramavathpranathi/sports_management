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
    
    $EID=$_POST['EventID'];
    $EName=$_POST['EventName'];
    $EDesc=$_POST['EventDate'];
    $Quantity=$_POST['Location'];
    $AQuantity=$_POST['Description'];
    $CID=$_POST['ClubID'];
   
   

    $sql = "select * from sportsevents where EventID='$EID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Club Already exists';
        }
        else{
          
        $sql = "insert into sportsevents(EventID, EventName, EventDate, Location, Description,ClubID) values('$EID', '$EName', '$EDesc', '$Quantity', '$AQuantity', $CID)";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            // echo "Data Inserted";
            header('location:sportsevents.php');
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
    <title>Add Event</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Event</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Event ID</label>
          <input type="text" placeholder="Enter Event ID" name="EventID" required />
        </div>
          <div class="input-box">
            <label>Event Name</label>
            <input type="text" placeholder="Event ID" name="Event ID" required />
          </div>
        
        </div>
       

        <div class="column">
        <div class="input-box">
            <label>Event Date</label>
            <input type="text" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" name="EventDate" required />
          </div>
          <div class="input-box">
            <label>Venue</label>
            <input type="text" placeholder="Venue" name="Location" required />
          </div>
          </div>
          <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Description" name="Description" required />
          </div>
       
        <div class="input-box">
        <label>Club ID</label>
        <select name="ClubID">
        <?php
        $sql='select * from clubs';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['ClubID'];
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