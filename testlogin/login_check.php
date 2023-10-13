<?php 
include('condb.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$password=hash('sha512',$password);

$sql ="SELECT * FROM members WHERE username='$username' AND password ='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if($row > 0){
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["fname"] = $row['name'];
    $_SESSION["lname"] = $row['lastname'];
    $show=header("location:index.php");
}else{
    $_SESSION['error'] = "ํ<p>Your username Or Password Is Invalid</p>";
    $show=header("location:login.php");
    
}
echo $show;


?>