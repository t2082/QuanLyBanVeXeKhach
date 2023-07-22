<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Trang chủ</title>
</head>
<!-- ket thuc header -->
<!-- ============================================================== -->
<div class="page-wrapper">

    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!--thong ke -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">
                                    <?php                                   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$tongkh= "SELECT COUNT(EMAIL) AS TONGKH FROM khachhang";
$result = mysqli_query($conn, $tongkh);
$tong1= $result->fetch_assoc();
echo $tong1["TONGKH"] ;



//===================thong ke doanh thu==================
$sql = "SELECT tuyenxe.TENTUYEN,sum(doanhthu) as tongdoanhthu from tuyenxe,
( SELECT tuyenxe.ID_TUYEN,chuyenxe.ID_CHUYENXE, sum(phieudatve.TongTien*1000 ) as doanhthu 
FROM tuyenxe INNER JOIN chuyenxe ON tuyenxe.ID_tuyen = chuyenxe.ID_tuyen 
INNER JOIN vexe ON chuyenxe.ID_CHUYENXE = vexe.ID_CHUYENXE INNER JOIN phieudatve 
ON vexe.maphieu = phieudatve.maphieu AND phieudatve.NGAYLAP BETWEEN '".$_SESSION['ngaybd']."' 
AND '".$_SESSION['ngaykt']."' GROUP by chuyenxe.ID_CHUYENXE ) as tongchuyen 
WHERE tuyenxe.ID_TUYEN=tongchuyen.ID_TUYEN GROUP BY tuyenxe.TENTUYEN";
    $result1 = $conn->query($sql);
    $result2=$conn->query($sql);
if($result2){
$tong=0;
while($row = mysqli_fetch_array($result2)){
$tongdoanhthu = $row["tongdoanhthu"];
$tong += $tongdoanhthu;
}
} 
              
                //  print_r($result1);
        
// echo $_SESSION['ngaybd']."<br>";
// echo $_SESSION['ngaykt'];
?>

                                </h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Khách Hàng
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "qlbanvexe";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $tongkh= "SELECT SUM((sochuyentrongngay)*SONGAYTRONGTUANCHAY)*4 AS TongSoChuyenTrongTuan
                        FROM tuyenxe";
                        $result = mysqli_query($conn, $tongkh);
                        $tong1= $result->fetch_assoc();
                            echo $tong1["TongSoChuyenTrongTuan"] ;
                        ?>

                            </h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Số chuyến Xe
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?php


                                 $so_tien = $tong;
                                $so_tien_da_dinh_dang = number_format($so_tien, 0, '.', '.');
                                echo $so_tien_da_dinh_dang;
                                  ?> VNĐ</h2>

                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tổng Doanh Thu
                                trong tháng</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fa fa-bus"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- *************************************************************** -->
        <!-- Ket thuc-->
        <!-- *********************************ngay thong ke****************************** -->
        <div class="m-2">
            <form action="thongke.php" method="POST" id="sb">
                <div class="row">
                    <div class="col-4">
                        Nhập ngày bắt đầu
                        <input type="date" name="tgbd" value="<?php 
                        $ngay = $_SESSION['ngaybd'];
                        echo $ngay
                        ?>">
                    </div>
                    <div class="col-4">
                        Nhập ngày Kết thúc
                        <input type="date" name="kt" value="<?php echo $_SESSION['ngaykt'] ?>">
                    </div>
                    <div class='col-4'> Thống kê <br>
                        <button type="button" class="btn btn-success mt-2" onclick="submitForm()">
                            chọn</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- *************************************************************** -->

        <!-- *************************************************************** -->

        <script>
        function submitForm() {
            var form = document.getElementById("sb");
            form.submit();
        }
        </script>


        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
    Hệ Thống Xe ABC <a href="#">Nhóm 2 - PTHTW</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
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

<!--bieu do thong ke -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['bar']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Tuyến', 'Doanh thu'],
        <?php
    while($row = mysqli_fetch_array($result1)){
        $tuyen = $row['TENTUYEN'];
       $tong =$row['tongdoanhthu'];
       ?>['<?php echo $tuyen?>', <?php echo $tong?>],

        <?php
    }
    ?>
    ]);

    var options = {
        chart: {
            title: 'Thống kê',
            subtitle: 'Doanh thu của các tuyến theo tháng',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>
</body>

</html>