<?php
include './setup.php';
session_start();
if(isset($_SESSION['username'])){
    header('location:home.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';

    $SID=$_POST['StudentID'];
    $password=$_POST['PasswordHash'];

    
    $sql = "select * from Students where StudentID='$SID' and PasswordHash='$password'";
    $result=mysqli_query($con, $sql);
    if ($result){
        $n=mysqli_num_rows($result);
        if ($n>0){
            // echo 'Login Successful';
            $login=1;
           session_start();
           $_SESSION['username']=$SID;
           $_SESSION['role'] = 'student';
           header('location:home.php'); 

        } 
        else{
            echo '<script>window.location.href = "./login.php";</script>';  
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>body{
        margin: 0;
        padding: 0;
        background: url("background.png");
        background-size: cover;
        background-position:center;
        font-family: sans-serif;
    }
    .loginbox{
        width:500px;
        height:500px;
        background: #d2c6afe0;
        color: #181616;
        top:50%;
        left:50%;
        position:absolute;
        transform: translate(-50%,-50%);
        box-sizing:border-box;
        padding: 70px 30px;
        border:1px solid black;
    }
    .loginlogo{
        width:100px;
        height:100px;
        border-radius:50%;
        position:absolute;
        top:-50px;
        left: calc(50% - 50px);
    }
    h1{
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 35px;
    }
    .loginbox p{
        margin: 0;
        padding:0;
        font-weight: bold;
    }
    .loginbox input{
        width: 100%;
        margin-bottom: 25px;
    }
    .loginbox input[type="text"], input[type="password"]
    {
        border: none;
        border-bottom: 1px solid #171515;
        background: transparent;
        outline: none;
        height: 45px;
        color:#1a1919;
        font-size: 16px;
    }
    .loginbox input[type= "submit"]
    {
        border: none;
        outline: none;
        height: 40px;
        background: #1f1f1e;
        color:#fff;
        font-size:18px;
        border-radius:20px;
    }
    .loginbox input[type="submit"]:hover{
        cursor: pointer;
        background:#857a63e0;
        color:#000;
    }
    .loginbox a{
        text-decoration: none;
        font-size: 12px;
        line-height: 20px;
        color:rgb(14, 13, 13);
    }
    .loginbox a:hover{
        cursor: pointer;
        background: #857a63e0;
        color:#000;
    }
    form a{
        font-size: large;
        margin-bottom: 50px ;
    }
    </style>
</head>
        <body>
            <div class="loginbox">
                <img src="loginlogo.png" class="loginlogo">
                <h1>Login Here</h1>
                <form  method="post">
                    <p>Username</p>
                    <input type="text" name="StudentID" placeholder="Enter Student ID">
                    <p>Password</p>
                    <input type="password" name="PasswordHash" placeholder="Enter password">
                    <a  href="./register.php">Don't have an account</a>
                    <input type="submit" name="submit" value="Login">
                    <!-- <a href="#">Forget password?</a><br>-->
                    <!-- <a href="./register.php">Don't have an account?</a> -->
                </form>
           
            </div>
</body>
</html>
