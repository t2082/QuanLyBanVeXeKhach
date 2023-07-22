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


$quyen = $_POST['phanquyen'];
$sql = "SELECT * FROM khachhang WHERE email='" . $_POST["IDD"] . "'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $capnhat_sqll = "UPDATE khachhang SET MAQUYEN='$quyen' WHERE email='" . $_POST["IDD"] . "'";
  
  if (mysqli_query($conn, $capnhat_sqll)) {
    echo '<script language="javascript">
    alert("Chỉnh sửa chức vụ nhân viên thành công!");
    history.back();
    </script>';
    
  } else {
    echo "Lỗi khi sửa nhân viên: " . mysqli_error($conn);
  }
} else {
  echo '<script language="javascript">
    alert("Không tìm thấy email");
    history.back();
  </script>';
}