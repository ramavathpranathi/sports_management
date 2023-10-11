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
$sql="select * from Students where StudentID=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$SID=$row['StudentID'];
$password=$row['PasswordHash'];
$DOB=$row['DateOfBirth'];
$fName=$row['FirstName'];
$lName=$row['LastName'];
$email=$row['Email'];
$phone=$row['Phone'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $SID=$_POST['StudentID'];
    $password=$_POST['PasswordHash'];
    $DOB=$_POST['DateOfBirth'];
    $fName=$_POST['FirstName'];
    $lName=$_POST['LastName'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $CID=$_POST['ClubID'];

    $sql = "select * from students where StudentID='$SID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        
        $sql = "update Students set StudentID=$SID, PasswordHash='$password', FirstName='$fName',DateOfBirth='$DOB', LastName='$lName', Email='$email', Phone=$phone where StudentID=$SID";
        $result=mysqli_query($con, $sql);
        $sql2="select * from studentclubrelationship where StudentID=$SID";
        $result2=mysqli_query($con, $sql2);
        $row1=mysqli_fetch_assoc($result2);
        if ($row1!==NULL){
          $s='update studentclubrelationship set StudentID='.$SID.', ClubID='.$CID.' where studentID='.$SID.' ';
          $r=mysqli_query($con, $s);
        }
        else{
          $s="insert into studentclubrelationship(StudentID, ClubID) values($SID, $CID)";
          $r=mysqli_query($con, $s);
        }
    
        if($result){
            // echo "Data Inserted";
            header('location:students.php');
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
  
    <title>Update Student</title>
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Update Student</header>
      <form method="post" class="form">
        <div class="input-box">
          <label>StudentID</label>
          <input type="text" placeholder="Student ID" name="StudentID" value=<?php echo $SID ?> readonly />
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
            <label>Date of Birth</label>
            <input type="text" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" name="DateOfBirth" value="<?php echo $DOB  ?>" required />
          </div>
          <?php
              $sql2='select * from studentclubrelationship where StudentID='.$SID.'';
              $result2=mysqli_query($con, $sql2);
              $row2=mysqli_fetch_assoc($result2);
              if ($row2!==NULL && isset($row2['ClubID'])){
                $CID=$row2['ClubID'];
              }
              else{
                $CID=' ';
              }
            ?>
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
            <label>Email</label>
            <input type="email" placeholder="Enter Email" name="Email" value=<?php echo $email ?> required />
          </div>
          <div class="input-box">
            <label>Mobile Number</label>
            <input type="tel" placeholder="Enter Mobile Number" name="Phone" value=<?php echo $phone ?> required />
          </div>
        </div>
        <div class="column">
        <div class="input-box">
          <label>Password</label>
          <input type="password" placeholder="Enter Password" name="PasswordHash" value=<?php echo $password ?> required />
        </div>
        <div class="input-box">
          <label>Confirm Password</label>
          <input type="password" placeholder="Confirm Password" name="CPassword" value=<?php echo $password ?> required />
        </div>
</div>

       
        <button>Update</button>
      </form>
    </section>
  </body>
</html>