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
        // echo"<script> window.location='print_order.php'; alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";

    }
    }
}
//----------line----------------------------------- 
if(isset($_POST['submit'])){
$date = date("Y-m-d");
    $sToken = "TtFZS0MzB5528F1o8PqhRB7HxfKuBMkLaYae3edJLKG";
	$sMessage = "ตื่นๆ ออเดอเข้า \n";
	$sMessage = "วันที่".$date."\n";
	$sMessage = "มีการสั่งซื้อ \n";
	$sMessage .= "เลขที่ใบสั่งซื้อ ".$orderID. " \n";
	$sMessage .= "ลูกค้าชื่อ ".$cusName. " \n";
	$sMessage .= "ที่อยู๋ ".$cusAddress. " \n";
	$sMessage .= "เบอร์โทร ".$cusTel. " \n";

	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
// 	if(curl_error($chOne)) 
// 	{ 
// 		echo 'error:' . curl_error($chOne); 
// 	} 
// 	else { 
// 		$result_ = json_decode($result, true); 
// 		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
// 	} 

        if($result){
            $_SESSION['success'] = "ส่งข้อมูลเข้าไลน์แล้ว";
            header("location: print_order.php");

        }else{
            $_SESSION['error'] = "ไม่สำำเร็จ";
            header("location: print_order.php");

        }




	curl_close( $chOne );  


}
//----------------------------------------------




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
