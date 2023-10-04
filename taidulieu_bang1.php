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

$sql = "SELECT student.id, student.fullname, student.email, student.Birthday, major.id 
AS major_id, major.name_major 
FROM student JOIN major ON student.major_id = major.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  // Trình bày bằng bảng HTML
  $result_all = $result->fetch_all(MYSQLI_ASSOC);
  echo "<h1>Bảng dữ liệu sinh viên</h1>";
  echo "<table border='1'><tr><th>ID</th><th>Họ tên</th><th>Email</th><th>Ngày sinh</th><th>Mã chuyên ngành</th><th>Tên chuyên ngành</th><th colspan='2'>Hành động</th></tr>";

  // Xuất dữ liệu của mỗi hàng
  foreach ($result_all as $row) {
    $date = date_create($row['Birthday']);
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>" . $date->format('d-m-Y'). "</td><td>" . $row["major_id"]. "</td><td>" . $row["name_major"]. "</td><td>";
    echo "<form method='post' action='xoa.php'> 
          <input type='submit' name='action' value='xóa'/>
          <input type='hidden' name='id' value='" . $row['id'] . "'/>
          </form>";
    echo "</td>";
    echo "<td>";
    echo "<form method='post' action='form_sua.php'> 
          <input type='submit' name='action' value='sửa'/>
          <input type='hidden' name='id' value='" . $row['id'] . "'/>
          </form>";
    echo "</td></tr>";
  }

  echo "</table>";
  
} else {
  echo "Không có kết quả trả về";
}

$conn->close();
?>