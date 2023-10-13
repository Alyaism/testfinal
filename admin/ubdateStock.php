<?php
include('../condb.php');
$ids=$_POST['pid'];
$nums=$_POST['pnum'];
$sql = "UPDATE product SET product_amount=product_amount+$nums WHERE product_id ='$ids' ";
$hand=mysqli_query($conn,$sql);
if($hand){
    echo"<script> alert('อัปเดตเรียบร้อย')</script>";
    echo"<script> window.location='index.php';</script>";
}else{
    echo"<script> alert('error')</script>";
    echo"<script> window.location='addStock.php';</script>";
}
mysqli_close($conn);
?>