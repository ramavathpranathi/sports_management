<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="./css/pranu.css">
        <meta name="viewport"content="width=device,initial-scale=1.0">

    </head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <form action="#">
            <div class="user-details">
                <div class="input-box">
                  <spam class="details">Full Name</spam>
                  <input type="text" placeholder="Enter your name"required>  
                </div>
                
                  <div class="input-box">
                    <spam class="details">Email</spam>
                    <input type="text" placeholder="Enter your email"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">Phone Number</spam>
                    <input type="text" placeholder="Enter your phone number"required>  
                  </div>
                  
                  <div class="input-box">
                    <spam class="details">Batch</spam>
                    <input type="text" placeholder="Enter your batch"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">department</spam>
                    <input type="text" placeholder="Enter your department"required>  
                  </div>
                  <div class="input-box">
                    <spam class="details">Game</spam>
                    <input type="text" placeholder="Game"required>  
                  </div>
                  <div class="button">
                    <input type="submit" value="Register">

                  </div>
            </div>
        </form>
    </div>
</body>
</html>