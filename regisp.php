<?php include('condb.php');  ?>

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
    <link href="admin/css/styles.css" rel="stylesheet" />
    
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">
    <?php include('admin/menu.php'); ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <div class="row">
                <div class="col-md-6 card alert-danger">
                    <div class="card-header alert alert-danger text-center h4" role="alert">
                        เพิ่มข้อมูลพนักงาน
                    </div>
                    <div class="card-body bg-info">
                        <form method="post" action="insert_register.php">
                            ชท่อ ><input type="text" name="fname" class="form-control" required>
                            นามสกุล ><input type="text" name="lname" class="form-control" required>
                            เบอโ?ร ><input type="number" name="tel" class="form-control" required>
                            username ><input type="text" name="username" class="form-control" required>
                            password ><input type="password" name="password" class="form-control" required>
                            <br>
                            <input type="submit" name="submit" class="btn btn-success" value="ยืนยัน">
                            <input type="reset" name="cancle" class="btn btn-danger" value="ยกเลิกก">
                        </form>
                        <br>

                    </div>
                </div>
                </div>




            </div>
        </main>

        <?php include('admin/footer.php') ?>

    </div>
    </div>

</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="admin/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="admin/assets/demo/chart-area-demo.js"></script>
<script src="admin/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="admin//js/datatables-simple-demo.js"></script>
<script>
    function del(mypage) {
        var agree = confirm('ต้องการยกเลิกใบสั่งซื้อสินค้าหรือไม่');
        if (agree) {
            window.location = mypage;
        }
    }

    function del1(mypage) {
        var agree = confirm('ต้องการเปลี่ยนสถานะการชำระเงินหรือไม่');
        if (agree) {
            window.location = mypage;
        }
    }
</script>