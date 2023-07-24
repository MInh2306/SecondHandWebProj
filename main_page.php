<?php
//print_r($_POST);//配列の要素を再帰的に出力（要素が配列の場合でもOK）
$sql = "SELECT * FROM `item3`"; //tạo câu lệnh sql 
$conn = new mysqli("localhost", "root", "", "secondhand"); //tạo kết nối
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
  <link rel="stylesheet" href="css/mainpage_style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/item.css">
  <title>Main page</title>
</head>

<body>
  <header class="page-header wrapper">
    <h1><a href="main_page.php">Logo</a></h1>
    <form action=""> <!----searching bar-->
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
  </header>

  <div class="main-content wrapper">
    <?php
    while ($row) {
      echo '<div class="item">';
      echo '    <div class="picture">';
      echo '        <img src="img/xemay.jpg" alt="" width="100" height="100">';
      echo '    </div>';
      echo '    <div class="decrible">';
      echo '        <p>Tên sản phẩm: ' . $row['item_name'] . '</p>';
      echo '        <p>Giá sản phẩm: ' . $row['item_price'] . '</p>';
      echo '    </div>';
      // echo '    <a class="btn" href="item_detail.html">Detail</a>';
      echo '    <form action="item_detail.php" method="post">';
      echo '        <input type="hidden" name="item_id" value="' . $row['item_id'] . '" />';
      echo '        <input class="btn" type="submit" name="a" value="Detail" />';
      echo '    </form>';
      echo '</div>';

      $row = $rs->fetch_assoc();
    }
    ?>

  </div>

  <footer>
    đây là footer
  </footer>
</body>

</html>