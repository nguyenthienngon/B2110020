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

// Lấy dữ liệu từ bảng major
$query = "SELECT id, name_major FROM major";
$result = $conn->query($query);
?>

<form action="luu.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Birthday: <input type="date" name="birth"><br>
    Major-ID: <select name="major_id">
        <?php
        // Duyệt qua kết quả truy vấn và tạo các option cho combobox
        while ($major = $result->fetch_assoc()) {
            echo '<option value="' . $major['id'] . '">' . $major['id'] . '</option>';
        }
        ?>
    </select>
    <input type="submit">
</form>
</body>
</html>