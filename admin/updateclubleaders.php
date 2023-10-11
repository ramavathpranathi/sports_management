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
$sql="select * from clubleaders where LeaderID=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$LID=$row['LeaderID'];
$fName=$row['FirstName'];
$lName=$row['LastName'];
$email=$row['Email'];
$phone=$row['Phone'];
$CID=$row['ClubID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $LID=$_POST['LeaderID'];
    $CID=$_POST['ClubID'];
    $fName=$_POST['FirstName'];
    $lName=$_POST['LastName'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    
    $sql = "select * from clubleaders where LeaderID='$LID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        
        $sql = "update clubleaders set LeaderID=$LID, FirstName='$fName', LastName='$lName', Email='$email', Phone=$phone, ClubID=$CID  where LeaderID=$LID";
        $result=mysqli_query($con, $sql);

    
        if($result){
            // echo "Data Inserted";
            header('location:clubleaders.php');
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
  
    <title>Update ClubLeaders</title>
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Update ClubLeaders</header>
      <form method="post" class="form">
      <div class="column">
        <div class="input-box">
          <label>Leader ID</label>
          <input type="text" placeholder="Leader ID" name="LeaderID" value=<?php echo $LID ?> required />
        </div>
        <div class="input-box">
            <label>Club ID</label><br>
            <h4>Current Club: <?php echo $CID  ?> </h4>
            
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
        
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input type="text" placeholder="Enter First Name" name="FirstName" value=<?php echo $fName ?> required />
          </div>
          <div class="input-box">
            <label>Last Name</label>
            <input type="text" placeholder="Enter Last Name" name="LastName" value=<?php echo $lName ?> required />
          </div>
        </div>
    
        
    
        
        <div class="column">
          <div class="input-box">
            <label>Email</label>
            <input type="email" placeholder="Enter Email" name="Email" value=<?php echo $email ?> required />
          </div>
          <div class="input-box">
            <label>Mobile Number</label>
            <input type="tel" placeholder="Enter Mobile Number" name="Phone" value=<?php echo $phone ?> required />
          </div>
        </div>
        
</div>

       
        <button>Update</button>
      </form>
    </section>
  </body>
</html>