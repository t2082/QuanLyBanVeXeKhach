<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
  die("Kết nối đến cơ sở dữ liệu không thành công: " . mysqli_connect_error());
}

// Truy vấn cơ sở dữ liệu để lấy các điểm đến
$sql = "SELECT * FROM tinhthanh";
$result = mysqli_query($conn, $sql);

// Đưa các điểm đến vào ô điểm đến trên trang web
echo '<select class="form-select1 text-muted text-center" style="border: none" id="diemden">';
echo '<option selected text-muted>Chọn địa điểm</option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["MATINH"].'">'.$row["TENTINH"].' ('.$row["MATINH"].')</option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);
?>
