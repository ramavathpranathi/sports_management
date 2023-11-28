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
$sql="select * from request";

$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);

$SID=$row['StudentID'];
$NID=$row['Name'];
$TID=$row['Item'];
$QID=$row['Quantity'];
$CID=$row['ClubID'];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   
$SID=$_POST['StudentID'];
$NID=$_POST['Name'];
$TID=$_POST['Item'];
$QID=$_POST['Quantity'];
$CID=$_POST['ClubID'];

    // $sql = "select * from request";
    // $result=mysqli_query($con, $sql);
    // if ($result){
        
        $sql = "select *from request";
        $result=mysqli_query($con, $sql);
        if($result){

          //  $sql = "update request set StudentID='$SID', NID='$Name', TID='$Item', QID='$Quantity', CID='$ClubID'";
          $sql = "UPDATE request SET StudentID='$SID', Name='$Name', Item='$Item', Quantity='$Quantity', Club='$ClubID'";
           $result=mysqli_query($con, $sql);
         
           if($result){
           echo "Data Inserted";
            header('location:request.php');
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
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <title>Update Request</title>
    <link rel="stylesheet" href="../css/signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Update Request</header>
      <form method="post" class="form">
      <div class="column">
        <div class="input-box">
          <label>StudentID</label>
          <input type="text" placeholder="Enter student   Id" name="StudentID" value=<?php echo $SID?> required />
        </div>

        
        
          <div class="input-box">
            <label>Name</label>
            <input type="text" placeholder="Enter Name" name="Name" value=<?php echo $NID?> required />
          </div>
          <!-- <div class="input-box">
            <label>Last Name</label>
            <input type="text" placeholder="Enter Last Name" name="LastName" value=<?php echo $lName ?> required />
          </div> -->
        </div>
        
          <div class="input-box">
            <label>Item</label>
            <input type="text" placeholder="Enter Item" name="Item" value=<?php echo $TID?> required />
          </div>
          <div class="input-box">
            <label>Quantity</label>
            <input type="number" placeholder="Enter Quantity" name="Quantity" value=<?php echo $QID ?> required />
          </div>
        </div>
        
        <div class="input-box">
          <label>ClubID</label>
          <input type="number" placeholder="Enter club Id" name="ClubID" value=<?php echo $CID ?> required />
        </div>
      
        <?php
        $sql='select * from request';
        $result=mysqli_query($con, $sql);

        while ($row=mysqli_fetch_assoc($result)){
          $SID=$row['StudentID'];
          echo '<option value="'.$SID.'">'.$SID.'</option>';
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