<?php include('condb.php') ?>
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
    <br><br>
    <div class="container"> 
        <br>
        <div class="row">
            <div class="col-md-6  bg-light">
        <div class="alert alert-info h4" role="alert">สมัครสมาชิก</div> สมัครสมาชิก
        <br>
        <form method="post" action="insert_register.php">
        ชท่อ ><input type="text" name="fname" class="form-control" required>
        นามสกุล ><input type="text" name="lname" class="form-control" required>
        เบอโ?ร ><input type="number" name="tel"  class="form-control" required >
        username ><input type="text" name="username" class="form-control" required>
        password ><input type="password" name="password"  class="form-control" required>
        <br>
        <input type="submit" name="submit" class="btn btn-success" value="ยืนยัน">
        <input type="reset" name="cancle" class="btn btn-danger" value="ยกเลิกก">
        </form>
        <br>

        <a href="regisp.php">login</a>
        </div>
        </div>








    </div>
    
</body>
</html>