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
//LỌC QUẬN ĐI
if (isset($_GET["function"]) && $_GET["function"] == "ajaxquandi") {
    // Gọi hàm PHP và trả về kết quả
    $matinhdi = $_GET["matinh"];
    echo quandi_filter($matinhdi);
}

function quandi_filter($matinhdi)
{
    $conn = connect();
    $sql = "SELECT * FROM quanhuyen a, tinhthanh b WHERE a.MATINH = b.MATINH AND b.MATINH = '" . $matinhdi . "'";
    $result = mysqli_query($conn, $sql);
    echo '<select class="form-select1 text-muted text-center" style="border: none" id="quanhuyendi" name="quanhuyendi" onchange="getDivBenDi()">';
    echo '<option selected text-muted>Chọn</option>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["MAQUANHUYEN"] . '">' . $row["TENQUANHUYEN"] . '</option>';
        }
    }
    echo '</select>';
}

//LỌC QUẬN ĐẾN
if (isset($_GET["function"]) && $_GET["function"] == "ajaxquanden") {
    // Gọi hàm PHP và trả về kết quả
    $matinhden = $_GET["matinh"];
    echo quanden_filter($matinhden);
}

function quanden_filter($matinhden)
{
    $conn = connect();
    $sql = "SELECT * FROM quanhuyen a, tinhthanh b WHERE a.MATINH = b.MATINH AND b.MATINH = '" . $matinhden . "'";
    $result = mysqli_query($conn, $sql);
    echo '<select class="form-select1 text-muted text-center" style="border: none" id="quanhuyenden" name="quanhuyenden" onchange="getDivBenDen()">';
    echo '<option selected text-muted>Chọn</option>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["MAQUANHUYEN"] . '">' . $row["TENQUANHUYEN"] . '</option>';
        }
    }
    echo '</select>';
}

//LỌC BẾN ĐI

if (isset($_GET["function"]) && $_GET["function"] == "ajaxbendi") {
    // Gọi hàm PHP và trả về kết quả
    $matinhdi = $_GET["matinh"];
    $maquanhuyen = $_GET["maquanhuyen"];
    echo bendi_filter($matinhdi, $maquanhuyen);
}

function bendi_filter($matinhdi, $maquanhuyen)
{
    $conn = connect();
    $sql = "SELECT * FROM benxe a, quanhuyen b, tinhthanh c WHERE a.MAQUANHUYEN = b.MAQUANHUYEN AND b.MATINH = c.MATINH AND b.MATINH = '" . $matinhdi . "' AND a.MAQUANHUYEN like '%" . $maquanhuyen . "%'";
    $result = mysqli_query($conn, $sql);
    echo '<select class="form-select1 text-muted text-center" style="border: none" id="bendi" name="bendi">';
    echo '<option selected text-muted>Chọn</option>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["MABX"] . '">' . $row["TENBEN"] . '</option>';
        }
    }
    echo '</select>';
}


//LỌC BẾN ĐẾN

if (isset($_GET["function"]) && $_GET["function"] == "ajaxbenden") {
    // Gọi hàm PHP và trả về kết quả
    $matinhden = $_GET["matinh"];
    $maquanhuyen = $_GET["maquanhuyen"];
    echo benden_filter($matinhden, $maquanhuyen);
}

function benden_filter($matinhden, $maquanhuyen)
{
    $conn = connect();
    $sql = "SELECT * FROM benxe a, quanhuyen b, tinhthanh c WHERE a.MAQUANHUYEN = b.MAQUANHUYEN AND b.MATINH = c.MATINH AND b.MATINH = '" . $matinhden . "' AND a.MAQUANHUYEN like '%" . $maquanhuyen . "%'";
    $result = mysqli_query($conn, $sql);
    echo '<select class="form-select1 text-muted text-center" style="border: none" id="benden" name="benden">';
    echo '<option selected text-muted>Chọn</option>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["MABX"] . '">' . $row["TENBEN"] . '</option>';
        }
    }
    echo '</select>';
}

//LỌC CHUYẾN XE
if (isset($_GET["function"]) && $_GET["function"] == "ajaxchuyenxe") {
    $maquanhuyendi = $_GET["maquanhuyendi"];
    $maquanhuyenden = $_GET["maquanhuyenden"];
    $mabendi = $_GET["mabendi"];
    $mabenden = $_GET["mabenden"];
    $matinhdi = $_GET["matinhdi"];
    $matinhden = $_GET["matinhden"];
    $ngaydi = $_GET["ngaydi"];
    echo chuyenxe_Filter($maquanhuyendi, $maquanhuyenden, $mabendi, $mabenden, $matinhdi, $matinhden, $ngaydi);
}

