<?php

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
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo '<script> alert("Account already exists with this Username") </script>';
        }
        else{
        $sql = "insert into Admins(Username, PasswordHash, FirstName, LastName, Email, Phone) values('$username', '$password', '$fName', '$lName', '$email', '$phone')";
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
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Admin Registration</header>
      <form method="post" class="form">
        <div class="input-box">
          <label>Username</label>
          <input type="text" placeholder="Enter Username" name="Username" required />
        </div>

        
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input type="text" placeholder="Enter First Name" name="FirstName" required />
          </div>
          <div class="input-box">
            <label>Last Name</label>
            <input type="text" placeholder="Enter Last Name" name="LastName" required />
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Email</label>
            <input type="email" placeholder="Enter Email" name="Email" required />
          </div>
          <div class="input-box">
            <label>Mobile Number</label>
            <input type="tel" placeholder="Enter Mobile Number" name="Phone" required />
          </div>
        </div>
        <div class="column">
        <div class="input-box">
          <label>Password</label>
          <input type="password" placeholder="Enter Password" name="PasswordHash" required />
        </div>
        <div class="input-box">
          <label>Confirm Password</label>
          <input type="password" placeholder="Confirm Password" name="CPassword" required />
        </div>
</div>

       
        <button>Submit</button>
      </form>
    </section>
  </body>
</html>