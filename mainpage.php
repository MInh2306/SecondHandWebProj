<?php
// print_r($_POST);


//tạo câu lệnh sql
$sql = "SELECT * FROM `item3`";

//tạo connect tới sever 
$conn = new mysqli("localhost", "root", "", "secondhand");
if ($conn->connect_errno) {
    die($conn->connect_error);
}

//chạy lệnh sql trên sever qua biến/cổng connect
$rs = $conn->query($sql); //SQL文をサーバーに送信し実行

//lấy giá trị và sử dụng (optional)
$row = $rs->fetch_assoc(); //lấy dòng đầu tiên của bảng vừa query ra từ lệnh sql

// <table border="1">
//             <?php
//             echo    '<tr>';
//             echo        '<th>Tên sản phẩm</th>';
//             echo        '<th>Giá sản phẩm</th>';
//             echo        '<th>Chi tiết sản phẩm</th>';
//             echo        '<th>Người đăng</th>';
//             echo    '</tr>';
//             while ($row) {
//                 echo    '<tr>';
//                 echo        '<td>' . $row['item_name'] . '</td>';
//                 echo        '<td>' . $row['item_price'] . '</td>';
//                 echo        '<td>' . $row['item_detail'] . '</td>';
//                 echo        '<td>' . $row['upload_user'] . '</td>';
//                 echo    '</tr>';
//                 $row = $rs->fetch_assoc(); //次の行へ
//             }
//             
//</table>
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/reset.min.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Main page</title>
</head>

<body>
    <!--top-->
    <header class="page-header wrapper">
        <!-- <h1><a href="index.html"><img class="logo" src="" alt=""></a>Logo</h1> -->
        <form action="">
            <input type="text" name="tensp" placeholder="nhập sp cần tìm" />
            <input type="submit" name="a" value="Search" />
        </form>

        <nav>
            <ul class="main-nav">
                <li><a href="item_upload.html">đăng bài</a></li>
                <li><a href="#">thông báo</a></li>
                <li><a href="#">Chat</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header><!--đây là phần header gồm có navigation-->

    <div class="mainpage-content wrapper">
        <!-- ở đây để hiển thị những gì đã được lưu trong sever -->  
        <div class="item">
            <!-- <img src="img/xemay.jpg" alt=""> -->
            <p>Tên sản phẩm</p>
            <p>Giá</p>
            <p>Mô tả</p>
        </div>

        <div class="item">
            <!-- <img src="img/xemay2.jpg" alt=""> -->
            <p>Tên sản phẩm</p>
            <p>Giá</p>
            <p>Mô tả</p>
        </div>

    </div> <!--main-content-->


    <footer>
        footer
    </footer>
</body>

</html>