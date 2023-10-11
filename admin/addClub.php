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
    

    $CID=$_POST['ClubID'];
    $cName=$_POST['ClubName'];
    $Disc=$_POST['ClubDescription'];
    $CoordID=$_POST['ClubCordinator'];
  

    $sql = "select * from Clubs where ClubID='$CID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Club Already exists';
        }
        else{
          
        $sql = "insert into Clubs(ClubID, ClubName, ClubDescription, ClubCordinator) values('$CID', '$cName', '$Disc', $CoordID)";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            echo "Data Inserted";
            header('location:clubs.php');
        }
        else{
            die(mysqli_error($con));
        } 
        }
    }
    else{
        echo "error";
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
    <title>Add Club</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Club</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Club ID</label>
          <input type="text" placeholder="Enter Club ID" name="ClubID" required />
        </div>
          <div class="input-box">
            <label>Club Name</label>
            <input type="text" placeholder="Club Name" name="ClubName" required />
          </div>
        
        </div>
        <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Club Description" name="ClubDescription" required />
          </div>


          <!-- <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Club Description" name="ClubCordinator" required />
          </div> -->
        <div class="input-box">
        <label>Club Cordinator</label>
        <select name="ClubCordinator">
        <?php
        $sql='select * from students';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['StudentID'];
          echo '<option value="'.$id.'">'.$id.'</option>';
        }
        ?>
          </select>
          <!-- <input type="text" placeholder="Club Coordinator" name="ClubCordinator" required /> -->
        </div>
        
</div>

       
        <button>Add</button>
      </form>
    </section>
  </body>
</html>