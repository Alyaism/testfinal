<?php
session_start();
include('condb.php');
$sql = "SELECT * FROM tb_order WHERE orderID = '" . $_SESSION['order_ID'] . "' ";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$total = $rs['total_price'];
?>


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
        <?php include('style.css') ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-primary h4 text-center mt-5" role="alert">
                    การสั่งชื้อเสร็จสมบูรณ์
                </div>
                เลขที่การสั่งซื้อ = <?= $rs['orderID'] ?> <br>
                ชื่อ-นามสกุล = <?= $rs['cus_name'] ?> <br>
                ที่อยู่การจัดส่ง = <?= $rs['address'] ?> <br>
                เบอร์ = <?= $rs['telephone'] ?> <br>
                <br>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>รหัสสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวนที่สั่ง</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <?php
                    $sql1 = "SELECT * FROM order_detail d,product p WHERE (d.product_id = p.product_id) AND 
                     (d.orderID ='" . $_SESSION['order_ID'] . "') ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($row = mysqli_fetch_array($result1)) {


                    ?>
                        <tbody>
                            <tr>
                                <td><?= $row['product_id'] ?></td>
                                <td><?= $row['product_name'] ?></td>
                                <td><?= $row['product_price'] ?></td>
                                <td><?= $row['orderQty'] ?></td>
                                <td><?= $row['Total'] ?></td>
                            </tr>
                        </tbody>
                    <?php
                    }  ?>
                </table>
                
                <h4 class="text-end">รวมเป็นเงิน <?=number_format($total,2)?> บาท</h4>
                <tr>
                </div>
                <?php
                echo ("dddd");
                print_r($row);    ?>
            </div>
            <a class="btn btn-primary" href="product.php"> back </a>
            <button onclick="window.print()" class="btn btn-success" href=""> print</button>
        </div>
    </div>
    print
</body>

</html>