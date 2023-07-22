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


// Thêm nhân viên vào cơ sở dữ liệu
$date = date_create($_POST["ngaysinh"]);
    $sql = "INSERT INTO khachhang (EMAIL, SDT, HOTEN, DIACHI, NAMSINH, CCCD,GIOITINH)
    VALUES ('".$_POST["email"] ."', '".$_POST["ho_ten"] ."', '".$_POST["so_dien_thoai"] ."',
     '".$_POST["dia_chi"] ."','".$date ->format('Y-m-d') ."','".$_POST["can_cuoc"] ."','".$_POST["gioitinh"] ."' ) ";

if ($conn->query($sql) == TRUE) {
    echo '<script language="javascript">
    alert("Đăng ký thành công!");
    history.back();
     </script>';
} else {
    echo "Thêm nhân viên thất bại: " . $conn->error;
}
// Đóng kết nối
$conn->close();
?>