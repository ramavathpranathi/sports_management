<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$username=$_SESSION['username'];

if ($_SESSION['role'] !== 'admin') {
    // If the user is not an admin, redirect them to a restricted access page or show an error message
    header('location:../user/home.php'); // Replace 'restricted.php' with the appropriate page
    exit();
}
if(isset($_GET['delID'])){
    $id=$_GET['delID'];
    $table=$_GET['table'];
    $on=$_GET['on'];
    $sql="delete from $table where $on=$id";
    $result=mysqli_query($con, $sql);
    if ($result){
        header('location:'.$table.'.php');
    }
    else{
        die(mysqli_error($con));
    }
    
    header('location:SportsEvents.php');
    
}

?>