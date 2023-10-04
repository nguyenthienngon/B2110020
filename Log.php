<?php
 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("SELECT id, fullname, email FROM customers WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $_POST["email"], md5($_POST["pass"]));
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
 
  $row = $result->fetch_assoc();
  
 
  $session_name = "user";
  $session_value = $row['email'] ;
  $_SESSION['fullname'] = $row['fullname'];
  $_SESSION['id'] = $row['id'];
  $_SESSION['$session_name'] = $row['$session_value'];    
  
  header('Location: homepage.php');
  
} else {
  echo "Error: Invalid email or password" . $conn->error;
  //Tro ve trang dang nhap sau 3 giay
  // header('Refresh: 3;url=login.php');

}

$conn->close();
?>
