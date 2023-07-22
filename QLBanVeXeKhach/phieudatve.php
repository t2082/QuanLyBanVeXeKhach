<?php
$conn = mysqli_connect("localhost", "root", "", "qlbanvexe");

if (!$conn) {
  die("Kết nối không thành công: " . mysqli_connect_error());
}

session_start();
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

  foreach ($_SESSION['tenvitri'] as $key => $value) {
    ${'vtr' . ($key + 1)} = $value;
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
  $v_idViTri = $_SESSION['idvitri'];

  foreach ($_SESSION['idvitri'] as $key => $value) {
    ${'id' . ($key + 1)} = $value;
  }


  $v_sove = $_SESSION["tongsove"];
}

if ($_GET['action'] == 'xacnhan') {
  //Tạo phiếu
  $query = "INSERT INTO `phieudatve` (`MAPHIEU`, `EMAIL`, `NGAYLAP`, `TongTien`) VALUES ('" . $pdv_id . "', '" . $pdv_email . "', '" . $pdv_date . "', '" . $pdv_money . "')";
  $result = mysqli_query($conn, $query);
  //Tạo vé
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
}


include('header.php');
?>
<div class="text-center p-4 m-4">
  <i style="color: green; font-size: 80px;" class="fa-sharp fa-solid fa-circle-check"></i>
  <h1>Đơn đặt hàng thành công</h1>
  <p>Mã giao dịch: <?php echo $pdv_id; ?></p>
</div>
<div class="container">
  <div class="table-responsive" style="max-width: 1250px;">
    <table class="table table-striped table-hover align-middle mx-auto">
      <thead>
        <tr>
          <th scope="col">Thời gian</th>
          <th scope="col">Chuyến xe</th>
          <th scope="col">Số lượng ghế</th>
          <th scope="col">Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($khuhoi == 1) {
          $kh_money = $pdv_money / 2;
          echo '<tr>';
          echo '<td>' . date('Y-m-d') . '</td>';
          echo '<td>' . $_SESSION["tenchuyenxe"] . '</td>';
          echo '<td>' . $_SESSION["tongsove"] . '</td>';
          echo '<td>' . number_format($kh_money . "000", 0, ',', '.') . '</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td>' . date('Y-m-d') . '</td>';
          echo '<td>' . $_SESSION["tenchuyenkhuhoi"] . '</td>';
          echo '<td>' . $_SESSION["tongsove"] . '</td>';
          echo '<td>' . number_format($kh_money . "000", 0, ',', '.') . '</td>';
          echo '</tr>';
        } else {
          echo '<tr>';
          echo '<td>' . date('Y-m-d') . '</td>';
          echo '<td>' . $_SESSION["tenchuyenxe"] . '</td>';
          echo '<td>' . $_SESSION["tongsove"] . '</td>';
          echo '<td>' . number_format($pdv_money . "000", 0, ',', '.') . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="text-center p-4">
  <p style="font-size: 20px;">Cảm ơn bạn đã tin tưởng sử dụng dịch vụ của chúng tôi</p>
  <a href="tel:090-080-0760" style="font-size: 20px; color:#ba2f25;">Mọi thắc mắc xin liên hệ với số điện thoại sau: 090-080-0760</a>
  <br>
  <br>
  <button class="btn btn-info p-2 m-3" onclick="gotoHomepage()">QUAY LẠI TRANG CHỦ</button>
</div>
<script>
  function gotoHomepage() {
    window.location.href = "index.php";
  }
</script>
<?php
include('footer.php');
?>