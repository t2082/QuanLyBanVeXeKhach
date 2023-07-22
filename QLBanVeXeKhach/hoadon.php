<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hóa đơn</title>
  <?php
  include("header.php");
  ?>

</head>

<body>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-4">
            <div class="card">

              <?php
              if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
                // Nếu chưa đăng nhập, hiển thị thông báo hoặc chuyển hướng người dùng đến trang khác
                echo "<script>alert('Bạn cần đăng nhập để truy cập vào trang này.');</script>";
                echo "<script>window.location.href='index.php';</script>";
                exit;
              } else {
                $tongkh = "SELECT SUM(tuyenxe.GIAHIENHANH) AS TongTien
                FROM vexe
                INNER JOIN phieudatve ON vexe.MAPHIEU = phieudatve.MAPHIEU
                INNER JOIN khachhang ON phieudatve.EMAIL = khachhang.EMAIL
                INNER JOIN chuyenxe ON vexe.ID_CHUYENXE = chuyenxe.ID_CHUYENXE
                INNER JOIN tuyenxe ON tuyenxe.ID_TUYEN = chuyenxe.ID_TUYEN
                WHERE khachhang.email='" . $_SESSION["email"] . "'
                ";
                $result = mysqli_query($conn, $tongkh);
              }

              $tong1 = $result->fetch_assoc();
              $tongve = $tong1["TongTien"]

              ?>
              <div class="card-body pt-0 p-1 text-center">




                <img src="https://img.icons8.com/doodle/100/null/money.png" />
                <h6 class="text-center mb-0 font-weight-bold">Tiền mặt</h6>

                <hr class="horizontal dark my-2">
                <h5 class="mb-0"> Đang bảo trì</h5>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">

              <div class="card-body pt-0 p-1 text-center">



                <img src="https://img.icons8.com/bubbles/100/null/bank-building.png" />
                <h6 class="text-center mb-0 font-weight-bold">Chuyển khoản ngân hàng</h6>
                <hr class="horizontal dark my-2">
                <h5 class="mb-0 ">
                  <?php
                  $number = $tong1["TongTien"];
                  $formatted_number = number_format($number, 3);
                  echo $formatted_number ?> đồng
                </h5>

              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">

              <div class="card-body pt-0 p-1 text-center">



                <img src="https://img.icons8.com/clouds/100/null/visa.png" />
                <h6 class="text-center mb-0 font-weight-bold">Visa/Mastercard</h6>
                <hr class="horizontal dark my-2">
                <h5 class="mb-0"> Đang bảo trì</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4 ">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center ">
                    <h5 class="mb-0 font-weight-bold" style="color: #EE6D4A;">Danh sách hoá đơn</h5>
                  </div>
                  <div class="col-6 text-end">




                  </div>
                </div>
              </div>
              <div class="card-body p-3 pb-0">
                <div class="table-responsive p-0">
                  <!-- table 5 cot -->
                  <table id="myTable" class="display" class="table align-items-center mb-0">
                    <thead>
                      <tr class="col-12">
                        <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Tên phiếu</th>
                        <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Số vé</th>
                        <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Tên chuyến xe</th>
                        <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Thời điểm đi</th>
                        <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Ngày lập hóa đơn</th>
                        <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                          Giá</th>
                        <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- 1 hang -->

                      <?php
                      //tao chuoi luu cau lenh sql
                      $sql = "SELECT DISTINCT phieudatve.MAPHIEU, chuyenxe.TENCHUYENXE, chuyenxe.THOIDIEMDITT, phieudatve.NGAYLAP, tuyenxe.GIAHIENHANH, COUNT(phieudatve.MAPHIEU) SOVE
                              FROM vexe
                              INNER JOIN phieudatve ON vexe.MAPHIEU = phieudatve.MAPHIEU
                              INNER JOIN khachhang ON phieudatve.EMAIL = khachhang.EMAIL
                              INNER JOIN chuyenxe ON vexe.ID_CHUYENXE = chuyenxe.ID_CHUYENXE
                              INNER JOIN tuyenxe ON tuyenxe.ID_TUYEN = chuyenxe.ID_TUYEN
                              WHERE khachhang.email='" . $_SESSION["email"] . "'
                              GROUP BY chuyenxe.TENCHUYENXE;     
                                    ";
                      //thuc thi cau lenh sql va dua doi tuong vao $result
                      $result = $conn->query($sql);


                      if ($result->num_rows > 0) {

                        $result = $conn->query($sql);
                        $result_all = $result->fetch_all();

                        foreach ($result_all as $row) {
                          $constrain_del = "SELECT pdv.*, vx.* FROM phieudatve pdv
                                  INNER JOIN vexe vx ON pdv.MAPHIEU = vx.MAPHIEU
                                  INNER JOIN chuyenxe cx ON vx.ID_CHUYENXE = cx.ID_CHUYENXE
                                  WHERE pdv.MAPHIEU = '" . $row[0] . "'
                                  AND cx.THOIDIEMDITT < NOW()"; // Thêm điều kiện kiểm tra thời gian đi của chuyến xe
                          $result_constrain_del = mysqli_query($conn, $constrain_del);
                          if (!$result_constrain_del) {
                            echo "Hủy chuyến thất bại: " . $conn->error;
                          } else {
                            $numRows = mysqli_num_rows($result_constrain_del);
                            if ($numRows > 0) {
                      ?>
                              <tr>
                                <td class="align-middle text-center text-muted">
                                  <!-- ma hd -->
                                  <?php echo $row[0];
                                  echo '<input type="text" name="idphieu" value="' . $row[0] . '" style="display: none;">';
                                  ?>
                                </td>
                                <td class="align-middle text-center text-muted">
                                  <!-- ma hd -->
                                  <?php echo $row[5] ?>
                                </td>
                                <td class="align-middle text-center text-muted">
                                  <!-- ngayhoanthanh -->
                                  <?php echo $row[1] ?>
                                </td>
                                <td class="align-middle text-center text-muted">
                                  <!-- soluong -->
                                  <?php echo $row[2] ?>
                                </td>
                                <td class="align-middle text-xs text-center text-muted">
                                  <?php echo $row[3] ?>
                                </td>
                                <!-- phuong thuc thanh toan -->
                                <td class="align-middle text-xs text-center text-muted">

                                  <?php

                                  $number = $row[4] * $row[5];
                                  $formatted_number = number_format($number, 3);
                                  echo $formatted_number . "đ";
                                  ?>

                                </td>
                                <td class="align-middle text-xs text-center text-muted">
                                </td>

                                <td class="align-middle text-success text-center text-muted">
                                </td>
                              </tr>
                            <?php
                            } else {
                            ?>
                              <form action="xoahoadon.php" method="post">
                                <tr>
                                  <td class="align-middle text-center">
                                    <!-- ma hd -->
                                    <?php echo $row[0];
                                    echo '<input type="text" name="idphieu" value="' . $row[0] . '" style="display: none;">';
                                    ?>
                                  </td>
                                  <td class="align-middle text-center">
                                    <!-- ma hd -->
                                    <?php echo $row[5] ?>
                                  </td>
                                  <td class="align-middle text-center">
                                    <!-- ngayhoanthanh -->
                                    <?php echo $row[1] ?>
                                  </td>
                                  <td class="align-middle text-center">
                                    <!-- soluong -->
                                    <?php echo $row[2] ?>
                                  </td>
                                  <td class="align-middle text-xs text-center">
                                    <?php echo $row[3] ?>
                                  </td>
                                  <!-- phuong thuc thanh toan -->
                                  <td class="align-middle text-xs text-center">

                                    <?php

                                    $number = $row[4] * $row[5];
                                    $formatted_number = number_format($number, 3);
                                    echo $formatted_number . "đ";
                                    ?>

                                  </td>
                                  <td class="align-middle text-xs text-center">
                                    <button type="submit" name="action" value="xoaChuyen" class="text-danger border-0 bg-transparent" style="cursor: pointer;"></i></i><b style="font-size: large;"><i class="fa-solid fa-trash-can"></i></b></button>
                                  </td>

                                  <td class="align-middle text-success text-center">
                                    <!-- tongtien -->



                                  </td>
                                </tr>
                              </form>
                      <?php
                            }
                          }
                        }
                      }
                      $tongkh = "SELECT COUNT(ID_CHUYENXE) AS TONGVE FROM chuyenxe";
                      $result = mysqli_query($conn, $tongkh);
                      $tong1 = $result->fetch_assoc();
                      ?>

                      <tr>
                        <td>
                        </td>

                        <td>
                        </td>
                        <div style="margin-top: 10px;">
                          <td></td>
                          <td></td>
                          <td style="text-align: right">
                            <br>
                            <b> Tổng tiền: <b>
                          </td>

                          <td style="text-align: center;">
                            <br>
                            <?php
                            $number = $tongve;
                            $formatted_number = number_format($number, 3);
                            echo $formatted_number . "đ";
                            ?>
                          </td>
                        </div>

                      </tr>






                      <!-- het 1 hang -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-7 d-flex align-items-center">
                <h5 class="mb-0 font-weight-bold " style="color: #EE6D4A">Chi tiết hoá đơn</h5>
              </div>
              <div class="col-2 text-center me-n3">
                <button id="btnIn" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-print text-sm me-1"></i>
                  In</button>
                <script>
                  document.getElementById("btnIn").addEventListener("click", function() {
                    window.print(); // Gọi hàm in của trình duyệt
                  });
                </script>
              </div>
              <div class="col-3 text-center">
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-1"><i class="fas fa-file-pdf text-sm me-1"></i> Xuất PDF</button>
              </div>
            </div>
          </div>
          <div class="card-body p-3 pb-0">
            <div class="row">
              <div class="col-12">
                <!-- title -->
                <div class="row text-center fs-4 font-weight-bold">
                  <div class="col-12">
                    <h4 class="font-weight-bold"> HÓA ĐƠN </h4>
                  </div>
                </div>
                <!-- ngay -->

                <!-- thongtin khachhang -->
                <div class="row mt-3">
                  <div class="col-md-12">
                    <h6>Thông tin khách hàng:</h6>
                    <!-- 1 hang -->
                    <div class="row px-2 mt-2">
                      <div class="col-4">
                        <h6>Tên khách hàng: </h6>
                      </div>
                      <div class="col-8">
                        <?php echo $_SESSION["name"] ?>
                      </div>
                    </div>
                    <!-- 1 hang -->
                    <div class="row px-2 mt-n3">
                      <div class="col-4">
                        <h6>Email : </h6>

                      </div>
                      <div class="col-8">
                        <?php echo $_SESSION["email"] ?>
                      </div>
                    </div>
                    <!-- 1 hang -->
                    <div class="row px-2 mt-n3">
                      <div class="col-4">
                        <h6>SĐT: </h6>
                      </div>
                      <div class="col-8">
                        <?php echo $_SESSION["sdt"] ?>
                      </div>
                    </div>
                    <!-- 1 hang -->
                    <div class="row px-2 mt-n3">
                      <div class="col-4">
                        <h6>Địa chỉ: </h6>
                      </div>
                      <div class="col-8">
                        <?php echo $_SESSION["diachi"] ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>