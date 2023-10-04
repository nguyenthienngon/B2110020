<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $majorId = $_POST["major_id"];
    $majorName = $_POST["majorname"];

    // Kiểm tra xem trường Major Name và Major Id có được nhập hay không
    if (empty($majorName) || empty($majorId)) {
        echo "Major Name và Major Id không được để trống";
    } else {
        // Thực hiện truy vấn để thêm dữ liệu vào bảng major
        $sql = "INSERT INTO major (id, name_major) VALUES ('$majorId', '$majorName')";

        if ($conn->query($sql) === TRUE) {
            header('Location: major_index.php');
            echo "Thêm dữ liệu thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>