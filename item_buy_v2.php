<?php
//print_r($_POST);
session_start();
$item_id = $_POST['item_id'];

//create connection and check 
$conn = new mysqli("localhost", "root", "", "secondhand");
if ($conn->connect_errno) {
    die($conn->connect_error);
}

//check xem coi người mua có trùng người bán không
$sql_check = "SELECT `uid` FROM `item3` WHERE `item_id` = $item_id;";
$rs_check = $conn->query($sql_check);
$row_check = $rs_check->fetch_assoc(); //問合せ結果を1行受け取る

if ($row_check['uid'] == $_SESSION['uid']) {
    $buy = false;
} else {
    $buy = true;
}

//bỏ vào bảng lịch sử mua hàng buy_history_v2`(`byer_id`, `item_id`)
if ($buy) {
    $sql2 = "INSERT INTO `buy_history_v2`(`byer_id`, `item_id`) VALUES ('{$_SESSION['uid']}', '{$item_id}')";
    $rs2 = $conn->query($sql2); //SQL文をサーバーに送信し実行
    echo "Mua thành công <br>";
}else{
    echo "Bạn không thể mua đồ của mình <br>";
}


// // Xóa dữ liệu từ bảng item
// if ($buy) {
//     $sql_delete = "DELETE FROM item3 WHERE `item_id` = '$item_id'";
//     $rs_delete = $conn->query($sql_delete);

//     if ($rs_delete) {
//         echo "Đã cập nhật vào bảng history_v2 <br>";
//     } else {
//         echo "Lỗi khi xóa dữ liệu từ bảng item: <br>" . $conn->error;
//     }
// }
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
    <a href="main_page.php">Quay lại</a>
</body>

</html>