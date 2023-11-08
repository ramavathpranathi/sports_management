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
    
    $EID=$_POST['SportID'];
    $EName=$_POST['SportName'];
    $AQuantity=$_POST['Description'];
    $CID=$_POST['SportCordinator'];
   
   

    $sql = "select * from sports where SportID='$EID'";
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
          <label>Sport ID</label>
          <input type="text" placeholder="Enter Sport ID" name="SportID" required />
        </div>
          <div class="input-box">
            <label>Sport Name</label>
            <input type="text" placeholder="Sport Name" name="SportName" required />
          </div>
        
        </div>
       
          <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Description" name="Description" required />
          </div>
       
        <div class="input-box">
        <label>Coordinator</label>
        <select name="SportCordinator">
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