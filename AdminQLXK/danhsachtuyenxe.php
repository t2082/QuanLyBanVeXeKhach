<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Thông Tin Tuyến Xe</title>
</head>
<!-- ket thuc header -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- dieu huong-->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Danh Sách tuyến xe</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Danh sách tuyến xe</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Bang thong ke -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID Tuyến</th>
                                        <th>Mã Bến Xe</th>
                                        <th>BEN_MABX</th>
                                        <th>Tên Tuyến</th>
                                        <th>Số ngày trong tuần chạy</th>
                                        <th>Số chuyến trong ngày</th>
                                        <th>TG di chuyển TB</th>
                                        <th>Giá hiện hành</th>
                                        <th>Quãng đường</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
                    
$sql_check = "SELECT * FROM tuyenxe";
$result_check = mysqli_query($conn, $sql_check);

while($row = mysqli_fetch_assoc($result_check)) {
  echo "
    <tr>
      <td>".$row["ID_TUYEN"]."</td>
      <td>".$row["MABX"]."</td>
      <td>".$row["BEN_MABX"]."</td>
      <td>".$row["TENTUYEN"]."</td>
      <td>".$row["SONGAYTRONGTUANCHAY"]."</td>
      <td>".$row["SOCHUYENTRONGNGAY"]."</td>
      <td>".$row["TGDICHUYENTB"]."</td>
      <td>".$row["GIAHIENHANH"]."</td>
      <td>".$row["QUANGDUONG"]."</td>
    </tr>
  ";
}

                
$tongtuyen= "SELECT COUNT(ID_TUYEN) AS TONGTUYEN FROM tuyenxe";
$result = mysqli_query($conn, $tongtuyen);
$tong1 = $result->fetch_assoc();
echo "
  </tbody>
  <tfoot>
    <tr>
      <th>Tổng số tuyến xe: ".$tong1["TONGTUYEN"]."</th>
    </tr>
  </tfoot>
";

?>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center text-muted">
        Hệ Thống Xe ABC <a href="#">Nhóm 2 - PTHTW</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="dist/js/app-style-switcher.js"></script>
<script src="dist/js/feather.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<!-- themejs -->
<!--Menu sidebar -->
<script src="dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.min.js"></script>
<!--This page plugins -->
<script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>