<?php session_start();
include('../condb.php');
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}


// <!-- รายการไม่ชำระเงิน -->
$sqlno ="SELECT COUNT(orderID) AS order_no FROM tb_order WHERE order_status = 1";
$handno =mysqli_query($conn,$sqlno);
$rowno = mysqli_fetch_array($handno);

// <!-- รายการชำระเงินc]h; -->
$sqlyes ="SELECT COUNT(orderID) AS order_yes FROM tb_order WHERE order_status = 2";
$handyes =mysqli_query($conn,$sqlyes);
$rowyes = mysqli_fetch_array($handyes);


// <!-- ยกเลิก -->
$sqlcan ="SELECT COUNT(orderID) AS order_can FROM tb_order WHERE order_status = 0";
$handcan =mysqli_query($conn,$sqlcan);
$rowcan = mysqli_fetch_array($handcan);


// <!-- สินค้าน้อยกว่า10 -->
$sqlp ="SELECT COUNT(product_id) AS pro_num FROM product WHERE product_amount < 10";
$handp=mysqli_query($conn,$sqlp);
$rowp = mysqli_fetch_array($handp);


?>




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
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><h4>ยังไมาชำระงิน<br>[<?=$rowno['order_no']?>]</h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><h4>ชำระเงินแล้ว<br>[<?=$rowyes['order_yes']?>]</h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_yes.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><h4>ยกเลิก<br>[<?=$rowcan['order_can']?>]</h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_no.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><h4>สินค้าที่น้อยกว่า 10 <br>[<?=$rowp['pro_num']?>]</h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อ</th>
                                    <th>รายละเอียด</th>
                                    <th>ประเภท</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>เพิ่มสต้อก</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>product_img</th>
                                    <th>product_id</th>
                                    <th>product_name</th>
                                    <th>detail</th>
                                    <th>type_name</th>
                                    <th>product_price</th>
                                    <th>product_amount</th>

                                </tr>
                            </tfoot>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM product p,type t WHERE p.type_id = t.type_id";
                                $hand = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($hand)) {

                                ?>
                                    <tr>
                                        <td><img src="../img/<?=$row['product_img']?>" width="100" height="100"></td>
                                        <td><?=$row['product_id']?></td>
                                        <td><?=$row['product_name']?></td>
                                        <td><?=$row['product_detail']?></td>
                                        <td><?=$row['type_name']?></td>
                                        <td><?=$row['product_price']?></td>
                                        <td><?=$row['product_amount']?></td>
                                        <td><a class=" btn btn-success"  href="addStock.php?id=<?=$row['product_id']?>">เพิ่มสินค้า</a></td>
                                    </tr>
                                <?php
                                }
                                mysqli_close($conn);

                                ?>


                            </tbody>
                        </table>
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