<?php
//khởi tạo phiên làm việc (trang nào có cái này mới sử dụng được) 
session_start();
?>

<?php
//print_r($_POST);//配列の要素を再帰的に出力（要素が配列の場合でもOK）
$uid = $_POST['username']; //lấy tên đăng nhập
$pass = $_POST['pwd'];     //lấy mật khẩu
$sql = "SELECT * FROM user WHERE uid = '{$uid}'  AND upass='{$pass}'"; //tạo câu lệnh sql 
$conn = new mysqli("localhost", "root", "", "secondhand"); //tạo kết nối
if ($conn->connect_errno) {
  die($conn->connect_error);
}

$rs = $conn->query($sql); //SQL文をサーバーに送信し実行
$row = $rs->fetch_assoc(); //問合せ結果を1行受け取る

//check xem pass và user đúng không
if ($row) { //nếu có kq trả về (tức là uid và upass đúng)

  // chuyển đến trang mainpage
  header('Location: main_page.php');
  
  //tạo biến session để có thể sử dụng được ở hết tất cả các trang 
  $_SESSION['uid'] = $row['uid']; //$_SESSION['key'] = value;
  $_SESSION['uname'] = $row['uname'];
  
} else {
  echo '<h2>ログイン失敗！ユーザIDもしくはパスワードが間違いました！</h2>';
  echo '<a href="login_page.html">戻る</a>';
}
?>