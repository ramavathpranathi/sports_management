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
$id=$_GET['updateID'];
$sql = 'select *
        from sportsequipment
        where EquipmentID='.$id.'';
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);

$EID=$row['EquipmentID'];
$EName=$row['EquipmentName'];
$EDesc=$row['EquipmentDescription'];
$Quantity=$row['Quantity'];
$AQuantity=$row['AvailableQuantity'];
$CID=$row['ClubID'];

$sql2='select ClubName from CLubs where ClubID='.$CID.'';
$r=mysqli_query($con, $sql2);
$row2=mysqli_fetch_assoc($r);
$CName=$row2['ClubName'];



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
       
        $sql = "update sportsequipment 
                set EquipmentID=$EID, EquipmentName='$EName', EquipmentDescription='$EDesc', Quantity=$Quantity, AvailableQuantity=$AQuantity,ClubID=$CID 
                where EquipmentID=$id";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            echo "Data Inserted";
            header('location:sportsequipment.php');
        }
        else{
            echo "Error 123 ";
            die(mysqli_error($con));
        } 
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
    <title>Update Equipment</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Update Equipment</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Equipment ID</label>
          <input type="text" placeholder="Enter Equipment ID" name="EquipmentID" value=<?php echo $EID ?> required />
        </div>
          <div class="input-box">
            <label>Equipment Name</label>
            <input type="text" placeholder="Equipment Name" name="EquipmentName" value="<?php echo $EName ?>" required />
          </div>
        
        </div>
        <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Equipment Description" name="EquipmentDescription" value="<?php echo $EDesc ?>" required />
          </div>

        <div class="column">
          <div class="input-box">
            <label>Quantity</label>
            <input type="number" placeholder="Quantity" name="Quantity" value=<?php echo $Quantity ?> required />
          </div>
          <div class="input-box">
            <label>Available Quantity</label>
            <input type="number" placeholder="Quantity" name="AvailableQuantity" value=<?php echo $AQuantity ?> required />
          </div>
        </div>
        <div>
        </div>
        <div class="input-box">
        <p>Current Coordinator: <strong> <?php   echo $CID ?>: </strong><?php   echo $CName?></p>
        <label>Club ID</label>
        <select name="ClubID">
        
        <?php
        $sql='select * from clubs';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['ClubID'];
          echo '<option value="'.$id  .'">'.$id.'</option>';
        }
        ?>
          </select>
          <!-- <input type="text" placeholder="Club Coordinator" name="ClubCordinator" required /> -->
        </div>
        
</div>

       
        <button>Update</button>
      </form>
    </section>
  </body>
</html>