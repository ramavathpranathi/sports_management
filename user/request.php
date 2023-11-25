<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  include 'connect.php';

  
  $SID=$_POST['StudentID'];
  $Name=$_POST['Name'];
  $ITID=$_POST['Item'];
  $QID=$_POST['Quantity'];
  $CID=$_POST['clubID'];

  $sql = "select * from request ";
  $result=mysqli_query($con, $sql);
  if ($result){
      $n=mysqli_num_rows($result);
      $sql = "insert into request(StudentID, Name, Item, Quantity, clubID) values( '$SID', '$Name', '$ITID' ,'$QID',  '$CID')";
      $result=mysqli_query($con, $sql);
      if($result){
          // echo "Data Inserted";
          header('location:request.php');
      }
      else{
          die(mysqli_error($con));
      } 
  }

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Request Form</title>
        <link rel="stylesheet" href="../css/pranu.css">
        <meta name="viewport"content="width=device,initial-scale=1.0">

    </head>

<body>
    <div class="container">
        <div class="title">Request</div>
        <form action="request.php" method="post">
            <div class="user-details">

            <div class="input-box">
                  <spam class="details">StudentID</spam>
                  <input type="text" placeholder="Enter your id"name="StudentID"required>  
                </div> 
                <div class="input-box">
                  <spam class="details">Name</spam>
                  <input type="text" placeholder="Enter your name"name="Name"required>  
                </div>
                
                  <!-- <div class="input-box">
                    <spam class="details">LastName</spam>
                    <input type="text" placeholder="Enter your last name" name="LastName" required>  
                  </div> -->
                  <!-- <div class="input-box">
                    <spam class="details">DateOfBirth</spam>
                    <input type="text" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" name="DateOfBirth" required />
                  </div> -->
                  
                  <!-- <div class="input-box">
                    <spam class="details">Batch</spam>
                    <input type="text" placeholder="Enter your batch"required>  
                  </div> -->
                  <!-- <div class="input-box">
                    <spam class="details">Email</spam>
                    <input type="text" placeholder="Enter your Email"name="Email"required>  
                  </div> -->
                  <div class="input-box">
                    <spam class="details">Item required</spam>
                    <input type="text" placeholder="Item required " name="Item required"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">Quantity</spam>
                    <input type="text" placeholder="Quantity" name="Quantity09"required>  
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