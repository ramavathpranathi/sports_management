<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <div class="home-cover">
    <div class="men">
        

        <a href="./home.php">Home</a>
        <a href="./events.php">Events</a>
        <a href="./registration.php">Registration</a>
        <a href="./profile.php">Profile</a>
        <a href="./about.php">About Us</a>
        <a class="logout" href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Logout</a>
       
    </div>
    <div class="cover-content">
        <h1>Sports Management System</h1> 
          <!-- <p>Discover the spirit of victory with our college's very own sports champion. Join us as we celebrate the achievements of our dedicated athletes, setting new standards in sportsmanship and competition. Together, we aim for greatness!</p> -->
        <div class="cover-btn">
            <a href="">Join Us</a>
        </div>
    </div>
    <div class="cover-img">
        <img src="./images/cover.png" alt="">
    </div>
    
</div>

   
    <footer>
        <div class="ft">
            <p><span>©</span> 2023 All rights Reserved IIITR Sports Club</p>
        </div>
    </footer>
</body>
</html>