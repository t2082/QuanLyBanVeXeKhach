<?php
// thong tin ve chuoi ket noi gom server name, username va mat khau de dang nhap vao mysql, mac dinh cua xampp la root, password rong

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>