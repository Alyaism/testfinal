<?php 
include('condb.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone =$_POST['tel'];
$username = $_POST['username'];
$password= $_POST['password'];

$password = hash('sha512',$password);
$sql = "INSERT INTO members(name,lastname,telephone,username,password) 
VALUES('$fname','$lname','$phone','$username','$password')";
$result = mysqli_query($conn,$sql);
if($result){
    echo"<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo"<script> window.location='register.php'; </script>";
}else   {
    echo "ERROR :" . $sql . "<br>" . mysqli_errno($conn) ;
    echo"<script> alert('บัยทึกข้อมูลไม่สำเร็จ'); </script>";
}
mysqli_close($conn);


?>