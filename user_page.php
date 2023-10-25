<?php
session_start();
//bài đã đăng
$sql = "SELECT * FROM `item3` WHERE `upload_user` = '{$_SESSION['uname']}'";
$conn = new mysqli("localhost", "root", "", "secondhand"); //tạo kết nối
if ($conn->connect_errno) {
    die($conn->connect_error);
}
$rs = $conn->query($sql); //SQL文をサーバーに送信し実行
$row = $rs->fetch_assoc(); //問合せ結果を1行受け取る

//lịch sử mua hàng
//$sql_history = "SELECT * FROM `buy_history_v2` WHERE `byer_id` ='{$_SESSION['uid']}';";
$sql_history = "SELECT buy_history_v2.byer_id,item3.*, item3.uid AS seller_id FROM buy_history_v2 INNER JOIN item3 ON buy_history_v2.item_id = item3.item_id WHERE buy_history_v2.byer_id = '{$_SESSION['uid']}';";
$rs_history = $conn->query($sql_history); //SQL文をサーバーに送信し実行
$row_history = $rs_history->fetch_assoc(); //問合せ結果を1行受け取る
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>User Page</title>
</head>

<body>
    <header class="page-header wrapper">
        <h1><a href="main_page.php"><img class="logo" src="/SecondHandWebProj/img/market.svg" alt="WCBカフェホーム"></a></h1>
        <form action="">
            <!----searching bar-->
            <input type="text" id="search" name="search-key">
            <input type="submit" id="submit" name="search">
        </form>
        <nav>
            <ul class="main-page-nav">
                <li><a href="item_upload.html">đăng bài</a></li>
                <li><a href="user_page.php">trang cá nhân của
                        <?php echo $_SESSION['uname'] ?>
                    </a></li>
                <!-- <li><a href="user_page.php"><img class="nav-logo" src="/SecondHandWebProj/img/user-nav-logo.svg" alt="WCBカフェホーム"></a></li> -->
                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="wrapper">Chào mừng bạn <?php echo $_SESSION['uid'] ?></h1>
    
    <!-- backup -->
    <?php
    //sản phẩm đã đăng
    if (isset($row)) {
        echo '<h1 class= "wrapper">Sản phẩm đã đăng</h1>';
        echo '<div class="main-content wrapper">';
        while ($row) {
            echo '<div class="item">';
            echo '    <div class="picture">';
            echo '        <img src="uploads/' . $row['item_img'] . '" alt="không có ảnh" width="100" height="100">';
            echo '    </div>';
            echo '    <div class="decrible">';
            echo '        <p>ID sản phẩm: ' . $row['item_id'] . '</p>';
            echo '        <p>Tên sản phẩm: ' . $row['item_name'] . '</p>';
            echo '        <p>Giá sản phẩm: ' . $row['item_price'] . '</p>';
            echo '        <p>Người đăng: ' . $row['upload_user'] . '</p>';
            echo '    </div>';
            echo '    <form action="item_detail.php" method="post">';
            echo '        <input type="hidden" name="item_id" value="' . $row['item_id'] . '" />';
            echo '        <input class="btn" type="submit" name="a" value="Detail" />';
            echo '    </form>';
            echo '</div>'; //item
            $row = $rs->fetch_assoc();
        }
        echo '</div>'; //main-content wrapper
    } else {
        echo '<h1>Không có sản phẩm được đăng</h1>';
    }
    ?>

    <?php
    //lịch sử mua hàng
    if (isset($row_history)) {
        echo '<h1 class= "wrapper">Lịch sử mua hàng</h1>';
        echo '<div class="main-content wrapper">';
        while ($row_history) {
            echo '<div class="item">';
            echo '    <div class="picture">';
            echo '        <img src="uploads/' . $row_history['item_img'] . '" alt="không có ảnh" width="100" height="100">';
            echo '    </div>';
            echo '    <div class="decrible">';
            echo '        <p>ID sản phẩm: ' . $row_history['item_id'] . '</p>';
            echo '        <p>Tên sản phẩm: ' . $row_history['item_name'] . '</p>';
            echo '        <p>Giá sản phẩm: ' . $row_history['item_price'] . '</p>';
            echo '        <p>Người đăng: ' . $row_history['seller_id'] . '</p>';
            echo '    </div>';
            echo '</div>'; //item
            $row_history = $rs_history->fetch_assoc();
        }
        echo '</div>'; //main-content wrapper
    } else {
        echo '<h1>Không có sản phẩm đã mua</h1>';
    }
    ?>
    <a class="wrapper" href="main_page.php">Back</a>
</body>

</html>