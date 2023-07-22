<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Thông Tin Nhân Viên</title>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Danh Sách nhân viên</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Nhân viên</li>
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
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Địa Chỉ</th>
                                        <th>Giới Tính</th>
                                        <th>Tuổi</th>
                                        <th>Số lần đặt vé</th>
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
                    
                    $sql="SELECT * FROM khachhang where maquyen='2' ";
                    $result1 = $conn->query($sql);
                while( $row = $result1->fetch_assoc() ){
                    $birthday = $row["NAMSINH"]; 
                    $today = date('Y-m-d'); 
                    $diff = date_diff(date_create($birthday), date_create($today)); 
                    // so lan mua
                    $solanmua= "SELECT COUNT(maphieu)  AS tongve  FROM
                    khachhang ,phieudatve WHERE khachhang.email=phieudatve.email
                    and khachhang.email= '".$row["EMAIL"]."'" ;
                    $result = mysqli_query($conn, $solanmua);
                    $tong=$result->fetch_assoc();
                    
                    echo"
                    <tr>
                        <td>".$row["HOTEN"]."</td>
                        <td>".$row["EMAIL"]."</td>
                        <td>".$row["DIACHI"]."</td>
                        <td>".$row["GIOITINH"]."</td>
                        <td>".$diff->format('%y')."</td>
                        <td>".$tong["tongve"]."</td>
                </tr>
                    ";
                }

                $tongkh= "SELECT COUNT(EMAIL) AS TONGKH FROM khachhang where maquyen='2' ";
                $result = mysqli_query($conn, $tongkh);
                $tong1= $result->fetch_assoc();
                    echo"
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng số nhân viên: ".$tong1["TONGKH"]."</th>
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