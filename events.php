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
    <title>Events</title>
</head>
<body>
    <div class="menu">
        <a href="./home.php">Home</a>
        <a href="./profile.php">Events</a>
        <a href="./registration.php">Registration</a>
        <a href="./profile.php">Profile</a>
        <a href="./about.php">About Us</a>
        <a class="logout" href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Logout</a>
       
    </div>
    <h2 class="aku">Events</h2>
<h3 class="aku">Inter IIIT Sports Meet</h3>
<style>
    .aku {
      text-align: center;
    }
  </style>
<img src="images/kanchipuram 2.jpeg">
<ol>
    <li>
        <p>The Inter-IIIT Sports Meet is an annual sports tournament organized by the Indian Institutes Information of Technology (IIITs). It is the longest-running inter-collegiate meet where all IIITs participate, having been held since 1961. The tournament is held in December, with the Aquatics events held separately in October.</p>
    </li>
    <li>
        <p>For the first time, IIIt Raichur participated in Inter-IIItr sport events at Kanchipuram.That was a fantastic experience.</p>
    </li>
    <li>
        <p>The resolute commitment and enthusiasm of the student community combined with the unfailing encouragement and guidance from the faculty has created tremendous opportunities for students to hone their talents. There are several Sporting Clubs</p>
    </li>
    <img src="images/kanchipuram 1.jpeg">
    <li>
        <p>IIIT Raichur had participated in according games:</p>
    </li>
<ul>
    <li>Volleyball</li>
    <li>Badminton</li>
    <li>Table tennis</li>
    <li>Kabaddi</li>
    <li>Atheletics</li>
    <li>Basketball</li>
    <li>Football</li>
</ul>
</ol>
<h3 class="aku">College Tournament</h3>
<ol>
    <li>
        <p>colleges are a common and integral part of the student experience in many engineering and technical institutions around the world. These tournaments offer students a platform to showcase their skills, talents, and knowledge in various fields, including sports, academics, and technical competitions. Here's some information about college tournaments in BTech colleges:

            Sports Tournaments: Many BTech colleges organize sports tournaments in various disciplines such as cricket, football, basketball, volleyball, table tennis, and more. These tournaments not only promote physical fitness but also foster team spirit and healthy competition among students.</p>
    </li>
    <li>
        Improve their spotive talents by condecting tournaments in college. Many batches won the games and received prizes.It is quite encouraging.

    </li>
    <img src="./images/ 1.jpeg">
    <li>
        <p>In addition to that, sports and games are known to develop the students holistically. They enhance the personality of individuals by imparting various traits in them. Sports are said to boost alertness, disciple, team spirit, mental ability, confidence and concentration of a student.</p>
    </li>
    <li>
        <p>sports, physical contests pursued for the goals and challenges they entail. Sports are part of every culture past and present, but each culture has its own definition of sports. The most useful definitions are those that clarify the relationship of sports to play, games, and contests. “Play,” wrote the German theorist Carl Diem, “is purposeless activity, for its own sake, the opposite of work.” Humans work because they have to; they play because they want to...</p>
        <img src="images/college 2.jpeg">
    </li>
</ol>


</body>
</html>