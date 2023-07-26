<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mainpage_style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/item.css" <title>User Page</title>
</head>

<body>
    <!-- sửa header cho trang cá nhân -->
    <?php
    include("header.html");
    ?>
    <h1>Chào mừng bạn <?php echo $_SESSION['uname'] ?></h1>
    <a href="main_page.php">Back</a>
</body>

</html>