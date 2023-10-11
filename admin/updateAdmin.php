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
$sql="select * from Admins where AdminID=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$username=$row['Username'];
$password=$row['PasswordHash'];
$fName=$row['FirstName'];
$lName=$row['LastName'];
$email=$row['Email'];
$phone=$row['Phone'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';

    $username=$_POST['Username'];
    $password=$_POST['PasswordHash'];
    $fName=$_POST['FirstName'];
    $lName=$_POST['LastName'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];

    $sql = "select * from admins where username='$username'";
    $result=mysqli_query($con, $sql);
    if ($result){
        
        $sql = "update Admins set AdminID=$id, Username='$username', PasswordHash='$password', FirstName='$fName', LastName='$lName', Email='$email', Phone=$phone where AdminID=$id";
        $result=mysqli_query($con, $sql);
        if($result){
            // echo "Data Inserted";
            header('location:admins.php');
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
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <title>Update Admin</title>
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Update Admin</header>
      <form method="post" class="form">
        <div class="input-box">
          <label>Username</label>
          <input type="text" placeholder="Enter Username" name="Username" value=<?php echo $username ?> required />
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