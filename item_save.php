<?php
session_start();
?>

<?php
// print_r($_POST);

//lấy kết quả nhận được từ form item_upload.html bỏ vào biến
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_detail = $_POST['item_detail'];

//sử dụng biến session để thêm tên ngừi đăng
$upload_user = $_SESSION['uname'];
$upload_uid = $_SESSION['uid'];

//xử lý upload ảnh
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {

    $target_file = "uploads/" . $_FILES["fileToUpload"]["name"];              //biến lưu vị trí tệp
    $uploadOk = 1;                                                            //biến check lỗi tổng
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));  //biến check lỗi kiểu file

    // Kiểm tra xem tệp đã tồn tại chưa
    if (file_exists($target_file)) {
        echo "Xin lỗi, tệp đã tồn tại.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước tệp (giới hạn kích thước tùy ý)
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Xin lỗi, tệp của bạn quá lớn.";
        $uploadOk = 0;
    }

    // Kiểm tra các định dạng ảnh cụ thể (ở đây chấp nhận jpeg, jpg, png)
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Xin lỗi, chỉ chấp nhận tệp JPG, JPEG, PNG.";
        $uploadOk = 0;
    }

    //Upload file vào tư mục target
    if ($uploadOk == 0) {
        echo "Xin lỗi, tệp của bạn không được tải lên.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Upload succeded";
            echo $_FILES["fileToUpload"]["name"];
        } else {
            echo "upload fail";
        }
    }
} else {
    echo "Xin lỗi, bạn cần tải lên một tệp.";
}

if ($uploadOk == 0) {
    echo "Xin lỗi, đăng bài không thành công";
} else {
    // Lấy tên tệp ảnh vừa tải lên
    $item_img = $_FILES["fileToUpload"]["name"];

    // Thêm tên tệp ảnh và thông tin vào cơ sở dữ liệu
    $sql = "INSERT INTO item3 (item_name, item_price, item_detail, upload_user, uid,item_img)
    VALUES('{$item_name}', {$item_price}, '{$item_detail}', '{$upload_user}','{$upload_uid}','{$item_img}');";

    //tạo connect tới sever 
    $conn = new mysqli("localhost", "root", "", "secondhand");
    if ($conn->connect_errno) {
        die($conn->connect_error);
    }
    $rs = $conn->query($sql); //SQL文をサーバーに送信し実行


}


?>

<h1>đã cập nhật xong</h1>
<!-- <a href="main_page.html">quay lại</a> -->
<a href="main_page.php">quay lại</a>