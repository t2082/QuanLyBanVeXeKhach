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
$sql = "SELECT id_loai, tenloai FROM loaixe";
$result = mysqli_query($conn, $sql);

// Đưa các điểm đến vào ô điểm đến trên trang web
echo '<select name="tenloai" class="form-select1  text-muted text-center" id="loaixe">';
echo '<option selected text-muted>Chọn loại xe</option>';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["id_loai"].'">'.$row["tenloai"].'('.$row["id_loai"].') </option>';
  }
}
echo '</select>';

// Đóng kết nối
mysqli_close($conn);
?>
