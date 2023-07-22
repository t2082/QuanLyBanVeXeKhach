
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//tao chuoi luu cau lenh sql
$sql = "SELECT * FROM tinhthanh";
//thuc thi cau lenh sql va dua doi tuong vao $result
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
  
  //cach 1: show du lieu nhu bien
  //show gia tri trong mang
	print_r ($result);
	echo '<br>';
	echo '<br>';
	

  
   //Cach 3: trinh bay voi bang html
  //load du lieu moi len dua vao bien result
  $result = $conn->query($sql);
  $result_all = $result -> fetch_all();
  print_r($result_all);
  // trinh bay du lieu trong 1 bang html
  //tieu de bang
    echo "<table border=1><tr><th>MATINH</th><th>TENTINH</th><th>QUANHUYEN</th></tr>";
    // output data of each row
    foreach ($result_all as $row) {
//dinh dang de hien thi ngay thang theo dd-mm-yyyy
        echo "<tr><td>" . $row[0]. "</td><td>" . $row[1]. "</td><td>" . $row[2]. "</td></tr>";

    }
   echo "</table>";
  
} else {
  echo "0 ket qua tra ve";
}
$conn->close();
?>

