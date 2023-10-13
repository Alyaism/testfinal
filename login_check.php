<?php 
include('condb.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$password=hash('sha512',$password);

$sql ="SELECT * FROM tb_employee WHERE username='$username' AND password ='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if($row > 0){
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["fname"] = $row['name'];
    $_SESSION["lname"] = $row['lastname'];
    $show=header("location:admin/index.php");
}else{
    $_SESSION['error'] = "ํYour username Or Password Is Invalid";
    $show=header("location:admin/index.php");
    
}
echo $show;


?>