function chuyenxe_Filter($maquanhuyendi, $maquanhuyenden, $mabendi, $mabenden, $matinhdi, $matinhden, $ngaydi)
{
    $conn = connect();
    if(isset($_SESSION["email"])){
        $direct = 'xacnhanthongtindatve.php';
    }else{
        $direct = 'taikhoan.php';
    }
    $sql = "SELECT *, bxdi.TENBEN TENBENDI, bxden.TENBEN TENBENDEN, bxdi.MABX IDBENDI, bxden.MABX IDBENDEN FROM chuyenxe c, tuyenxe a, benxe bxdi, benxe bxden, quanhuyen qhdi, quanhuyen qhden , tinhthanh ttdi, tinhthanh ttden, xe x, loaixe lx
        WHERE c.ID_TUYEN = a.ID_TUYEN
        AND a.MABX = bxdi.MABX AND a.BEN_MABX = bxden.MABX
        AND bxdi.MAQUANHUYEN = qhdi.MAQUANHUYEN AND bxden.MAQUANHUYEN = qhden.MAQUANHUYEN
        AND qhdi.MATINH = ttdi.MATINH AND qhden.MATINH = ttden.MATINH
        AND c.BIENSO = x.BIENSO AND x.ID_LOAI = lx.ID_LOAI
        AND ttdi.MATINH = '" . $matinhdi . "' AND ttden.MATINH = '" . $matinhden . "'
        AND qhdi.MAQUANHUYEN like '%" . $maquanhuyendi . "%' AND qhden.MAQUANHUYEN like '%" . $maquanhuyenden . "%'
        AND bxdi.MABX like '%" . $mabendi . "%' AND bxden.MABX like '%" . $mabenden . "%'
        AND c.TGDUKIENKHOIHANH like '".$ngaydi."%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<div id="chuyenxe_item">';
        echo '<h6 class="card-title text-muted">KẾT QUẢ:</h6>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="'.$direct.'" method="post">';
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
}

//LẤY BẢNG GHẾ

if (isset($_GET["function"]) && $_GET["function"] == "get_tableghe") {
    $biensoxe = $_GET["biensoxe"];
    $idchuyenxe = $_GET["idchuyenxe"];
    $idbendi = $_GET["idbendi"];
    $idbenden = $_GET["idbenden"];
    $ngayve = $_GET["ngayve"];
    $khuhoi = $_GET["khuhoi"];
    $_SESSION["khuhoi"] = $khuhoi;
    if($khuhoi == 1){
        $conn = connect();
        $chuyenkhuhoi = "SELECT *, bxdi.TENBEN TENBENDI, bxden.TENBEN TENBENDEN, bxdi.MABX IDBENDI, bxden.MABX IDBENDEN FROM chuyenxe c, tuyenxe a, benxe bxdi, benxe bxden, quanhuyen qhdi, quanhuyen qhden , tinhthanh ttdi, tinhthanh ttden, xe x, loaixe lx
        WHERE c.ID_TUYEN = a.ID_TUYEN
        AND a.MABX = bxdi.MABX AND a.BEN_MABX = bxden.MABX
        AND bxdi.MAQUANHUYEN = qhdi.MAQUANHUYEN AND bxden.MAQUANHUYEN = qhden.MAQUANHUYEN
        AND qhdi.MATINH = ttdi.MATINH AND qhden.MATINH = ttden.MATINH
        AND c.BIENSO = x.BIENSO AND x.ID_LOAI = lx.ID_LOAI
        AND bxdi.MABX = '" . $idbenden . "' AND bxden.MABX = '" . $idbendi . "'
        AND c.TGDUKIENKHOIHANH like '".$ngayve."%'";

        $kqtimchuyen = mysqli_query($conn, $chuyenkhuhoi);
        if (mysqli_num_rows($kqtimchuyen) > 0) {
            $chuyenkhuhoi = mysqli_fetch_assoc($kqtimchuyen);
            $_SESSION["idchuyenkhuhoi"] = $chuyenkhuhoi["ID_CHUYENXE"];
            $_SESSION["tenchuyenkhuhoi"] = $chuyenkhuhoi["TENCHUYENXE"];
        }
    }

    $_SESSION["idchuyenxe"] = $idchuyenxe;
    echo get_TableGhe($biensoxe, $idchuyenxe);
}

