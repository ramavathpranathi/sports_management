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
$sql= "select *
        from clubs
        where clubs.ClubID= $id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);

$CID=$row['ClubID'];
$cName=$row['ClubName'];
$Disc=$row['ClubDescription'];
$CoordID=$row['ClubCordinator'];
$s="select FirstName from Students where StudentID=$CoordID";
$result2=mysqli_query($con, $s);
$row2=mysqli_fetch_assoc($result2);
$CordName=$row2['FirstName'];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    

    $CID=$_POST['ClubID'];
    $cName=$_POST['ClubName'];
    $Disc=$_POST['ClubDescription'];
    $CoordID=$_POST['ClubCordinator'];

    $result=mysqli_query($con, $sql);
    if ($result){
      
          
        $sql = "update Clubs set ClubID=$CID, ClubName='$cName', ClubDescription='$Disc', ClubCordinator=$CoordID where ClubID=$id";
        
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


?>

<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Club</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Customize Club</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Club ID</label>
          <input type="text" placeholder="Enter Club ID" name="ClubID" value=<?php echo $id  ?> readonly />
        </div>
          <div class="input-box">
            <label>Club Name</label>
            <input type="text" placeholder="Club Name" name="ClubName" value="<?php echo $cName  ?>" required />
          </div>
        
        </div>
        <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Club Description" name="ClubDescription" value="<?php echo $Disc  ?>" required />
          </div>


          <!-- <div class="input-box">
            <label>Description</label>
            <input type="text" placeholder="Club Description" name="ClubCordinator" required />
          </div> -->
        <div class="input-box">
        <label>Club Cordinator</label>
        <p>Current Coordinator: <strong><?php   echo $CoordID ?></strong>: <?php   echo $CordName?></p>
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

       
        <button>Update</button>
      </form>
    </section>
  </body>
</html>