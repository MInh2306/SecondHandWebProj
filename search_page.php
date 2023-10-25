<?php
session_start();
?>

<?php
$search_key = $_POST['search_key'];

//create connect to sever
$conn = new mysqli("localhost", "root", "", "secondhand"); //tạo kết nối
//check error 
if ($conn->connect_errno) {
    die($conn->connect_error);
}
//tạo câu lệnh query
$sql = "SELECT * FROM `item3` WHERE `item_name` LIKE '%$search_key%';";
$rs = $rs = $conn->query($sql); //SQL文をサーバーに送信し実行
$row = $rs->fetch_assoc(); //問合せ結果を1行受け取る
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Main page</title>
</head>

<body>
    <?php
    if (isset($_SESSION['uid'])) {
        include("header.html");
        echo '<div class="search-message wrapper">';
        echo '    <h2>kết quả tìm kiếm: '.$search_key.'</h2>';
        echo '</div>';
        
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
        echo '<h2>このページは、ログインしないと利用できません！</h2>';
        echo '<a href="login.html">ログイン</a>';
    }

    ?>

    <?php
    include("footer.html");
    ?>
</body>

</html>