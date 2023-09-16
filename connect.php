<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='sports-club';

$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);//to connet the database

if (!$con){
 
    die(mysqli_error($con));
}


?>