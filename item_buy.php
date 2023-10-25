<?php
//print_r($_POST);
session_start();
$item_id = $_POST['item_id'];
//lấy dữ liệu của sản phẩm
$sql = "SELECT `item_id`,`item_name`,`item_price`,`upload_user`,`uid` FROM `item3`WHERE item_id = '{$item_id}';";

//create connection and check 
$conn = new mysqli("localhost", "root", "", "secondhand");
if ($conn->connect_errno) {
    die($conn->connect_error);
}

//SQL文をサーバーに送信し実行
$rs = $conn->query($sql);

//問合せ結果を1行受け取る
$row = $rs->fetch_assoc();

// bỏ dữ liệu vừa thu được vào biến tạm thời
while ($row) {
    $item_id_tmp = $row['item_id'];
    $item_name_tmp = $row['item_name'];
    $item_price_tmp = $row['item_price'];
    $seller_name = $row['upload_user'];
    $seller_id = $row['uid'];
    $row = $rs->fetch_assoc();
}

//sql insert vào bảng history
//$sql2 = "INSERT INTO `buy_history`(`byer_id`, `item_id`, `item_name`, `item_price`, `seller_name`, `seller_id`) VALUES ('{$_SESSION['uid']}',$item_id_tmp, '$item_name_tmp',$item_price_tmp, '$seller_name', '$seller_id' );";
$sql2 = "INSERT INTO `buy_history_v2`(`byer_id`, `item_id`) VALUES ('{$_SESSION['uid']}',{$row['item_id']})";
//SQL文をサーバーに送信し実行
$rs2 = $conn->query($sql2);

// Xóa dữ liệu từ bảng item
if ($rs2) {
    //$sql_delete ="DELETE FROM item3 WHERE `item3`.`item_id` = '{$item_id}'";
    $sql_delete = "DELETE FROM item3 WHERE `item_id` = '$item_id_tmp'";
    $rs_delete = $conn->query($sql_delete);

    if ($rs_delete) {
        echo "Mua hàng thành công và đã cập nhật vào lịch sử mua hàng.";
    } else {
        echo "Lỗi khi xóa dữ liệu từ bảng item: " . $conn->error;
    }
} else {
    echo "Lỗi khi thêm vào bảng buy_history: " . $conn->error;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Page</title>
</head>

<body>
    <h1>Đã mua thành công</h1>
    <a href="main_page.php">Quay lại</a>
</body>

</html>