<?php session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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





</body>
<div class="container">
    <div class="alert alert-primary h4" role="alert">
        welcome
    </div>
    <?php
    if (isset($_SESSION['fname'])) {
        echo "<div class='text-danger'>";
        echo $_SESSION['fname']."  ". $_SESSION['lname'];
        echo "</div>";
        
    }
    ?>
    <a href="logout.php">LOgout</a>



</div>

</html>