<?php include('condb.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- เชื่อมboostrap css -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- เชื่อมboostrap js -->
     <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        <?php include('style.css')?>
    </style>
</head>
<body>
<?php include('menu.php')?>
    <div class="container">
        <div class="row">
            <?php
             $idget=$_GET['id'];
            $sql ="SELECT * FROM product, TYPE WHERE product.type_id= type.type_id AND product.product_id='$idget' ";
            $result= mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            ?>
            <div class="col-md-3">
                <img src="img/<?=$row['product_img']?>" width="500">
            </div>
            <div class="col-md7">
                <h5><?=$row['product_name']?></h5>
                <p>ประเภท <?=$row['type_name']?></p>
                <p>ดีเทล <?=$row['product_detail']?></p>
                <p>ราคา <?=$row['product_price']?> บาท</p>
                <a type="button" class="btn btn-1" href="order.php?id=<?=$row['product_id']?>">เพิ่มไปยังตะกร้า</a>

            </div>

        </div>

</div>
<?php mysqli_close($conn);?>
<h1>ไอ่โปร ไอ่ควาย</h1>


</body>
</html>