<?php
 if(isset($_SESSION['username'])){
    header('location:home.php');
}
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';

    $username=$_POST['Username'];
    $password=$_POST['PasswordHash'];

    
    $sql = "select * from admins where Username='$username' and PasswordHash='$password'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
             echo 'Login Successful';
           session_start();
           $_SESSION['username']=$username;
           $_SESSION['role'] = 'admin';
           header('location:home.php'); 
        } 
        else{
            echo 'Not found';  
    }
}

}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="Username" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="PasswordHash" id="exampleInputPassword1" required>
    <a href="./signup.php">Create account</a>
</div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>