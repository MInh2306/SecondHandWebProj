<?php
  //print_r($_POST);//配列の要素を再帰的に出力（要素が配列の場合でもOK）
  $uid = $_POST['username']; //lấy tên đăng nhập
  $pass = $_POST['pwd'];     //lấy mật khẩu
  $sql = "SELECT * FROM user WHERE uid = '{$uid}'  AND upass='{$pass}'"; //tạo câu lệnh sql 
  $conn = new mysqli("localhost","root","","secondhand"); //tạo kết nối
  if ($conn->connect_errno) {
    die($conn->connect_error);
  }

  $rs = $conn->query($sql); //SQL文をサーバーに送信し実行
  $row = $rs->fetch_assoc(); //問合せ結果を1行受け取る

  //check xem pass và user đúng không
  if ($row){ //nếu có kq trả về (tức là uid và upass đúng)
    //print_r($row); //受け取ったデータ（配列）を表示して、内容を確認するー＞デバッグ時
    //echo '<h2>ログイン成功！'. $row['uname'] . 'さん</h2>';
    //header('Location: main_page.html');// chuyển đến trang mainpage\
    header('Location: main_page.php');
  }else{
    echo '<h2>ログイン失敗！ユーザIDもしくはパスワードが間違いました！</h2>';
    echo '<a href="index.html">戻る</a>';
  }
?>