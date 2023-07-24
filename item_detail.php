<?php
//print_r($_POST);
$id = $_POST['item_id']; //id nhận từ trang main-page
$sql = "SELECT * FROM `item3` WHERE item_id = '{$id}'";
//create connect to sever
$conn = new mysqli("localhost", "root", "", "secondhand"); //tạo kết nối
//check error 
if ($conn->connect_errno) {
    die($conn->connect_error);
}
$rs = $conn->query($sql); //SQL文をサーバーに送信し実行
$row = $rs->fetch_assoc(); //問合せ結果を1行受け取る
print_r($row);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/item_detail_style.css">
    <link rel="stylesheet" href="css/item.css">
    <title>Item detail</title>
</head>

<body>
    <header class="page-header wrapper">
        <h1><a href="main_page.php">Logo</a></h1>
        <form action="">
            <!----searching bar-->
            <input type="text" id="search" name="search-key">
            <input type="submit" id="submit" name="search">
        </form>
        <nav>
            <ul class="main-nav">
                <li><a href="item_upload.html">đăng bài</a></li>
                <li><a href="#">trang cá nhân</a></li>
                <li><a href="#">logout</a></li>
            </ul>
        </nav>
    </header> <!---header-->

    <div class="item-detail wrapper">
        <div class="itemdetail-image">
            <img src="img/xemay2.jpg" alt="xemay">
        </div>

        <div class="itemdetail-decrible">
            <div class="decrible">
                <ul>
                    <li>
                        <h2><?php echo $row['item_name'] ?></h2>
                    </li>
                    <li>
                        <h2><?php echo $row['item_price'] . '￥' ?></h2>
                    </li>
                    <li>
                        <p><?php echo $row['item_detail'] ?></p>
                    </li>
                </ul>
            </div> <!--decrible--->

            <form action="item_buy.php" method="post">
                <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>" />
                <!-- <input type="hidden" name="item_id" value=3 /> -->
                <input class="btn" type="submit" name="a" value="buy" />
            </form> <!--item_buy.php--->

        </div>
    </div> <!---item detail-->

    <footer>
        <div class="wrapper">
            <p><small>&copy; 2023 Minh</small></p>
        </div>
    </footer>
</body>

</html>