function get_TableGhe($biensoxe, $idchuyenxe)
{
    $conn = connect();
    echo '<div class="row">';
    echo '<div class="col-md-8">';
    echo '';
    echo '<div class="mt-5 p-4">';
    echo '<div class="row">';
    echo '<div class="col-md-4 mx-auto">';
    echo '<h5 class="border p-2 font-weight-bold" style="color: #ba2f25; border-radius: 15px; text-align: center; background-color:#E9E9E9">Chọn ghế:</h5>';
    echo '</div>';
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="col mx-auto">';
    echo '<div class="row border mt-2 p-3" style="border-radius: 20px 20px 0 0;">';
    echo '<h5 class="col-md-6" style="text-align: center;">Tầng dưới</h5>';
    echo '<h5 class="col-md-6 " style="text-align: center;">Tầng trên</h5>';
    echo '</div>';
    echo '<div class="row border" style="border-radius: 0 0 20px 20px; background-color: #f8f9f9; ">';
    echo '<div class="col-md-6 border-right p-4">';
    echo '<table style="margin: 0 auto; text-align: center;">';
    echo '<tr>';
    echo '<td class="border-0"> </td>';
    echo '<td> <button type="button" class="btn m-1 btn-secondary" style="padding:1.3rem;"></button></td>';
    echo '<td class="border-0"> </td>';
    echo '</tr>';
    $emptyChair = "SELECT * FROM vitrighe vt, xe x, loaixe lx WHERE vt.BIENSO = x.BIENSO AND x.ID_LOAI = lx.ID_LOAI AND x.BIENSO = '" . $biensoxe . "' ORDER BY vt.TENVITRI;";
    $result = mysqli_query($conn, $emptyChair);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["soluongghe"] = $row["SOGHE"];
        for ($i = 1; $i <= 5; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= 3; $j++) {
                if ($row !== NULL) {
                    $isBook = "SELECT COUNT(ID_VE) COCHO FROM vexe WHERE vexe.ID_VITRI = '".$row["ID_VITRI"]."'";
                    $resultBook = mysqli_query($conn, $isBook);
                    $checkBook = mysqli_fetch_assoc($resultBook);
                    if($checkBook["COCHO"]>0){
                        echo '<td> <button type="button" class="btn btn-secondary m-1 p-2" data-name="' . $row["TENVITRI"] . '" data-id="' . $row["ID_VITRI"] . '">' . $row["TENVITRI"] . '</button></td>';
                    }else{
                        echo '<td> <button type="button" class="btn btn-info m-1 p-2" onclick="showInfoPrice(this)" data-name="' . $row["TENVITRI"] . '" data-id="' . $row["ID_VITRI"] . '">' . $row["TENVITRI"] . '</button></td>';
                    }
                    $row = mysqli_fetch_assoc($result);
                } else {
                    echo '<td> &nbsp; </td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
        echo '<div class="col-md-6 p-4">';
        echo '<table style="margin: 0 auto; text-align: center;">';
        echo '<tr>';
        echo '<td>';
        echo '<div class="mb-5"></div>';
        echo '</td>';
        echo '</tr>';
        for ($i = 1; $i <= 5; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= 3; $j++) {
                if ($row !== NULL) {
                    $isBook = "SELECT COUNT(ID_VE) COCHO FROM vexe WHERE vexe.ID_VITRI = '".$row["ID_VITRI"]."' AND vexe.ID_CHUYENXE = '".$idchuyenxe."'";
                    $resultBook = mysqli_query($conn, $isBook);
                    $checkBook = mysqli_fetch_assoc($resultBook);
                    if($checkBook["COCHO"]>0){
                        echo '<td> <button type="button" class="btn btn-secondary m-1 p-2" data-name="' . $row["TENVITRI"] . '" data-id="' . $row["ID_VITRI"] . '">' . $row["TENVITRI"] . '</button></td>';
                    }else{
                        echo '<td> <button type="button" class="btn btn-info m-1 p-2" onclick="showInfoPrice(this)" data-name="' . $row["TENVITRI"] . '" data-id="' . $row["ID_VITRI"] . '">' . $row["TENVITRI"] . '</button></td>';
                    }
                    $row = mysqli_fetch_assoc($result);
                } else {
                    echo '<td> &nbsp; </td>';
                }
            }
            echo '</tr>';
        }
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="row mt-4 border mx-auto" style="background-color: #f8f9f9; border-radius: 15px;">';
    echo '<div class="col">';
    echo '<p>Trống:<button type="button" class="btn btn-info m-1 p-3"></button></p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p>Đang chọn:<button type="button" class="btn btn-danger m-1 p-3"></button></p>';
    echo '</div>';
    echo '<div class="col">';
    echo '<p>Đã chọn:<button type="button" class="btn btn-secondary m-1 p-3"></button></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '';
    echo '';
    echo '';
    echo '</div>';
    echo '';
    echo '<div class="col-md-4 mt-5 pt-4">';
    echo '<div class="mt-5">';
    echo '<div class="row">';
    echo '<h6 class="border p-2 mb-2 mt-2" style="color: #ba2f25; border-radius: 15px; background-color:#f8f9f9">Thông tin chung:</h6>';
    echo '</div>';

    $publicinfo = "SELECT * from chuyenxe c, tuyenxe t, xe x WHERE c.ID_TUYEN = t.ID_TUYEN AND c.BIENSO = x.BIENSO AND c.ID_CHUYENXE = '" . $idchuyenxe . "'";
    $result = mysqli_query($conn, $publicinfo);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["tenchuyenxe"] = $row["TENCHUYENXE"];
            $_SESSION["thoigiankhoihanh"] = $row["TGDUKIENKHOIHANH"];
            $_SESSION["benxedi"] = $row["MABX"];
            echo '<div class="row container border p-3 mb-2 dark" style="border-radius: 15px;">';
            echo '<div style = "color:#6e1a14;"><b class="text-dark">' . $row["TENCHUYENXE"] . '</b><br><hr>';
            echo '<b class="text-dark">Quảng đường: </b> ' . $row["QUANGDUONG"] . 'km<br>';
            echo '<b class="text-dark">Thời gian di chuyển trung bình: </b>' . $row["TGDICHUYENTB"] . 'km/h<br>';
            echo '<b class="text-dark">Biển số phương tiện di chuyển: </b>' . $row["BIENSO"] . '<br>';
            echo '<b class="text-dark">Số tiền phải trả cho một vé : </b>' . $row["GIAHIENHANH"] . '</div>';
            echo '<div class = "now-money" style="display:none;">' . $row["GIAHIENHANH"] . '</div>';
            echo '</div>';
        }
    }
    echo '<div class="row container border p-3" style="border-radius: 15px;">';
    echo '<b class="text-dark" id="sumticket">Tổng số vé: 0 vé </b>';
    echo '<b class="text-dark" id="summoney">Tổng tiền: 0.000đ</b></div>';
    echo '</div>';
    echo '<div class="row">';
    echo '<button class="snip1339" style="width: 70%; " id="bookticket">Đặt vé</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

//LẤY THÔNG TIN THANH TOÁN GHẾ

if (isset($_POST['sumTicket']) && isset($_POST['money'])) {
    if($_SESSION["khuhoi"] == 1){
        $_SESSION['tongsotien'] = $_POST['money']*2;
    }else{
        $_SESSION['tongsotien'] = $_POST['money'];
    }
    $_SESSION['tongsove'] = $_POST['sumTicket'];
    $_SESSION['idvitri'] = $_POST['idVitri'];
    $_SESSION['tenvitri'] = $_POST['tenVitri'];
}


//KIỂM TRA BANK

if (isset($_GET["function"]) && $_GET["function"] == "checkBank") {
    $bank_id = $_GET["bank_id"];
    $bank_code = $_GET["bank_code"];
    echo check_bank($bank_id, $bank_code);
}

function check_bank($bank_id, $bank_code)
{
    $conn = connect();
    $sql = "SELECT COUNT(EMAIL) COEMAIL FROM khachhang WHERE EMAIL = '".$_SESSION["email"]."' AND SoTaiKhoan = '".$bank_code."' AND MaNganHang = '".$bank_id."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["COEMAIL"] > 0) { // Tài khoản hợp lệ
        echo 1;
    }else{
        echo 0;
    }
}

