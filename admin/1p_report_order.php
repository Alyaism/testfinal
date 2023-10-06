<?php include('../condb.php');  ?>

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
                        <i class="fas fa-table me-1"></i>
                        แสดงข้อมูลการสั่งซื้อสินค้า
                        <form method="post" action="">
                            <div class="mt-1">
                                <input type="submit" name="ข้อมูลทั้งหมด" class="btn btn-outline-primary" value="ข้อมูลทั้งหมด"></input>
                                <input type="submit" name="ชำระเงิน" class="btn btn-outline-success" value="ชำระเงิน"></input>
                                <input type="submit" name="ยังไม่ชำระเงิน" class="btn btn-outline-warning" value="ยังไม่ชำระเงิน"></input>
                                <input type="submit" name="ยกเลิก" class="btn btn-outline-danger" value="ยกเลิก"></input>
                            </div>
                        </form>

                    </div>
                    <div class="card-body">

                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>เลขที่ใบสั่งซื้อ</th>
                                    <th>ลูกค้า</th>
                                    <th>ที่อยู่การจัดส่ง</th>
                                    <th>เบอร์โทร</th>
                                    <th>ราคารวม</th>
                                    <th>วันที่สั่ง</th>
                                    <th>สถานะการสั่งซื้อ</th>
                                    <th>ยกเลิกการสั่งซื้อ</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>orderID</th>
                                    <th>cus_name</th>
                                    <th>address</th>
                                    <th>telephone</th>
                                    <th>total_price</th>
                                    <th>reg_date</th>
                                    <th>สถานะการสั่งซื้อ</th>
                                </tr>
                            </tfoot>



                            <tbody>

                                <?php

                                if (isset($_POST['ชำระเงิน'])) {
                                    $sql = "SELECT * FROM tb_order WHERE order_status = '2' ORDER BY reg_date DESC";
                                    $_POST['ชำระเงิน'] = "";
                                } elseif (isset($_POST['ยังไม่ชำระเงิน'])) {
                                    $sql = "SELECT * FROM tb_order WHERE order_status = '1' ORDER BY reg_date DESC";
                                    $_POST['ยังไม่ชำระเงิน'] = "";
                                } elseif (isset($_POST['ยกเลิก'])) {
                                    $sql = "SELECT * FROM tb_order WHERE order_status = '0' ORDER BY reg_date DESC";
                                    $_POST['ยกเลิก'] = "";
                                } elseif (isset($_POST['ข้อมูลทั้งหมด'])) {
                                    $sql = "SELECT * FROM tb_order ORDER BY reg_date DESC";
                                    $_POST['ข้อมูลทั้งหมด'] = "";
                                } else {
                                    $sql = "SELECT * FROM tb_order ORDER BY reg_date DESC";
                                }
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    $status = $row['order_status'];
                                ?>
                                    <tr>
                                        <td><?= $row['orderID'] ?></td>
                                        <td><?= $row['cus_name'] ?></td>
                                        <td><?= $row['address'] ?></td>
                                        <td><?= $row['telephone'] ?></td>
                                        <td><?= $row['total_price'] ?></td>
                                        <td><?= $row['reg_date'] ?></td>
                                        <td>
                                            <?php
                                            if ($status == 1) {
                                                echo "<b style='color:#CCCC00'>ยังไม่ชำระเงิน</b>";
                                            } else if ($status == 2) {
                                                echo "<b style='color:green'>ชำระเงินแล้ว</b>";
                                            } elseif ($status == 0) {
                                                echo "<b style='color:red'>ยกเลิก</b> ";
                                            } else {
                                                echo "เลขสถานะมีปัญหา";
                                            }
                                            ?>
                                        </td>

                                        <td> <?php if ($status == 1) { ?> <a class="btn btn-danger" href="cancel_order.php?id=<?= $row['orderID'] ?>" onclick="del(this.href); return false;">ยกเลิก</a> <?php }  ?> </td>
                                    </tr>
                                <?php }
                                echo " คำสั่ง sql ล่าสุด $sql ";
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
<script>
    function del(mypage) {
        var agree = confirm('ต้องการยกเลิกใบสั่งซื้อสินค้าหรือไม่');
        if (agree) {
            window.location = mypage;
        }
    }
</script>