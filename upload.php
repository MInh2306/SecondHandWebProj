<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hiển thị ảnh</title>
</head>

<body>
    <h2>Ảnh đã tải lên</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
        $target_dir = "uploads/"; // Thư mục lưu trữ ảnh tải lên
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_file = "uploads/" . $_FILES["fileToUpload"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


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

        // Chỉ chấp nhận các định dạng ảnh cụ thể (ở đây chấp nhận jpeg, jpg, png)
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo "Xin lỗi, chỉ chấp nhận tệp JPG, JPEG, PNG.";
            $uploadOk = 0;
        }

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
    ?>
</body>

</html>