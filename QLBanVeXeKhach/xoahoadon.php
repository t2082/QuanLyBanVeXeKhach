<?php 
$conn = mysqli_connect("localhost", "root", "", "qlbanvexe");

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

$idPDV = $_POST['idphieu'];

if ($_POST['action'] == 'xoaChuyen') {
        $rmVe = "DELETE FROM vexe WHERE MAPHIEU = '".$idPDV."'";
        $result = mysqli_query($conn, $rmVe);
        $rmPDV = "DELETE FROM phieudatve WHERE MAPHIEU = '".$idPDV."'";
        $result = mysqli_query($conn, $rmPDV);
        if (!$result) {
          echo "Hủy chuyến thất bại: " . $conn->error;
        } else {
          echo '<script language="javascript">
          alert("Hủy chuyến thành công !");
          history.back();
          </script>';
        }
}
