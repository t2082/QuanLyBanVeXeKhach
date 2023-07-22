<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Danh sach chuyến Xe</title>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Danh Sách chuyến xe</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Danh sách chuyến xe</li>
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
                                        <th>ID Chuyến Xe</th>
                                        <th>Biển số</th>
                                        <th>ID Tuyến</th>
                                        <th>Tên Chuyến Xe</th>
                                        <th>Thời điểm đi thực tế</th>
                                        <th>Thời điểm đến thực tế</th>
                                        <th>TG dự kiến đến</th>
                                        <th>TG dự kiến khởi hành</th>
                                        <th>Giá</th>
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
                    
$sql_check = "SELECT * FROM chuyenxe";
$result_check = mysqli_query($conn, $sql_check);

while($row = mysqli_fetch_assoc($result_check)) {
  echo "
    <tr>
      <td>".$row["ID_CHUYENXE"]."</td>
      <td>".$row["BIENSO"]."</td>
      <td>".$row["ID_TUYEN"]."</td>
      <td>".$row["TENCHUYENXE"]."</td>
      <td>".$row["THOIDIEMDITT"]."</td>
      <td>".$row["THOIDIEMDENTT"]."</td>
      <td>".$row["TGDUKIENDEN"]."</td>
      <td>".$row["TGDUKIENKHOIHANH"]."</td>
      <td>".$row["GIA"]."</td>
    </tr>
  ";
}

                
$tongchuyen= "SELECT COUNT(ID_CHUYENXE) AS TONGCHUYEN FROM chuyenxe";
$result = mysqli_query($conn, $tongchuyen);
$tong1 = $result->fetch_assoc();
echo "
  </tbody>
  <tfoot>
    <tr>
      <th>Tổng số chuyến xe: ".$tong1["TONGCHUYEN"]."</th>
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