<!DOCTYPE HTML>
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
$sql = "select * FROM student WHERE ID='".$id."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<body>
<?php print_r($row)?>
<form action="sua.php" method="post">
ID:<input type="text" name="id" value="<?php echo $row['id'];?>"><br>
Name: <input type="text" name="fullname" value="<?php echo $row['fullname'];?>"><br>
E-mail: <input type="text" name="email"  value="<?php echo $row['email'];?>"><br>
Birthday: <input type="date" name="birth" value="<?php echo $row['Birthday'];?>"><br>
Major:
    <select name="major">
        <?php
        // Lấy dữ liệu từ bảng major
        $query = "SELECT * FROM major";
        $result = $conn->query($query);

        // Duyệt qua kết quả truy vấn và tạo các option cho combobox
        while ($major = $result->fetch_assoc()) {
            $selected = ($major['id'] == $row['major_id']) ? 'selected' : '';
            echo '<option value="' . $major['id'] . '" ' . $selected . '>' . $major['id'] . '</option>';
        }
        ?>
    </select>
<input type="submit">
</form>

</body>
</html>
