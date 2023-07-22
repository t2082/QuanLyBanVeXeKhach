
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
$sql = "SELECT chuyenxe.TENCHUYENXE, chuyenxe.THOIDIEMDITT, phieudatve.NGAYLAP, tuyenxe.GIAHIENHANH
FROM vexe
INNER JOIN phieudatve ON vexe.MAPHIEU = phieudatve.MAPHIEU
INNER JOIN khachhang ON phieudatve.EMAIL = khachhang.EMAIL
INNER JOIN chuyenxe ON vexe.ID_CHUYENXE = chuyenxe.ID_CHUYENXE
INNER JOIN tuyenxe ON tuyenxe.ID_TUYEN = chuyenxe.ID_TUYEN
WHERE khachhang.email='".$_SESSION["email"]."'



";
//thuc thi cau lenh sql va dua doi tuong vao $result
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
  


  
   //Cach 3: trinh bay voi bang html
  //load du lieu moi len dua vao bien result
  $result = $conn->query($sql);
  $result_all = $result -> fetch_all();

  // trinh bay du lieu trong 1 bang html
  //tieu de bang
    echo "<table border=2>
    <tr >
    <th>Tên chuyến xe</th>
    <th>Thời điểm đi thực tế</th>
    <th>Ngày lập</th>
    <th>Giá</th>
    </tr>";
    // output data of each row
    foreach ($result_all as $row) {
//dinh dang de hien thi ngay thang theo dd-mm-yyyy
        echo "<tr>
        <td>" . $row[0]. "</td>
        <td>" . $row[1]. "</td>
        <td>" . $row[2]. "</td>
        <td>" . $row[3]. "</td>


        </tr>";

    }
   echo "</table>";
  
} else {
  echo "0 ket qua tra ve";
}
$conn->close();
?>

