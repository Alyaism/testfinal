<?php
session_start();
include('condb.php');
$cusName = $_POST['cus_name'];
$cusAddress = $_POST['cus_add'];
$cusTel = $_POST['cus_tel'];

$sql = "INSERT INTO tb_order(cus_name,address,telephone,total_price,order_status)
 VALUES('$cusName','$cusAddress','$cusTel','" . $_SESSION["sumPrice"] . "','1')";
mysqli_query($conn, $sql);

$orderID = mysqli_insert_id($conn);
$_SESSION['order_ID'] = $orderID ;
for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if (($_SESSION["strProductID"][$i]) != "") {
    //ดึงข้อมูล
    $sql1= "SELECT * FROM product WHERE product_id = '".$_SESSION["strProductID"][$i]."' ";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);
    $price= $row1['product_price'];
    $total = $_SESSION["strQty"][$i] * $price;

    $sql2 = "INSERT INTO order_detail(orderID,product_id,orderPrice,orderQty,Total)
    VALUES('$orderID','".$_SESSION["strProductID"][$i]."','$price','".$_SESSION["strQty"][$i]."','$total')";
    if(mysqli_query($conn,$sql2)){
        //ตัดสต้อก
        $sql3 ="UPDATE product SET product_amount= product_amount - '".$_SESSION["strQty"][$i]."' 
        WHERE product_id= '".$_SESSION["strProductID"][$i]."'";
        mysqli_query($conn,$sql3);
        // echo"<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
        echo"<script> window.location='print_order.php'; alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";

    }
    }
}
mysqli_close($conn);
//   session_unset();

// $_SESSION["intLine"] ="";
// $_SESSION["strProductID"]="";
// $_SESSION["sumPrice"]="";
// $_SESSION["strQty"]="";




unset( $_SESSION['intLine'] );
unset( $_SESSION['strProductID'] );
unset( $_SESSION['sumPrice'] );
unset( $_SESSION['strQty'] );


// session_destroy();  เคลีย session ทั้งหมด
// session_destroy();
