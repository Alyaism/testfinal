<?php session_start();?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document</title>
    <!-- เชื่อมboostrap css -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- เชื่อมboostrap js -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        <?php include('style.css') ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
           
            <div class="col-md-4 bg-light badge text-danger text-dark"><br>
            <h5>login</h5>
                
                <form method="post" action="login_check.php">
                    <input type="text" name="username" class="form-control" required placeholder="๊อ่านหาพ่อ"><br>
                    <input type="text" name="password" class="form-control" required placeholder="password"><br>
                   <?php
                   if(isset($_SESSION['error'])){
                    echo "<div class='text-danger'>";
                    echo $_SESSION['error'];
                    echo"</div>";
                    unset($_SESSION['error']);
                   }
                   ?>
                   <br>
                    <input type="submit" name="submit" value="LOgin" class="btn btn-success">

                </form>


            </div>
        <a href="register.php">register</a>

        </div>

        
    </div>
</body>

</html>