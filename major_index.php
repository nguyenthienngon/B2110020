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

$sql = "SELECT * FROM major";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  // trinh bay voi bang html
  //load du lieu moi len dua vao bien result
  $result = $conn->query($sql);
  $result_all = $result -> fetch_all(MYSQLI_ASSOC);
  //print_r($result_all);
  // trinh bay du lieu trong 1 bang html
  //tieu de bang
 ?>
 <h1>Bang du lieu Major</h1>
 <table border=1><tr><th>ID</th><th>Tên chuyên ngành</th><th colspan="2">Hanh dong</th></tr>
<?php 
 // output data of each row
    foreach ($result_all as $row) {
		echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name_major"] . "</td>";
?>
<?php
    	echo "</td>";
		echo "<td>";
?>
        <form method="post" action="major_delete.php"> 
		<input type="submit" name="action" value="xoa"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
    	echo "</td>";
		echo "<td>";
?>
        <form method="post" action="major_edit.php"> 
		<input type="submit" name="action" value="sua"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
    	echo "</td></tr>";
    }
   echo "</table>";
   ?>
   <form method="post" action="major_form_add.php"> 
		<input type="submit" name="action" value="Thêm"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
      </form>
   <?php 
} else {
  echo "0 ket qua tra ve";
}
$conn->close();
?>
