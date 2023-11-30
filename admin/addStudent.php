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
    include 'connect.php';
    
    $SID=$_POST['StudentID'];
    $password=$_POST['PasswordHash'];
    $fName=$_POST['FirstName'];
    $lName=$_POST['LastName'];
    $DOB=$_POST['DateOfBirth'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];

    $sql = "select * from students where studentID='$SID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Already account exists';
        }
        else{
        $sql = "insert into students(StudentID, FirstName, LastName, DateOfBirth, Email, Phone, PasswordHash) values('$SID', '$fName', '$lName', '$DOB' ,'$email', '$phone', '$password')";
        $result=mysqli_query($con, $sql);
        if($result){
            // echo "Data Inserted";
            header('location:students.php');
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
    <title>Add Student</title>
    
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Student</header>
      <form method="post" class="form">
        <div class="input-box">
          <label>Student ID</label>
          <input type="text" placeholder="Enter your ID" name="StudentID" required />
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
            <label>Date of Birth</label>
            <input type="date" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" name="DateOfBirth" required />
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