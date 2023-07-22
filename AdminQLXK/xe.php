<?php 

$idxe = $_POST['idxe'];
$idloaixe = $_POST['tenloai'];
$name = $_POST['tenxe'];

$conn = mysqli_connect("localhost", "root", "", "qlbanvexe");

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

if ($_POST['action'] == 'themXe') {
  $sql_check = "SELECT * FROM xe WHERE BIENSO = '".$idxe."'";
$result_check = mysqli_query($conn, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    echo '<script language="javascript">
    alert("Xe đã tồn tại rồi kìa!");
    history.back();
     </script>';
    exit();
}else{
  $query = "INSERT INTO xe VALUES ('$idxe', '$idloaixe', '$name')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Thêm xe thất bại: " . $conn->error;
  } else {
    echo '<script language="javascript">
    alert("Thêm xe thành công !");
    history.back();
     </script>';
  }
}
} else if ($_POST['action'] == 'suaXe') {
  $query = "UPDATE xe set id_loai = '$idloaixe', tenxe = '$name' WHERE bienso = '$idxe'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Sửa thông tin xe thất bại: " . $conn->error;
  } else {
    echo '<script language="javascript">
    alert("Đã sửa thông tin xe !");
    history.back();
     </script>';
  }
} else {
  $query = "DELETE From vitrighe WHERE bienso = '$idxe'";
  $result = mysqli_query($conn, $query);
  $query = "DELETE From xe WHERE bienso = '$idxe'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Xóa xe thất bại" . $conn->error;
  } else {
    echo '<script language="javascript">
    alert("Đã xóa xe !");
    history.back();
     </script>';
  }
}



mysqli_close($conn);
?>