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

$id = $_POST['id'];
$name_major = $_POST['name_major'];

$sql = "UPDATE major SET id = '".$id."',name_major = '".$name_major."' WHERE id = '".$id."'";

if ($conn->query($sql) === TRUE) {
    header('Location: major_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>