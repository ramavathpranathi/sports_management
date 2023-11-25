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
  $fName=$_POST['Name'];
  $CID=$_POST["ClubID"];
  $GID=$_POST['sportsID'];
  $FID=$_POST['Feedback'];
  $sql = "select * from Feedback where studentID='$SID'";
  $result=mysqli_query($con, $sql);
  if ($result){
      $n=mysqli_num_rows($result);
      if ($n>0){
          echo 'Already account exists';
      }
      else{
      $sql = "insert into Feedback(StudentID, Name, clubID ,sportsID ,Feedback) values('$SID', '$fName', '$CID' ,'$GID','$FID')";
      $result=mysqli_query($con, $sql);
      if($result){
          // echo "Data Inserted";
          header('location:Feedback.php');
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
        <title>Feedback</title>
        <link rel="stylesheet" href="../css/pranu.css">
        <meta name="viewport"content="width=device,initial-scale=1.0">

    </head>

<body>
    <div class="container">
        <div class="title">Feedback</div>
        <form action="Feedback.php" method="post">
            <div class="user-details">

            <div class="input-box">
                  <spam class="details">StudentID</spam>
                  <input type="text" placeholder="Enter your id"name="StudentID"required>  
                </div> 
                <div class="input-box">
                  <spam class="details">Name</spam>
                  <input type="text" placeholder="Enter your name"name="Name"required>  
                </div>
                
                  <div class="input-box">
                    <spam class="details">clubID</spam>
                    <input type="text" placeholder="Enter clubID" name="clubID" required>  
                  </div>
                
                  <div class="input-box">
                    <spam class="details">sportsID</spam>
                    <input type="text" placeholder="Enter your sportsID"name="sportsID"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">Feedback</spam>
                    <input type="text" placeholder="Feedback" name="Feedback"required>  
                  </div>
               
                  <button>Submit</button>

            </div>
        </form>
      

    </div>
</body>
</html>