<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  include 'connect.php';
  
  $SID=$_POST['StudentID'];
  echo 'try '. $_POST['StudentID'];
 // $password=$_POST['PasswordHash'];
  $fName=$_POST['FirstName'];
  $lName=$_POST['LastName'];
  $DOB=$_POST['DateOfBirth'];
  $email=$_POST['Email'];
  $phone=$_POST['Phone'];
  $CID=$_POST['clubID'];

  $sql = "select * from register where studentID='$SID'";
  $result=mysqli_query($con, $sql);
  if ($result){
      $n=mysqli_num_rows($result);
      if ($n>0){
          echo 'Already account exists';
      }
      else{
      $sql = "insert into register(StudentID, FirstName, LastName, DateOfBirth, Email, Phone,clubID) values('$SID', '$fName', '$lName', '$DOB' ,'$email', '$phone', '$CID')";
      $result=mysqli_query($con, $sql);
      if($result){
          // echo "Data Inserted";
          header('location:registration.php');
      }
      else{
          die(mysqli_error($con));
      } 
      }
  }

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>ScheduleDetails</title>
        <link rel="stylesheet" href="../css/pranu.css">
        <meta name="viewport"content="width=device,initial-scale=1.0">

    </head>

<body>
    <div class="container">
        <div class="title">ScheduleDetails</div>
        <form action="registration.php" method="post">
            <div class="user-details">

            <div class="input-box">
                  <spam class="details">StudentID</spam>
                  <input type="text" placeholder="Enter your id"name="StudentID"required>  
                </div> 
                <div class="input-box">
                  <spam class="details">First Name</spam>
                  <input type="text" placeholder="Enter your name"name="FirstName"required>  
                </div>
                
                  <div class="input-box">
                    <spam class="details">LastName</spam>
                    <input type="text" placeholder="Enter your last name" name="LastName" required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">DateOfBirth</spam>
                    <input type="text" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" name="DateOfBirth" required />
                  </div>
                  
                  <!-- <div class="input-box">
                    <spam class="details">Batch</spam>
                    <input type="text" placeholder="Enter your batch"required>  
                  </div> -->
                  <div class="input-box">
                    <spam class="details">Email</spam>
                    <input type="text" placeholder="Enter your Email"name="Email"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">Phone</spam>
                    <input type="text" placeholder="phone number " name="Phone"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">ClubID</spam>
                    <input type="text" placeholder="Club id " name='clubID'required>  
                  </div>
                  <!-- <div class="button">
                    <input type="submit" value="Register" >
                  </div> -->
                  <button>Submit</button>

            </div>
        </form>
      

    </div>
</body>
</html>