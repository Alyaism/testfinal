<?php

use Mpdf\Tag\TBody;

session_start();
include('condb.php');
/* $id = $_GET['id'];
$sql = "SELECT * FROM product WHERE product_id ='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); */
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
    <?php include('menu.php') ?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            รายการสั่งซื้อ
        </div>
        <form id="form1" method="POST" action="insert_cart.php">
            <div class="row">
                <div class="col-md">
                    <table class="table table-hover">
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชท่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th> เพิ่ม - ลด</th>
                            <th>ลบ</th>
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                        $total = 0;
                        $sumprice = 0;
                        $m = 1;
                       $sumtotal = 0;
                    
                        if (isset($_SESSION["intLine"])) {
                            for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                                if ($_SESSION["strProductID"][$i] != "") {
                                    $sql1 = "SELECT * FROM product WHERE product_id ='" . $_SESSION["strProductID"][$i] . "'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $row1 = mysqli_fetch_array($result1);
                                    $_SESSION["price"] = $row1['product_price'];
                                    $total = $_SESSION["strQty"][$i];
                                    $sum = $total * $row1['product_price'];
                                    $sumprice = $sumprice + $sum;
                                    $_SESSION["sumPrice"] = $sumprice;
                                    // $sumprice = number_format($sumprice, 2);
                                    $sumtotal=$sumtotal+$total;
                        ?>
                                    <tr>
                                        <td><?= $m ?></td>
                                        <td>
                                            <img src="img/<?= $row1['product_img'] ?>" width="100" height="100" class="border">
                                            <?= $row1['product_name']; ?>
                                        </td>
                                        <td><?= $row1['product_price']; ?></td>
                                        <td><?= $_SESSION["strQty"][$i] ?></td>
                                        <td><?= $sum ?></td>
                                        <td>
                                            <a href="order.php?id=<?= $row1['product_id'] ?>" class="btn btn-outline-success">+</a>
                                            <?php if ($_SESSION["strQty"][$i] > 1) {

                                            ?>
                                                <a href="order_del.php?id=<?= $row1['product_id'] ?>" class="btn btn-outline-danger">-</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <h3><a href="delete.php?Line=<?= $i ?>"> x</a></h3>
                                        </td>
                                    </tr>
                        <?php
                                    $m = $m + 1;
                                }
                            }
                        }
                        mysqli_close($conn);
                        ?>
                        <tr>
                            <td class="text-end" colspan="6">รวมเป็นเงิน <?= $sumprice ?> บาท</td>
                        </tr>
                        </tbody>
                    </table>
                    <p>จำนวนที่สั้งซื้อ  <?=$sumtotal?>  อย่าง</p>
                    <div style="text-align:right">
                        <a type="button" class="btn btn-1" href="product.php">เลือกสินค้า</a>
                        <button type="submit" name="submit" class="btn btn-1">ยืนยัน</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-primary h4" role="alert">ข้อมูล</div>

                    ชื่อ-สกุล
                    <input type="text" name="cus_name" class="form-control" required placeholder="name....."><br>
                    ที่อยู่
                    <textarea name="cus_add" rows="3" class="form-control" required placeholder="ที่อยู๋....."></textarea><br>
                    เบอนร์
                    <input type="number" name="cus_tel" class="form-control" required placeholder="tel....."><br>

                </div>
            </div>
        </form>
        
        <br><br><br>
    </div>



</body>

</html>