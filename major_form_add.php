<!DOCTYPE HTML>
<html>  
<body>
<?php

var_dump($_POST);

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

?>

<form action="major_add.php" method="post">
        ID: <input type="text" name="major_id"><br>
        Tên Ngành: <input type="text" name="majorname"><br>
        <input type="submit" value="Add">
    </form>

</body>
</html>