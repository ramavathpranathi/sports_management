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
    
    $EID=$_POST['EquipmentID'];
    $EName=$_POST['EquipmentName'];
    $EDesc=$_POST['EquipmentDescription'];
    $Quantity=$_POST['Quantity'];
    $AQuantity=$_POST['AvailableQuantity'];
    $CID=$_POST['ClubID'];
   
   
  

    $sql = "select * from sportsequipment where EquipmentID='$EID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Club Already exists';
        }
        else{
          
        $sql = "insert into sportsequipment(EquipmentID, EquipmentName, EquipmentDescription, Quantity, AvailableQuantity,ClubID) values('$EID', '$EName', '$EDesc', $Quantity, $AQuantity, $CID)";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            echo "Data Inserted";
            header('location:sportsEquipment.php');
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
    <title>Add Equipment</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Equipment</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Equipment ID</label>
          <input type="text" placeholder="Enter Equipment ID" name="EquipmentID" required />
        </div>
          <div class="input-box">
            <label>Equipment Name</label>
            <input type="text" placeholder="Equipment Name" name="EquipmentName" required />
          </div>
        
        </div>
        <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Equipment Description" name="EquipmentDescription" required />
          </div>

        <div class="column">
          <div class="input-box">
            <label>Quantity</label>
            <input type="number" placeholder="Quantity" name="Quantity" required />
          </div>
          <div class="input-box">
            <label>Available Quantity</label>
            <input type="number" placeholder="Quantity" name="AvailableQuantity" required />
          </div>
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