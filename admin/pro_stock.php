<?php session_start();
include('../condb.php');
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}

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
                
                
                <div class="card mb-4">
                    <div class="card-header">
                       <div class="alert alert-danger h4" role="alert">
                        รายการที่เหลือน้อยกว่า 10
                        </div>
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
                                $sql = "SELECT * FROM product p,type t WHERE p.type_id = t.type_id AND p.product_amount <= 10";
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