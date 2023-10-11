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

    $LID=$_POST['LeaderID'];
    $CID=$_POST['ClubID'];
    $fName=$_POST['FirstName'];
    $lName=$_POST['LastName'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    

    $sql = "select * from clubleaders where LeaderID='$LID'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            echo 'Already account exists';
        }
        else{
        $sql = "insert into clubleaders(LeaderID, FirstName, LastName,Email, Phone,ClubID) values($LID, '$fName', '$lName' ,'$email', '$phone', '$CID')";
        $result=mysqli_query($con, $sql);
        if($result){
             
            header('location:clubleaders.php');
        }
        else{
            // echo "Error";
            echo $LID;
            die(mysqli_error($con));
        } 
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Club Leader</title>
    
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Add Club Leader</header>
      <form method="post" class="form">
      <div class="column">
        <div class="input-box">
          <label>Leader ID</label>
          <input type="text" placeholder="Enter your ID" name="LeaderID" required />
        </div>
          <div class="input-box">
            <label>Club ID</label><br>
            <select name="ClubID">
      
        <?php
        $sql='select * from clubs';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $id=$row['ClubID'];
          echo '<option value="'.$id.' ">'.$id.'</option>';
        }
        ?>
          </select>
          </div>
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
       
</div>

       
        <button>Submit</button>
      </form>
    </section>
  </body>
</html>