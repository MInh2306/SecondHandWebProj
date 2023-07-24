<?php
print_r($_POST);
$id = $_POST['item_id'];
$sql ="DELETE FROM item3 WHERE `item3`.`item_id` = '{$id}'";

//create connection and check 
$conn = new mysqli("localhost","root","","secondhand");
if ($conn->connect_errno) {
    die($conn->connect_error);
}
$rs = $conn->query($sql); //SQL文をサーバーに送信し実行
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