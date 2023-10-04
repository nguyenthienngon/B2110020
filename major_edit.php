<!DOCTYPE html>
<html>
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

$id =  $_POST['id'];
$sql = "select * FROM major WHERE ID='".$id."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<head>
    <title>Chỉnh sửa bản major</title>
</head>
<body>
    <h2>Chỉnh sửa bản major</h2>
    <form method="POST" action="major_edit_save.php">
    ID:<input type="text" name="id" value="<?php echo $row['id'];?>"><br>
    Tên ngành: <input type="text" name="name_major" value="<?php echo $row['name_major'];?>"><br>
    <input type="submit" value="Cập nhật">
    </form>
</body>
</html>

