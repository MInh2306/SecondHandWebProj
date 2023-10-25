<?php
session_start();
//print_r($_POST);
$item_id = $_POST['item_id']; //id nhận từ trang main-page
$sql = "SELECT * FROM `item3` WHERE item_id = '{$item_id}'";
//create connect to sever
$conn = new mysqli("localhost", "root", "", "secondhand"); //tạo kết nối
//check error 
if ($conn->connect_errno) {
    die($conn->connect_error);
}
$rs = $conn->query($sql); //SQL文をサーバーに送信し実行
$row = $rs->fetch_assoc(); //問合せ結果を1行受け取る
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Item detail</title>
</head>

<body>
    
    <?php
    include("header.html");
    ?>

    <div class="item-detail wrapper">
        <div class="itemdetail-image">
            <img src="uploads/<?php echo $row['item_img']?>" alt="không có ảnh">
        </div>

        <div class="itemdetail-decrible">
            <div class="decrible">
                <ul>
                    <li>
                        <h2><?php echo 'Tên sản phẩm: '. $row['item_name'] ?></h2>
                    </li>
                    <li>
                        <h2><?php echo 'Giá: '.$row['item_price'] . '￥' ?></h2>
                    </li>
                    <li>
                        <p><?php echo 'Mô tả: '.$row['item_detail'] ?></p>
                    </li>
                </ul>
            </div> <!--decrible--->

            <form action="item_buy_v2.php" method="post">
                <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>" />
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['uid'] ?>" />
                <input class="btn" type="submit" name="a" value="buy" />
            </form> <!--item_buy.php--->

        </div>
    </div> <!---item detail-->

    <!--footer-->
    <?php
    include("footer.html");
    ?>
</body>

</html>