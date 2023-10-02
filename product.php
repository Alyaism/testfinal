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
<div class="container text-center">
<br><br>
    <div class="row ">
        <?php 
        $sql = "SELECT * FROM product ORDER BY product_id";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result)){
        ?>
        
        <div class="col-lg-3 col-md-4 col-sm-5 p-2 mb-2 ho">
            <div class="text-center">
                <div class="card"style="width:fluid;">
            <img src="img/<?=$row['product_img']?>" width="250px" height="250px"  class="card-img-top mt-1 p-1 border border-warning"> 
            <div class="card-body">
            <!-- <p>ID: <?=$row['product_id']?></p> -->
            <h5 class="card-title"><?=$row['product_name']?></h5>
            <p class="card-text"><font color="orange"><p class="fw-medium fs-4"> ฿<?=$row['product_price']?></p></font></p> 
            <a type="button" class="btn btn-1" href="detail_product.php?id=<?=$row['product_id']?>">รายละเอียด</a>
            <a type="button" class="btn btn-1" href="order.php?id=<?=$row['product_id']?>">เพิ่มไปยังตะกร้า</a>
            </div>
                </div>
            </div>

        ไอควยพีท
        </div>
        
        <?php 
        }
        mysqli_close($conn);
        ?>
    </div>
</div>



</body>
</html>