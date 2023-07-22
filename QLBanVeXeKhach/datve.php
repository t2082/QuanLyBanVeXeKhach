<!DOCTYPE html>
<html lang="en">
<title>Đặt vé</title>
<?php
include("header.php");
?>

<body>

    <?php
    if (isset($_POST['diemdi'])) {
        $diemdi = $_POST['diemdi'];
    }
    if (isset($_POST['diemden'])) {
        $diemden = $_POST['diemden'];
    }
    if (isset($_POST['ngaydi'])) {
        $ngaydi = $_POST['ngaydi'];
    } else {
        $ngaydi = "";
    }
    //Khứ hồi
    if (isset($_POST['ngayve'])) {
        $ngayve = $_POST['ngayve'];
    } else {
        $ngayve = "";
    }
    ?>


    <div class="container border shadow" style="border-top: none;">
        <div class="border1 mb-5 ml-5 mt-5 mr-5 shadow-lg p-5">
            <!-- Nhớ xóa border -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="col m-1 p-3
                            text-muted text-center
                            font-weight-bold">
                            <h5 class="card-title
                                text-center
                                font-weight-bold
                                text-muted">Điểm đi</h5>
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
                            $sql = "SELECT * FROM tinhthanh";
                            $result = mysqli_query($conn, $sql);

                            // Đưa các điểm đến vào ô điểm đến trên trang web
                            echo '<select class="form-select1 text-muted text-center" style="border: none" id="diemdi" onchange="getDivQuanDi()">';
                            echo '<option selected text-muted>Chọn địa điểm</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row["MATINH"] == $diemdi) {
                                        echo '<option value="' . $row["MATINH"] . '"selected>' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                                    } else {
                                        echo '<option value="' . $row["MATINH"] . '">' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                                    }
                                }
                            }
                            echo '</select>';

                            // // Đóng kết nối
                            // mysqli_close($conn);
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
                                    text-muted">Điểm đến</h5>
                            <?php

                            $sql = "SELECT * FROM tinhthanh";
                            $result = mysqli_query($conn, $sql);

                            // Đưa các điểm đến vào ô điểm đến trên trang web
                            echo '<select class="form-select1 text-muted text-center" style="border: none" id="diemden" onchange="getDivQuanDen()">';
                            echo '<option selected text-muted>Chọn địa điểm</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row["MATINH"] == $diemden) {
                                        echo '<option value="' . $row["MATINH"] . '"selected>' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                                    } else {
                                        echo '<option value="' . $row["MATINH"] . '">' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                                    }
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
                                    text-muted">Ngày đi</h5>
                            <?php
                            // Lấy ngày hiện tại
                            $currentDate = date("Y-m-d");

                            // Lấy ngày đặt
                            $bookDate = isset($_POST['book_date']) ? $_POST['book_date'] : '';

                            // Kiểm tra nếu ngày hiện tại lớn hơn ngày đặt thì không cho đặt
                            if ($bookDate != '' && $currentDate > $bookDate) {
                                echo "Không thể đặt vé cho ngày đã qua.";
                            } else {
                                if ($ngaydi != "") {
                                    echo "<input type='date' id='ngaydi' name='ngaydi' min='$currentDate' value = '" . $ngaydi . "' required>";
                                } else {
                                    echo "<input type='date' id='ngaydi' name='ngaydi' min='$currentDate' required>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col border-left text-center m-1 p-3">
                            <h5 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-muted">Ngày về</h5>
                            <?php
                            // Lấy ngày hiện tại
                            $currentDate = date("Y-m-d");

                            // Lấy ngày đặt
                            $bookDate = isset($_POST['book_date']) ? $_POST['book_date'] : '';

                            // Kiểm tra nếu ngày hiện tại lớn hơn ngày đặt thì không cho đặt
                            if ($bookDate != '' && $currentDate > $bookDate) {
                                echo "Không thể đặt vé cho ngày đã qua.";
                            } else {
                                if (isset($_POST['ngayve'])) {
                                    echo "<input type='date' id='ngayve' name='ngayve' min='$currentDate' value = '" . $ngayve . "'>";
                                } else {
                                    echo "<input type='date' id='ngayve' name='ngayve' min='$currentDate'>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <button class="snip1339 " style="float: right;" id="find-flight" onclick="getNewChuyenXe()">Tìm chuyến
                    xe</button>
            </div>
        </div>
        <div class="border1 m-5 shadow-lg p-5">
            <h6 class="card-title text-muted">BỘ LỌC:</h6>
            <div class="row">
                <div class="col container shadow m-2 p-4" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col" id="filterQuanDi">
                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-muted">Chọn quận huyện đi: </h6>
                            <div id="ajaxquandi"></div>
                            <?php
                            $sql = "SELECT * FROM quanhuyen a, tinhthanh b WHERE a.MATINH = b.MATINH AND a.MATINH = '" . $diemdi . "'";
                            $result = mysqli_query($conn, $sql);
                            echo '<select class="form-select1 text-muted text-center" style="border: none" id="quanhuyendi" name="quanhuyendi" onchange="getDivBenDi()">';
                            echo '<option selected text-muted>Chọn</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["MAQUANHUYEN"] . '">' . $row["TENQUANHUYEN"] . '</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col">
                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-muted">Chọn bến đi: </h6>
                            <div id="ajaxbendi"></div>
                            <?php
                            $sql = "SELECT * FROM benxe a, quanhuyen b, tinhthanh c WHERE a.MAQUANHUYEN = b.MAQUANHUYEN AND b.MATINH = c.MATINH AND b.MATINH = '" . $diemdi . "'";
                            $result = mysqli_query($conn, $sql);
                            echo '<select class="form-select1 text-muted text-center" style="border: none" id="bendi" name="bendi">';
                            echo '<option selected text-muted>Chọn</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["MABX"] . '">' . $row["TENBEN"] . '</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                        </div>

                    </div>
                </div>
                <div class="col container shadow m-2 p-4" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-muted">Chọn quận huyện đến: </h6>
                            <div id="ajaxquanden"></div>
                            <?php
                            $sql = "SELECT * FROM quanhuyen a, tinhthanh b WHERE a.MATINH = b.MATINH AND a.MATINH = '" . $diemden . "'";
                            $result = mysqli_query($conn, $sql);
                            echo '<select class="form-select1 text-muted text-center" style="border: none" id="quanhuyenden" name="quanhuyenden" onchange="getDivBenDen()">';
                            echo '<option selected text-muted>Chọn</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["MAQUANHUYEN"] . '">' . $row["TENQUANHUYEN"] . '</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                        </div>

                        <div class="col">
                            <h6 class="card-title
                                    text-center
                                    font-weight-bold
                                    text-muted">Chọn bến đến: </h6>
                            <div id="ajaxbenden"></div>
                            <?php
                            $sql = "SELECT * FROM benxe";
                            $result = mysqli_query($conn, $sql);
                            echo '<select class="form-select1 text-muted text-center" style="border: none" id="benden" name="benden">';
                            echo '<option selected text-muted>Chọn</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["MABX"] . '">' . $row["TENBEN"] . '</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-secondary mt-2" style="float: right;" onclick="getNewChuyenXe()">Lọc chuyến xe</button>
                </div>
            </div>
            <hr>
            <div id="chuyenxe_ajax"></div>
            <?php
            if (isset($_SESSION["email"])) {
                $direct = 'xacnhanthongtindatve.php';
            } else {
                $direct = 'taikhoan.php';
            }
            $sql = "SELECT *, bxdi.TENBEN TENBENDI, bxden.TENBEN TENBENDEN, bxdi.MABX IDBENDI, bxden.MABX IDBENDEN FROM chuyenxe c, tuyenxe a, benxe bxdi, benxe bxden, quanhuyen qhdi, quanhuyen qhden , tinhthanh ttdi, tinhthanh ttden, xe x, loaixe lx
                WHERE c.ID_TUYEN = a.ID_TUYEN
                AND a.MABX = bxdi.MABX AND a.BEN_MABX = bxden.MABX 
                AND bxdi.MAQUANHUYEN = qhdi.MAQUANHUYEN AND bxden.MAQUANHUYEN = qhden.MAQUANHUYEN
                AND qhdi.MATINH = ttdi.MATINH AND qhden.MATINH = ttden.MATINH
                AND c.BIENSO = x.BIENSO AND x.ID_LOAI = lx.ID_LOAI
                AND ttdi.MATINH = '" . $diemdi . "' AND ttden.MATINH = '" . $diemden . "'
                AND c.TGDUKIENKHOIHANH like '" . $ngaydi . "%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo '<div id="chuyenxe_item">';
                echo '<h6 class="card-title text-muted">KẾT QUẢ:</h6>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form action="' . $direct . '" method="post">';
                    echo '<div class="mt-4">';
                    echo '<div class="container border shadow p-4" style="border-radius: 10px;">';
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<h3 style="color: #454545">';
                    echo substr($row["TGDUKIENKHOIHANH"], 11, 8) . ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i>' . substr($row["TGDUKIENDEN"], 11, 8);
                    echo '</h3>';
                    echo '</div>';
                    echo '<div class="col">';
                    echo '<h5 style="float: right;">';
                    echo '<i class="fa fa-calendar m-1" aria-hidden="true" style="color:#042126"></i>';
                    echo '<i class="fa fa-bolt m-1" aria-hidden="true" style="color:#042126"></i>';
                    echo '<i class="fa fa-rss m-1" aria-hidden="true" style="color:#042126"></i>';
                    echo '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-4 border m-2 " style="border-radius: 30px; background-color:#E9E9E9">';
                    echo number_format($row["GIAHIENHANH"] . "000", 0, ',', '.') . " đ" . ' ● ' . $row["TENLOAI"] . ' ● Còn ' . $row["SOGHE"] . ' chỗ';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-11">';
                    echo '<div class="row">';
                    echo '<h6 class="col" style="font-size: large;"><i class="fa fa-circle mr-3" aria-hidden="true" style="color:#962d22"></i> ' . $row["TENBENDI"] . '</h6>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="border-left ml-4 p-1">';
                    echo '<div class="m-3 p-2 alert alert-info">';
                    echo 'Ngày dự kiến khởi hành: ' . substr($row["TGDUKIENKHOIHANH"], 0, 10) . '<br>';
                    echo 'Thời gian di chuyển trung bình: ' . floor($row["TGDICHUYENTB"]) . " giờ " . round(($row["TGDICHUYENTB"] - floor($row["TGDICHUYENTB"])) * 60) . ' phút <br>';
                    echo 'Ngày dự kiến đến: ' . substr($row["TGDUKIENDEN"], 0, 10);
                    echo '<div class = "biensoxe" style="display:none;">' . $row["BIENSO"] . '</div>';
                    echo '<div class = "idchuyenxe" style="display:none;">' . $row["ID_CHUYENXE"] . '</div>';
                    echo '<div class = "idbendi" style="display:none;">' . $row["IDBENDI"] . '</div>';
                    echo '<div class = "idbenden" style="display:none;">' . $row["IDBENDEN"] . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<h6 class="col" style="font-size: large;"><i class="fa fa-map-marker mr-3" aria-hidden="true" style="color:#962d22"></i> ' . $row["TENBENDEN"] . '</h6>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<br><br><br>';
                    echo '<div class="row">';
                    echo '<div style="text-align: center;">';
                    echo '<input style="width: 20px; height: 20px;" name="selectChuyenXe" class="selectChuyenXe" type="radio" onclick="getTableGhe()">';
                    echo '<h5 style="color: #962d22;">Chọn</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="show_tableghe"></div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>


    <script>
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
            if (x == "Chọn")
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

            document.getElementById("chuyenxe_item").remove();
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
            if (ngayve != '') {
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
                        if (sumTicket > 0) {

                        } else {
                            alert('Vui lòng chọn vị trí rồi tiếp tục');
                            event.preventDefault();
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

        xmlhttp.open("GET", "datve_function.php?function=ajaxchuyenxe&maquanhuyendi=" + maquanhuyendi +
            "&maquanhuyenden=" + maquanhuyenden + "&mabendi=" + mabendi + "&mabenden=" + mabenden + "&matinhdi=" +
            matinhdi + "&matinhden=" + matinhden, true);
        xmlhttp.send();

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
<?php
include("footer.php");
?>

</html>