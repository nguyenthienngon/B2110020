<!DOCTYPE HTML>
<html>
<body>
<?php
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

// Lấy thông tin major hiện tại từ URL hoặc form
$major_id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : '');

// Truy vấn dữ liệu major theo ID
$query_major = "SELECT * FROM major WHERE id='$major_id'";
$result_major = $conn->query($query_major);
$row = $result_major->fetch_assoc();

// Kiểm tra xem có dữ liệu được gửi từ form không
if (isset($_POST["id"]) && isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["birth"]) && isset($_POST["major"])) {
    $id = $_POST["id"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $birth = $_POST["birth"];
    $major = $_POST["major"];

    // Cập nhật dữ liệu trong bảng student
    $sql = "UPDATE student SET fullname='$fullname', email='$email', Birthday='$birth', major_id='$major' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin thành công";
        header('Location: taidulieu_bang1.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

</body>
</html>