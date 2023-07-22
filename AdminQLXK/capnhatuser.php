<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Thông Tin Khách Hàng</title>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Danh Sách Khách Hàng</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Khách Hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
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
                                        <th>Số Điện Thoại</th>
                                        <th>Đặt vé</th>
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

                                    $sql = "SELECT * FROM khachhang ";

                                    $result1 = $conn->query($sql);
                                    // print_r($result1);

                                    while ($row = $result1->fetch_assoc()) {
                                        $birthday = $row["NAMSINH"];
                                        $today = date('Y-m-d');
                                        $diff = date_diff(date_create($birthday), date_create($today));
                                        // so lan mua;
                                        $solanmua = "SELECT COUNT(maphieu)  AS tongve  FROM
                    khachhang ,phieudatve WHERE khachhang.email=phieudatve.email
                    and khachhang.email= '" . $row["EMAIL"] . "'";
                                        $result = mysqli_query($conn, $solanmua);
                                        $tong = $result->fetch_assoc();


                                        echo "
                    <tr>
                        <td>" . $row["HOTEN"] . "</td>
                        <td>" . $row["EMAIL"] . "</td>
                        <td>" . $row["DIACHI"] . "</td>
                        <td>" . $row["SDT"] . "</td>
                        <td><button class=\"btn btn-info\" type=\"button\" data-toggle=\"modal\" data-target=\"#myModal\"
                        data-hoten=\"" . $row["HOTEN"] . "\" data-sdt=\"" . $row["SDT"] . "\"
                        data-email=\"" . $row["EMAIL"] . "\">Đặt vé</button></td>
                        <td>" . $tong["tongve"] . "</td>
                </tr>
                    ";
                                    }

                                    $tongkh = "SELECT COUNT(EMAIL) AS TONGKH FROM khachhang";
                                    $result = mysqli_query($conn, $tongkh);
                                    $tong1 = $result->fetch_assoc();
                                    echo "
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng số khách hàng: " . $tong1["TONGKH"] . "</th>
                                        ";
                                    ?>

                                    </tr>
                                    </tfoot>
                            </table>

                            <!-- --------------------------------------------------------------ĐẶT VÉ HỘ---------------------------------------------------------------------------------------------------------------------- -->

                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-xl">
                            
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title text-info">Đặt vé</h2>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Nội dung hộp thoại -->
                                        <div class="modal-body">
                                            <!-- --------------------------------------------------------------THÂN DIALOG---------------------------------------------------------------------------------------------------------------------- -->
                                            <!-- Cái khung, bo gốc -->
                                            <div class="mt-5 ml-5 mb-3 pl-5" style="font-size: larger;">
                                                <input type="radio" name="loaidi" id="motchieu" checked onchange="document.getElementById('ngayve').disabled = true;"> Một chiều
                                                <input type="radio" name="loaidi" id="khuhoi" class="ml-5" onchange="document.getElementById('ngayve').disabled = false;"> Khứ hồi
                                            </div>
                                            <div class="mb-5 ml-5 mr-5 shadow-lg p-5" style="border-radius: 20px;">
                                                <!-- Nhớ xóa border -->
                                                <div class="container m-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="col m-1 p-3
                            text-muted text-center
                            font-weight-bold">
                                                                <h5 class="card-title
                                text-center
                                font-weight-bold
                                text-info">Điểm đi</h5>
                                                                <?php
                                                                $servername = "localhost";
                                                                $username = "root";
                                                                $password = "";
                                                                $dbname = "qlbanvexe";
                                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                                                if (!$conn) {
                                                                    die("Kết nối đến cơ sở dữ liệu không thành công: " . mysqli_connect_error());
                                                                }
                                                                $sql = "SELECT * FROM tinhthanh";
                                                                $result = mysqli_query($conn, $sql);
                                                                echo '<select class="form-select1 text-dark text-center" style="border: none" id="diemdi" onchange="getDivQuanDi()">';
                                                                echo '<option selected text-dark>Chọn địa điểm</option>';
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        echo '<option value="' . $row["MATINH"] . '">' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                                                                    }
                                                                }
                                                                echo '</select>';
                                                                ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="col border-left
                                m-1 p-3 text-center
                                font-weight-bold
                                text-muted">
                                                                <h5 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info">Điểm đến</h5>
                                                                <?php

                                                                $sql = "SELECT * FROM tinhthanh";
                                                                $result = mysqli_query($conn, $sql);

                                                                echo '<select class="form-select1 text-dark text-center" style="border: none" id="diemden" onchange="getDivQuanDen()">';
                                                                echo '<option selected text-dark>Chọn địa điểm</option>';
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        echo '<option value="' . $row["MATINH"] . '">' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                                                                    }
                                                                }
                                                                echo '</select>';
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="col border-left text-center m-1 p-3">
                                                                <h5 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info">Ngày đi</h5>
                                                                <?php
                                                                $currentDate = date("Y-m-d");
                                                                $bookDate = isset($_POST['book_date']) ? $_POST['book_date'] : '';
                                                                if ($bookDate != '' && $currentDate > $bookDate) {
                                                                    echo "Không thể đặt vé cho ngày đã qua.";
                                                                } else {
                                                                    echo "<input type='date' id='ngaydi' name='ngaydi' min='$currentDate' required>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="col border-left text-center m-1 p-3">
                                                                <h5 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info">Ngày về</h5>
                                                                <?php
                                                                // Lấy ngày hiện tại
                                                                $currentDate = date("Y-m-d");

                                                                // Lấy ngày đặt
                                                                $bookDate = isset($_POST['book_date']) ? $_POST['book_date'] : '';

                                                                // Kiểm tra nếu ngày hiện tại lớn hơn ngày đặt thì không cho đặt
                                                                if ($bookDate != '' && $currentDate > $bookDate) {
                                                                    echo "Không thể đặt vé cho ngày đã qua.";
                                                                } else {
                                                                    echo "<input type='date' id='ngayve' name='ngayve' min='$currentDate' disabled required>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col container shadow m-3" style="border-radius: 10px;">
                                                        <div class="row d-flex justify-content-center p-3">
                                                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info mr-3" style="font-size: medium;">Chọn quận huyện đi: </h6>
                                                            <div id="ajaxquandi"></div>
                                                            <select class="form-select1 text-dark text-center" style="border: none" id="quanhuyendi" name="quanhuyendi" onchange="getDivBenDi()">
                                                                <option selected text-muted>Hãy chọn điểm đi</option>
                                                            </select>
                                                        </div>
                                                        <div class="row d-flex justify-content-center p-3">
                                                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info mr-3" style="font-size: medium;">Chọn bến đi: </h6>
                                                            <div id="ajaxbendi"></div>
                                                            <select class="form-select1 text-dark text-center" style="border: none" id="bendi" name="bendi">
                                                                <option selected text-dark>Hãy chọn quận huyện đi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col container shadow m-3" style="border-radius: 10px;">
                                                        <div class="row d-flex justify-content-center p-3">
                                                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info mr-3" style="font-size: medium;">Chọn quận huyện đến: </h6>
                                                            <div id="ajaxquanden"></div>
                                                            <select class="form-select1 text-dark text-center" style="border: none" id="quanhuyenden" name="quanhuyenden" onchange="getDivBenDen()">
                                                                <option selected text-muted>Hãy chọn điểm đến</option>
                                                            </select>
                                                        </div>
                                                        <div class="row d-flex justify-content-center p-3">
                                                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-info mr-3" style="font-size: medium;">Chọn bến đến: </h6>
                                                            <div id="ajaxbenden"></div>
                                                            <select class="form-select1 text-dark text-center" style="border: none" id="benden" name="benden">
                                                                <option selected text-dark>Hãy chọn quận huyện đến</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-outline-info mt-2" style="float: right;" onclick="getNewChuyenXe()">Tìm chuyến xe</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="chuyenxe_ajax"></div>
                                                <!-- XÁC NHẬN THÔNG TIN ĐẶT VÉ -->
                                                <div class="modal" id="myModal2">
                                                    <div class="modal-dialog" style="max-width: 70%; width: 70%;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Xác nhận thông tin đặt vé</h4>
                                                                <button type="button" class="close" onclick="$('#myModal2').modal('hide');">&times;</button>
                                                            </div>
                                                            <div class=" modal-body">
                                                            <div class="row" id="info-personal"></div>
                                                            <p><input type="checkbox" id="chapnhandieukhoan_0"> Chấp nhận <b style="color: #ba2f25;">điều khoản đặt vé</b> của Xe Khách ABC</p>
                                                            </div>
                                                            <!-- Chân hộp thoại -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-info" type="button" id="admin_datve" onclick="xacnhandatve_0()">Xác nhận</button>
                                                            </div>
                                                                <!-- ///////////////////////////////////////////////////////////////////////////////// -->
                                                                <div class="modal" id="myModal3">
                <div class="modal-dialog" style="margin-top: 300px;">
                    <div class="modal-content">

                        <!-- Tiêu đề hộp thoại -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thông báo</h4>
                        </div>

                        <!-- Nội dung hộp thoại -->
                        <div class="modal-body">
                            <div class="text-center p-4 m-4" id="datvethanhcong">
                                <div style="font-size: xx-large;">✅</div>
                                <h1 class="text-success">ĐẶT VÉ THÀNH CÔNG</h1>
                            </div>
                        </div>

                        <!-- Chân hộp thoại -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Đóng</button>
                        </div>

                    </div>
                </div>
                                                            </div>
                                                                <!-- ///////////////////////////////////////////////////////////////////////////////// -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ĐÓNG FORM -->
                                            </div>
                                        </div>
                                        <!-- --------------------------------------------------------------ĐUÔI DIALOG---------------------------------------------------------------------------------------------------------------------- -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- --------------------------------------------------------------ĐẶT VÉ HỘ---------------------------------------------------------------------------------------------------------------------- -->


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
<script>

    // Thông tin khách hàng & chuyến
    var khuhoi;
    var loaichuyen;
    var idchuyenxe;
    var tenchuyenxe;
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button đang được click
        var hotenkhachhang = button.data('hoten') // Lấy giá trị data-hoten
        var emailkhachhang = button.data('email') // Lấy giá trị data-email
        var sdtkhachhang = button.data('sdt') // Lấy giá trị data-email
        sessionStorage.setItem('emailkhachhang', emailkhachhang);
        sessionStorage.setItem('hotenkhachhang', hotenkhachhang);
        sessionStorage.setItem('sdtkhachhang', sdtkhachhang);
    })

    $('#myModal2').on('show.bs.modal', function (event) {
        var hotenkhach = sessionStorage.getItem('hotenkhachhang');
        var emailkhach = sessionStorage.getItem('emailkhachhang');
        var sdtkhach = sessionStorage.getItem('sdtkhachhang');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("info-personal").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "datve_function.php?function=xacnhanthongtin&hoten="+ hotenkhach + "&email=" + emailkhach + "&sdt=" + sdtkhach,true);
        xmlhttp.send();
        // document.getElementById("bendi").remove();
    })

    function xacnhandatve_0(){
        if(!document.getElementById('chapnhandieukhoan_0').checked){
            alert('Bạn chưa chấp nhận điều khoản của chúng tôi');
            return
        }else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datvethanhcong").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "phieudatve.php?function=taophieudatve",true);
            xmlhttp.send();
            $('#myModal3').modal('show');
        }
    }
    // LẤY BẾN ĐI MỚI VÀ THAY VÀO CHỔ CHỌN BẾN ĐI KHI NGƯỜI DÙNG BẤM CHỌN QUẬN HUYỆN

    function getDivBenDi() {
        var maquanhuyen = document.getElementById("quanhuyendi").value;
        var matinhdi = document.getElementById("diemdi").value;
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // xử lý phản hồi từ server
                document.getElementById("ajaxbendi").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "datve_function.php?function=ajaxbendi&matinh=" + matinhdi + "&maquanhuyen=" + maquanhuyen,
            true);
        xmlhttp.send();
        document.getElementById("bendi").remove();
    }

    function getDivBenDen() {
        var maquanhuyen = document.getElementById("quanhuyenden").value;
        var matinhden = document.getElementById("diemden").value;
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // xử lý phản hồi từ server
                document.getElementById("ajaxbenden").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "datve_function.php?function=ajaxbenden&matinh=" + matinhden + "&maquanhuyen=" +
            maquanhuyen, true);
        xmlhttp.send();
        document.getElementById("benden").remove();
    }

    // LẤY CHUYẾN XE MỚI VÀ THAY VÀO CHUYẾN XE CŨ KHI NGƯỜI DÙNG BẤM LỌC

    function makeNull(x) {
        if (x.includes("chọn") || x.includes("Chọn"))
            x = "";
        return x;
    }

    function getNewChuyenXe() {
        var maquanhuyendi = makeNull(document.getElementById("quanhuyendi").value);
        var mabendi = makeNull(document.getElementById("bendi").value);
        var maquanhuyenden = makeNull(document.getElementById("quanhuyenden").value);
        var mabenden = makeNull(document.getElementById("benden").value);
        var matinhdi = makeNull(document.getElementById("diemdi").value);
        var matinhden = makeNull(document.getElementById("diemden").value);
        var ngaydi = document.getElementById("ngaydi").value;
        if (ngaydi == "") {
            alert('Vui lòng chọn ngày đi');
            return;
        }
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // xử lý phản hồi từ server
                document.getElementById("chuyenxe_ajax").innerHTML = this.responseText;
                if (this.responseText == "") {
                    document.getElementById("chuyenxe_ajax").innerHTML = "KHÔNG CÓ CHUYẾN XE"
                }
            }
        };

        xmlhttp.open("GET", "datve_function.php?function=ajaxchuyenxe&maquanhuyendi=" + maquanhuyendi + "&maquanhuyenden=" + maquanhuyenden + "&mabendi=" + mabendi + "&mabenden=" + mabenden + "&matinhdi=" + matinhdi + "&matinhden=" + matinhden + "&ngaydi=" + ngaydi, true);
        xmlhttp.send();

        // document.getElementById("chuyenxe_item").remove();
    }

    // LẤY QUẬN HUYỆN MỚI VÀ THAY VÀO QUẬN HUYỆN CŨ KHI NGƯỜI DÙNG CHỌN TỈNH THÀNH (ĐIỂM ĐI/ĐIỂM ĐẾN)

    function getDivQuanDi() {
        var matinhdi = document.getElementById("diemdi").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // xử lý phản hồi từ server
                document.getElementById("ajaxquandi").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "datve_function.php?function=ajaxquandi&matinh=" + matinhdi, true);
        xmlhttp.send();
        document.getElementById("quanhuyendi").remove();
    }

    function getDivQuanDen() {
        var matinhdi = document.getElementById("diemden").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // xử lý phản hồi từ server
                document.getElementById("ajaxquanden").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "datve_function.php?function=ajaxquanden&matinh=" + matinhdi, true);
        xmlhttp.send();
        document.getElementById("quanhuyenden").remove();
    }

    // LẤY DANH SÁCH GHẾ KHI NGƯỜI DÙNG CHỌN CHUYẾN
    var sumTicket = 0; //Biến cộng vé 
    var tenvitri = [];
    var idvitri = [];

    function getTableGhe() {
        sumTicket = 0;
        tenvitri = [];
        idvitri = [];
        var biensoxe = event.target.closest('.container').querySelector('.biensoxe').textContent;
        var idchuyenxe = event.target.closest('.container').querySelector('.idchuyenxe').textContent;
        var idbendi = event.target.closest('.container').querySelector('.idbendi').textContent;
        var idbenden = event.target.closest('.container').querySelector('.idbenden').textContent;
        var ngayve = document.getElementById("ngayve").value;
        var khuhoiRadioButton = document.getElementById("khuhoi");
        if (khuhoiRadioButton.checked) {
            var khuhoi = 1;
        } else {
            var khuhoi = 0;
        }
        /////////////
        var codeDiv = event.target.closest('.container').querySelector('.show_tableghe');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                codeDiv.innerHTML = this.responseText;
                var btnBook = document.getElementById("bookticket");
                btnBook.onclick = function() {
                    if (sumTicket == 0) {
                        alert('Vui lòng chọn vị trí rồi tiếp tục');
                        event.preventDefault();
                    } else {
                        $('#myModal2').modal('show');
                    }
                }
            }
        };
        xmlhttp.open("GET", "datve_function.php?function=get_tableghe&biensoxe=" + biensoxe + "&idchuyenxe=" + idchuyenxe + "&idbendi=" + idbendi + "&idbenden=" + idbenden + "&ngayve=" + ngayve + "&khuhoi=" + khuhoi, true);
        xmlhttp.send();
        var allRadios = document.querySelectorAll('.selectChuyenXe');
        for (var i = 0; i < allRadios.length; i++) {
            var radioDiv = allRadios[i].closest('.container').querySelector('.show_tableghe');
            if (radioDiv && radioDiv !== codeDiv) {
                radioDiv.innerHTML = '';
            }
        }
    };

    //LẤY CÁI GHẾ ĐEM ĐỔI MÀU RỒI TÍNH SỐ VÉ VỚI TIỀN

    function showInfoPrice(button) {
        var idVitri = button.getAttribute("data-id");
        var tenVitri = button.getAttribute("data-name");
        var nowmoney = event.target.closest('.container').querySelector('.now-money').textContent;
        // Nếu chưa đặt
        if ($(button).hasClass('btn-info')) {
            sumTicket++;
            tenvitri.push(tenVitri);
            idvitri.push(idVitri);
            $(button).removeClass('btn-info').addClass('btn-danger');

        } else {
            sumTicket--;
            tenvitri.pop();
            idvitri.pop();
            $(button).removeClass('btn-danger').addClass('btn-info');
        }
        var money = (sumTicket * nowmoney).toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        document.getElementById("sumticket").innerHTML = "Tổng số vé: " + sumTicket + " vé";
        document.getElementById("summoney").innerHTML = "Tổng tiền: " + money.slice(0, -2) + ".000đ";

        $.ajax({
            url: "datve_function.php",
            type: "POST",
            data: {
                sumTicket: sumTicket,
                money: money.slice(0, -2),
                idVitri: idvitri,
                tenVitri: tenvitri
            },
            success: function(response) {
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
</script>

</body>

</html>