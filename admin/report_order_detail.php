<?php include('../condb.php'); 
$ids=$_GET['id']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include('menu.php'); ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="alert alert-warning text-center h4" role="alert">
                            รายการสั่งซื้อสินค้าตามใบสั่งซื้อ
                        </div>
                        <i class="fas fa-table me-1"></i>
                        รายการสั่งซื้อสินค้าตามใบสั่งซื้อ
                        <div class="mt-1">
                            <a href="report_order.php" type="button" class="btn btn-outline-success">กลับหน้าหลัก</a>

                        </div>
                        <br>


                    </div>
                    <div class="card-body">
                        <h5>เลขที่ใบสั่งซื้อ <?=$ids?></h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสสินค้า</th> 
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ราคารวม</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM  order_detail d, product p ,tb_order t
                                 WHERE t.orderID = d.orderID and d.product_id=p.product_id AND d.orderID = '$ids'
                                 ORDER BY d.product_id";
                                $result = mysqli_query($conn, $sql);
                                $sum_total = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $sum_total = $row['total_price'];
                                ?>
                                    <tr>
                                        <td><?= $row['product_id'] ?></td>
                                        <td><?= $row['product_name'] ?></td>
                                        <td><?= $row['orderPrice'] ?></td>
                                        <td><?= $row['orderQty'] ?></td>
                                        <td><?= $row['Total'] ?></td>

                                    </tr>
                                <?php }

                                mysqli_close($conn);

                                ?>

                            </tbody>
                        </table>
                        <b>รวมเป็นเงินสุทธิ <?=number_format($sum_total,2)?> บาท</b>
                    </div>
                </div>
            </div>
        </main>

        <?php include('footer.php') ?>

    </div>
    </div>

</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>