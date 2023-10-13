<?php
session_start();
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
        <form method="post" action="test_insert_line.php">
            <h4 class="mt-4 mb-4">test line notification</h4>
            <?php
            if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php
            }
            ?>
            <br>
            name :
            <input type="text" name="pname" class=" form-control mb-4" required>
            email :
            <input type="text" name="email" class=" form-control mb-4" required>
            address :
            <textarea name="address" class=" form-control" rows="3" required></textarea>
            <button type="submit" name="submit" class="btn btn-primary mt-4">submit</button>

        </form>
    </div>
</body>

</html>