<?php
// print_r($_POST);
//lấy kết quả bỏ vào biến
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_detail = $_POST['item_detail'];

//tạo câu lệnh sql
$sql = "INSERT INTO item3 (item_name, item_price, item_detail)
VALUES('{$item_name}', {$item_price}, '{$item_detail}');";

//tạo connect tới sever 
$conn = new mysqli("localhost", "root", "", "secondhand");
if ($conn->connect_errno) {
    die($conn->connect_error);
}

//chạy lệnh sql trên sever qua biến/cổng connect
$rs = $conn->query($sql); //SQL文をサーバーに送信し実行
//lấy giá trị và sử dụng (optional)
//$row = $rs->fetch_assoc(); //問合せ結果を1行受け取る
?>

<h1>đã cập nhật xong</h1>
<!-- <a href="main_page.html">quay lại</a> -->
<a href="main_page.php">quay lại</a>