<?php
include('header.php');
?>
<title>Xác Nhận Thông tin</title>

<div class="m-5">
    <div class="p-5 m-5">
        <div class="row border d-flex justify-content-center" style="border-radius: 15px 15px 0 0; background-color:#E9E9E9;">
            <h4 class=" p-3 font-weight-bold" style="color: #ba2f25; text-align: center;">THÔNG TIN HÀNH KHÁCH</h4>
        </div>
        <div class="row border-left border-right shadow">
            <div class="row ml-5 mr-5">
                <div class="col m-3 p-5 border-right">
                    <h5 class="border p-1 ml-5 mr-5" style="color: #ba2f25; text-align: center; border-radius:10px; background-color: #f7f7f7;">XÁC
                        NHẬN THÔNG TIN</h5>
                    <div class="row border mt-3" style="border-radius:10px; background-color: #f7f7f7;">
                        <?php
                        $gettenben = "SELECT bx.TENBEN from tuyenxe t, benxe bx WHERE t.MABX = bx.MABX AND bx.MABX = '" . $_SESSION["benxedi"] . "'";
                        $result = mysqli_query($conn, $gettenben);
                        $row = mysqli_fetch_assoc($result);
                        $StringTenViTri = implode(",", $_SESSION['tenvitri']);
                        echo '<div class="m-4" id="info-personal">';
                        echo '<p><b style="color: #ba2f25;">Họ tên hành khách: </b>' . $_SESSION["name"] . '</p>';
                        echo '<p><b style="color: #ba2f25;">Số điện thoại: </b>' . $_SESSION["sdt"] . '</p>';
                        echo '<p><b style="color: #ba2f25;">Email: </b>' . $_SESSION["email"] . '</p>';
                        if ($_SESSION["khuhoi"] == 1) {
                            echo '<p><b style="color: #ba2f25;">Chuyến xe: </b>' . $_SESSION["tenchuyenxe"] . ', ' . $_SESSION["tenchuyenkhuhoi"] . '</p>';
                            echo '<p><b style="color: #ba2f25;">Loại vé: </b> Khứ hồi</p>';
                        } else {
                            echo '<p><b style="color: #ba2f25;">Loại vé: </b> Một chiều</p>';
                            echo '<p><b style="color: #ba2f25;">Chuyến xe: </b>' . $_SESSION["tenchuyenxe"] . '</p>';
                        }
                        echo '<p><b style="color: #ba2f25;">Thời gian khởi hành: </b>' . $_SESSION["thoigiankhoihanh"] . '</p>';
                        echo '<p><b style="color: #ba2f25;">Số lượng ghế: </b>' . $_SESSION["tongsove"] . '</p>';
                        echo '<p><b style="color: #ba2f25;">Tên ghế: </b>' . $StringTenViTri . '</p>';
                        echo '<p><b style="color: #ba2f25;">Tổng số tiền: </b>' . number_format($_SESSION['tongsotien'] . "000", 0, ',', '.') . 'đ</p>';
                        echo '<p><b style="color: #ba2f25;">Điểm lên xe: </b>' . $row["TENBEN"] . '</p>';
                        echo '<br>';
                        echo '</div>';
                        ?>
                    </div>
                </div>
                <div class="col m-3 p-5">
                    <h5 class="border p-1 ml-5 mr-5" style="color: #ba2f25; text-align: center; border-radius:10px; background-color: #f7f7f7;">QUY
                        ĐỊNH & ĐIỀU KHOẢN</h5>
                    <div class="row border mt-3" style="border-radius:10px; background-color: #f7f7f7;">
                        <div class="m-4">
                            <div class="row">
                                <p>(*) Quý khách vui lòng mang email có chứa mã vé đến văn phòng để đổi vé lên xe trước
                                    giờ xuất bến ít nhất <b style="color: #ba2f25;">60 phút</b> để chúng tôi trung
                                    chuyển.</p>
                            </div>
                            <div class="row">
                                <p>(*) Thông tin hành khách phải chính xác, nếu không sẽ không thể lên xe hoặc hủy/đổi
                                    vé.</p>
                            </div>
                            <div class="row">
                                <p>(*) Quý khách không được đổi/trả vé vào các ngày Lễ Tết (ngày thường quý khách được
                                    quyền chuyển đổi hoặc hủy vé <b style="color: #ba2f25;">một lần</b> duy nhất trước
                                    giờ xe chạy 24 giờ), phí hủy vé 10%.</p>
                            </div>
                            <div class="row">
                                <p>(*) Nếu quý khách có nhu cầu trung chuyển, vui lòng liên hệ số điện thoại <b style="color: #ba2f25;">1900 2082</b> trước khi đặt vé. Chúng tôi không
                                    đón/trung chuyển tại những điểm xe trung chuyển không thể tới được.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border shadow border-top-0 pb-5" style="border-radius: 0 0 15px 15px; background-color:white;">
            <div class="col-md-6">
                <button class="btn btn-outline-secondary mr-4 p-2" style="width: 50%; float: right;" onclick="history.back()">QUAY VỀ</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info p-2" style="width: 50%;" type="button" data-toggle="modal" data-target="#myModal">THANH TOÁN</button>
            </div>
            <!-- Nhập ATM -->
            <form class="modal" id="myModal" action="phieudatve.php" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Tiêu đề hộp thoại -->
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập thông tin ngân hàng</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Nội dung hộp thoại -->
                        <div class="modal-body">
                            <input type="text" class="form-control" name="bank_code" id="bank_code" placeholder="Nhập số tài khoản">

                            <?php
                            $sql = "SELECT * FROM nganhang";
                            $result = mysqli_query($conn, $sql);
                            echo '<select class="form-control mt-3 mb-3" name="idbank" id="idbank">';
                            echo '<option selected text-muted>Chọn ngân hàng</option>';
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["MaNganHang"] . '">' . $row["TenNganHang"] . '</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                            <p><input type="checkbox" required> Chấp nhận <b style="color: #ba2f25;">điều khoản đặt vé</b> của Xe Khách ABC</p>
                        </div>

                        <!-- Chân hộp thoại -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button class="btn btn-info" type="submit" name="action" value="xacnhan" id="bank_confirm">Xác nhận</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function getback() {
        history.back();
    }

    document.getElementById('bank_confirm').addEventListener('click', function(event) {
        event.preventDefault();
        var bank_id = document.getElementById('idbank').value;
        var bank_code = document.getElementById('bank_code').value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 1) {
                    window.location.href = 'phieudatve.php?action=xacnhan';
                }else {
                    alert('Thông tin không chính xác!');
                }
            }
        };
        xmlhttp.open("GET", "datve_function.php?function=checkBank&bank_id=" + bank_id + "&bank_code=" + bank_code, true);
        xmlhttp.send();
    });
</script>


<?php
include('footer.php');
?>