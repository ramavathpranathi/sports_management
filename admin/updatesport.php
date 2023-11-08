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
        from sports
        where SportID='.$id.'';
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);

$EID=$row['SportID'];
$EName=$row['SportName'];
$AQuantity=$row['Description'];
$CID=$row['SportCordinator'];
$sql2='select FirstName from Students where StudentID='.$CID.'';
$r=mysqli_query($con, $sql2);
$row2=mysqli_fetch_assoc($r);
$CName=$row2['FirstName'];



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $SID=$_POST['SportID'];
    $EName=$_POST['SportName'];
    $AQuantity=$_POST['Description'];
    $CID=$_POST['SportCordinator'];
   


    $sql = "select * from sports where SportID='$SID'";
    $result=mysqli_query($con, $sql);
    if ($result){
       
        $sql = "update sports
                set SportID=$SID, SportName='$EName', Description='$AQuantity',SportCordinator=$CID 
                where SportID=$id";
        
        $result=mysqli_query($con, $sql);
 
        if($result){
            echo "Data Inserted";
            header('location:sports.php');
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
    <title>Update Sport</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Update Sport</header>
      <form method="post" class="form">
        
        <div class="column">
        <div class="input-box">
          <label>Sport ID</label>
          <input type="text" placeholder="Enter Sport ID" name="SportID" value=<?php echo $EID ?> required/>
        </div>
          <div class="input-box">
            <label>Sport Name</label>
            <input type="text" placeholder="Sport Name" name="SportName" value="<?php echo $EName ?>" required />
          </div>
        </div>

          <div class="input-box">
            <label></label>
            <input type="text" placeholder="Description" name="Description" value="<?php echo $AQuantity ?>" required />
          </div>
        
        <div>
        </div>
        <div class="input-box">
        <p>Current Coordinator: <strong> <?php echo $CID ?>: </strong><?php echo $CName?></p>
        <label>Coordinator ID</label>
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
          <!-- <input type="text" placeholder="Club Coordinator" name="ClubCordinator" required /> -->
        </div>
        
</div>

       
        <button>Update</button>
      </form>
    </section>
  </body>
</html>