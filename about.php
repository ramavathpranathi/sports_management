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
    <title>About Us</title>
</head>
<body>
<div class="main">
<div class="menu">
        <a href="./home.php">Home</a>
        <a href="./profile.php">Events</a>
        <a href="./">Registration</a>
        <a href="./profile.php">Profile</a>
        <a href="./about.php">About Us</a>
        <a class="logout" href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Logout</a>
       
    </div>

<div class="ab">
<h3>Welcome to the IIITR Sports Club </h3>
<p>At IIITR Sports Club, we are passionate about sports and fostering a spirit of competition, teamwork, and camaraderie. Established in 2019, our club has a rich history of excellence in various sports disciplines.</p>   
</div>
</div>

<div class="ab-content">
<h3 class="head">Our Sports: </h3>

<p> We offer a diverse range of sports activities, including: </p>

<div class="games">
    <div class="game">
        <div class="game-image">
        <img width="300px"  src="./images/white-vb.jpg" alt="volleyball">
    </div>
    <div class="game-content">
        <h3>
            Volleyball
        </h3>
        <p>
            Spike your way to victory on our well-maintained volleyball court. Our volleyball team is known for its dedication and teamwork. Whether you're a seasoned player or just starting, our club provides coaching and practice sessions to help you improve your skills and become a formidable player on the court.
        </p>
    </div>
    </div>
    <div class="game">
    <div class="game-content">
        <h3>
            Badminton
        </h3>
        <p>
            Smash and rally your way to success on our badminton courts. Badminton enthusiasts find a home here, with regular sessions for players of all levels. Our experienced coaches offer guidance to improve your technique and agility, ensuring you're always at the top of your game.    
                    </p>
    </div>
    
        <div class="game-image">
        <img width="280px" src="./images/badminton.jpeg" alt ="Badminton">
    </div>
    </div>
    <div class="game">
        <div class="game-image">
            <img width="400px" src="https://img.freepik.com/premium-photo/3d-render-concept-batsman-playing-cricket-scene-display-championship-trophy-cup-3d-art-design-poster-illustration_460848-5105.jpg?w=2000" alt="TT">
    </div>
    <div class="game-content">
        <h3>
          Cricket
        </h3>
        <p>
            Joining our diverse sports lineup is cricket, a beloved sport in India. Whether you're a batsman, bowler, or all-rounder, our cricket team welcomes players of all skill levels. We practice regularly and participate in intercollegiate cricket tournaments, aiming to bring glory to our college in this classic sport.       </p>
        </div>
    </div>
    <div class="game">
        <div class="game-content">
            <h3>
                Basketball
            </h3>
            <p>
                Joining our diverse sports lineup is cricket, a beloved sport in India. Whether you're a batsman, bowler, or all-rounder, our cricket team welcomes players of all skill levels. We practice regularly and participate in intercollegiate cricket tournaments, aiming to bring glory to our college in this classic sport.   </p>
        </div>
        
            <div class="game-image">
            <img width="450px" src="https://cdn.pixabay.com/photo/2020/07/08/08/04/sunset-5383040_1280.jpg" alt ="Badminton">
        </div>
    </div>
        <div class="game">
            <div class="game-image">
            <img width="400px" src="./images/tt.avif" alt="TT">
        </div>
        <div class="game-content">
            <h3>
               Table Tennis
            </h3>
            <p>
                Show your quick reflexes and skills on our TT tables. Table Tennis demands precision and speed, and our club is the perfect place to hone your abilities. We organize friendly tournaments and provide professional guidance to help you master the art of table tennis.        </p>
            </div>
        </div>
        <div class="game">
            <div class="game-content">
                <h3>
                    Chess
                </h3>
                <p>
                    Make strategic moves and checkmate your opponents on our chessboards. Chess is a game of intellect and strategy. Join our chess club to learn from experienced players and participate in thrilling chess matches. We encourage critical thinking and foster a love for this timeless game.                </p>
            </div>
            
                <div class="game-image">
                <img width="450px" src="https://img.freepik.com/free-vector/realistic-chess-game-pieces-3d-icons-set-with-reflection_1284-13710.jpg" alt ="Badminton">
            </div>
            </div>
    </div>
</div>

<div class="ab-c2">
<div class="ab-c22">
<h3>Monthly Events: </h3>
<p>We keep the sporting spirit alive with our monthly events. Each month, we organize exciting tournaments and challenges across all our sports. It's a great way to stay active and competitive throughout the year. </p>

</div>
<div class="ab-c22">
<h3>Intersports Participation:  </h3>
<p>IIITR Sports Club proudly represents our institution in Inter collegiate sports competitions. We consistently participate in regional and national tournaments, showcasing our talent and sportsmanship.</p>

</div>
<div class="ab-c22">
    <h3>Join Us: </h3>
<p>We welcome all sports enthusiasts, whether you're an experienced athlete or just looking to have some fun and stay active. Becoming a member of our club is easy, and we provide training and support to help you excel in your chosen sport.</p>

</div>
<div class="ab-c22">
<h3>Community Engagement:  </h3>
<p>We believe in giving back to the community. Our club actively engages in community service projects, using sports as a means to promote physical fitness and well-being among all age groups.</p>

</div>
<div class="ab-c22">
    <h3>Get in Touch: </h3>
<p>If you have any questions, want to join our club, or simply want to know more about our activities, feel free to contact us. We're here to assist you in your sports journey.</p>
</div>


</div>
<footer>
    <div class="ft">
        <p><span>©</span> 2023 All rights Reserved IIITR Sports Club</p>
    </div>
</footer>
</body>
</html>