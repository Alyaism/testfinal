<?php 
$servername="localhost";
$username="root";
$pass="";
$dbname="db_member";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
// echo"Connected successfully";
?>