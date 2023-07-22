<?php
function connect()
{
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanvexe";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu không thành công: " . mysqli_connect_error());
    }
    return $conn;
}

session_start();


if (isset($_GET["function"]) && $_GET["function"] == "taophieudatve") {
  echo taophieu();
}

function taophieu(){
  $conn = connect();
$khuhoi = $_SESSION["khuhoi"];
  //Tạo phiếu đặt vé
$pdv_id = 'P' . rand(1, 999);
$pdv_count = "SELECT COUNT(MAPHIEU) SOPHIEU FROM phieudatve WHERE phieudatve.MAPHIEU = '" . $pdv_id . "'";
$result = mysqli_query($conn, $pdv_count);
$row = mysqli_fetch_assoc($result);
while ($row["SOPHIEU"] > 0) {
  $pdv_id = 'P' . rand(1, 999);
  $pdv_count = "SELECT COUNT(MAPHIEU) SOPHIEU FROM phieudatve WHERE phieudatve.MAPHIEU = '" . $pdv_id . "'";
  $result = mysqli_query($conn, $pdv_count);
  $row = mysqli_fetch_assoc($result);
}
$pdv_email = $_SESSION["email"];
$pdv_date = date('Y-m-d');
$pdv_money = intval(str_replace(['.', ','], '', $_SESSION['tongsotien']), 10);

// -------------ID PHIẾU, EMAIL NGƯỜI ĐẶT, NGÀY ĐẶT, SỐ TIỀN ---------
// echo 'id phiếu:'.$pdv_id.'|';
// echo 'email:'.$pdv_email.'|';
// echo 'ngày:'.$pdv_date.'|';
// echo 'tiền:'.$pdv_money.'|';
//Tạo phiếu
$query = "INSERT INTO `phieudatve` (`MAPHIEU`, `EMAIL`, `NGAYLAP`, `TongTien`) VALUES ('" . $pdv_id . "', '" . $pdv_email . "', '" . $pdv_date . "', '" . $pdv_money . "')";
$result = mysqli_query($conn, $query);
// --------------------------------------------------------------------

//Tạo vé
if ($khuhoi == 1) {
  $v_id = 'V' . rand(1, 999);
  $v_count = "SELECT COUNT(ID_VE) SOVE FROM vexe WHERE vexe.ID_VE = '" . $v_id . "'";
  $result = mysqli_query($conn, $v_count);
  $row = mysqli_fetch_assoc($result);
  while ($row["SOVE"] > 0) {
    $v_id = 'V' . rand(1, 999);
    $v_count = "SELECT COUNT(ID_VE) SOVE FROM vexe WHERE vexe.ID_VE = '" . $v_id . "'";
    $result = mysqli_query($conn, $v_count);
    $row = mysqli_fetch_assoc($result);
  }
  $v_idChuyenXe = $_SESSION["idchuyenxe"];
  $v_idchuyenkhuhoi = $_SESSION["idchuyenkhuhoi"]; //Chuyến khứ hồi
  $v_idPdv = $pdv_id;
  $v_idViTri = $_SESSION['idvitri'];

  foreach ($_SESSION['idvitri'] as $key => $value) {
    ${'id' . ($key + 1)} = $value;
  }

  $v_sove = $_SESSION["tongsove"];
} else {
  //Tạo vé
  $v_id = 'V' . rand(1, 999);
  $v_count = "SELECT COUNT(ID_VE) SOVE FROM vexe WHERE vexe.ID_VE = '" . $v_id . "'";
  $result = mysqli_query($conn, $v_count);
  $row = mysqli_fetch_assoc($result);
  while ($row["SOVE"] > 0) {
    $v_id = 'V' . rand(1, 999);
    $v_count = "SELECT COUNT(ID_VE) SOVE FROM vexe WHERE vexe.ID_VE = '" . $v_id . "'";
    $result = mysqli_query($conn, $v_count);
    $row = mysqli_fetch_assoc($result);
  }
  $v_idChuyenXe = $_SESSION["idchuyenxe"];
  $v_idPdv = $pdv_id;

  foreach ($_SESSION['idvitri'] as $key => $value) {
    ${'id' . ($key + 1)} = $value;
  }
  
  $v_sove = $_SESSION["tongsove"];
}

// echo '|id vé:'.$v_id;
// echo '|Chuyến:'.$v_idChuyenXe;
// echo '|Mã phiếu:'.$pdv_id;
// echo '|Vị trí:'.$id1."|".$id2."|".$id3;
// echo '|Số vé:'.$v_sove;
// echo 'Khứ hồi:'.$pdv_id;
// echo 'Email:'.$pdv_email;
// echo 'Ngày:'.$pdv_date;
// echo 'Tiền:'.$pdv_money;



  // //Tạo vé
  if ($khuhoi == 1) {
    for ($i = 1; $i <= $v_sove; $i++) {
      $idghe = ${'id' . $i};
      $v_ten = 'Vé ' . $v_id;
      $query = "INSERT INTO `vexe` (`ID_VE`, `ID_CHUYENXE`, `MAPHIEU`, `ID_VITRI`, `TENVE`) VALUES ('" . $v_id . "', '" . $v_idChuyenXe . "', '" . $v_idPdv . "', '" . $idghe . "', '" . $v_ten . "')";
      $result = mysqli_query($conn, $query);
      $v_id = 'V' . substr($v_id, 1) + 1;
    }

    for ($i = 1; $i <= $v_sove; $i++) {
      $idghe = ${'id' . $i};
      $tenvitr = ${'vtr' . $i};
      $vitrighekhuhoi = "SELECT * FROM vitrighe a, xe b, chuyenxe c WHERE a.BIENSO = b.BIENSO AND b.BIENSO = c.BIENSO AND c.ID_CHUYENXE='" . $v_idchuyenkhuhoi . "' AND a.TENVITRI ='" . $tenvitr . "'";
      $idghekh = mysqli_query($conn, $vitrighekhuhoi);
      $idghekhuhoi = mysqli_fetch_assoc($idghekh);
      $v_ten = 'Vé ' . $v_id;
      $query = "INSERT INTO `vexe` (`ID_VE`, `ID_CHUYENXE`, `MAPHIEU`, `ID_VITRI`, `TENVE`) VALUES ('" . $v_id . "', '" . $v_idchuyenkhuhoi . "', '" . $v_idPdv . "', '" . $idghekhuhoi["ID_VITRI"] . "', '" . $v_ten . "')";
      $result = mysqli_query($conn, $query);
      $v_id = 'V' . substr($v_id, 1) + 1;
    }
  } else {
    for ($i = 1; $i <= $v_sove; $i++) {
      $idghe = ${'id' . $i};
      $v_ten = 'Vé ' . $v_id;
      $query = "INSERT INTO `vexe` (`ID_VE`, `ID_CHUYENXE`, `MAPHIEU`, `ID_VITRI`, `TENVE`) VALUES ('" . $v_id . "', '" . $v_idChuyenXe . "', '" . $v_idPdv . "', '" . $idghe . "', '" . $v_ten . "')";
      $result = mysqli_query($conn, $query);
      $v_id = 'V' . substr($v_id, 1) + 1;
    }
  }
echo '<div style="font-size: xx-large;">✅</div>';
echo '<h1 class="text-success">ĐẶT VÉ THÀNH CÔNG</h1>';
}
?>