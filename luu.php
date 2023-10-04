<?php
var_dump($_POST);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem các trường dữ liệu đã được gửi từ form chưa
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["birth"]) && isset($_POST["major_id"])) {
    $date = date_create($_POST["birth"]);
    $fullname = $_POST["name"];
    $email = $_POST["email"];
    $birthday = $date->format('Y-m-d');
    $major_id = $_POST["major_id"];

    // Câu lệnh SQL để chèn dữ liệu vào bảng student
    $sql = "INSERT INTO student (fullname, email, birthday, major_id) VALUES ('$fullname', '$email', '$birthday', '$major_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm sinh viên thành công";
        header('Location: taidulieu_bang1.php');
        exit; // Kết thúc script sau khi chuyển hướng
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Missing data from the form";
}

$conn->close();
?>