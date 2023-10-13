<?php
session_start(); 
if(isset($_POST['submit'])){
    $pname= $_POST['pname'];
    $email=$_POST['email']; 
    $address =$_POST['address'];
    
    
    $sToken = "TtFZS0MzB5528F1o8PqhRB7HxfKuBMkLaYae3edJLKG";
	$sMessage = "ตื่นๆ ออเดอเข้า \n";
	$sMessage .= "ชื่อ ".$pname. " \n";
	$sMessage .= "email ".$email. " \n";
	$sMessage .= "ที่อยู๋ ".$address. " \n";




	
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
            header("location: fr_user_test.php");

        }else{
            $_SESSION['error'] = "ไม่สำำเร็จ";
            header("location: fr_user_test.php");

        }




	curl_close( $chOne );  


}



?>