<!DOCTYPE html>
<html lang="EN">
<title>Trang chủ - Hệ thống xe ABC</title>
<body>

<?php
include("header.php");
?>
<!-- Cái khung, bo gốc -->

<form action="datve.php" method="post" class="container border rounded shadow mt-5 mb-5">
    <!-- Cái khung, bo gốc -->
    <div class="border1 mb-5 ml-5 mt-5 shadow-lg p-5">
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
                        echo '<select class="form-select1 text-muted text-center" style="border: none" id="diemdi" name = "diemdi">';
                        echo '<option selected text-muted>Chọn địa điểm</option>';
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row["MATINH"] . '">' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
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
                        echo '<select class="form-select1 text-muted text-center" style="border: none" id="diemden" name = "diemden">';
                        echo '<option selected text-muted>Chọn địa điểm</option>';
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row["MATINH"].'">' . $row["TENTINH"] . ' (' . $row["MATINH"] . ')</option>';
                            }
                        }
                        echo '</select>';

                        // Đóng kết nối
                        mysqli_close($conn);
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
                            // Hiển thị ngày đi
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
                            // Hiển thị ngày về
                            echo "<input type='date' id='ngayve' name='ngayve' min='$currentDate'>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <button class="snip1339 " style="float: right;" id="find-flight" type="submit" name="action"
                value="timChuyenXe">Tìm chuyến xe</button>
        </div>

    </div>
</form>

<!-- Bảng giá -->
<div class="container">
    
    <h4 class="title3 font-weight-bold">TUYẾN PHỔ BIẾN</h4>
    <!-- Dòng đầu  -->
    <div class="row">
        <!-- Ô đầu  -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/SaiGon.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text22 font-weight-bold ">Sài Gòn ⇒ Đà Lạt</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>300.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                8h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                310km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
        <!-- Ô 2 -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/NhaTrang.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text21 font-weight-bold ">Sài Gòn ⇒ Nha Trang</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details">
                                <span>450.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                9h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                275km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
    </div>
    <div class="row">
        <!-- Ô đầu  -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/DaNang.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text21 font-weight-bold ">Sài Gòn ⇒ Đà Nẵng</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>395.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                20h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                980km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
        <!-- Ô 2 -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="CT65" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/CanTho.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text22 font-weight-bold ">Sài Gòn ⇒ Cần Thơ</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>165.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                4h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                190km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
    </div>

    <!-- Dòng 3 -->
    <div class="row">
        <!-- Ô đầu  -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="" style="display:none;">
            <input name="diemden" value="" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/HaNoi.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text22 font-weight-bold ">Đà Nẵng ⇒ Hà Nội</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>360.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                18h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                745km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
        <!-- Ô 2 -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/RachGia.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text21 font-weight-bold ">Sài Gòn ⇒ Rạch Giá</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>190.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                5h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                235km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
    </div>
    <!-- Dòng 4 -->
    <div class="row">
        <!-- Ô đầu  -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/ChauDoc.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text21 font-weight-bold ">Sài Gòn ⇒ Châu Đốc</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>175.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                6h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                240km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
        <!-- Ô 2 -->
        <form action="datve.php" method="post" class="container col-md-6 pr-5">
            <input name="diemdi" value="SG59" style="display:none;">
            <input name="diemden" value="CM04" style="display:none;">
            <button class="btn" type="submit" name="action" value="xacnhan" style="background-color: rgba(0, 0, 0, 0);">
                <div class="row border2 border">
                    <div>
                        <img class="img" src="assets/images/CaMau.jpg" style="max-width: 200px;" alt="">
                    </div>
                    <div>
                        <h5 class="text22 font-weight-bold ">Sài Gòn ⇒ Cà Mau</h5>
                        <div class="text23">
                            <div data-v-15bcc412="" class="details ">
                                <span>230.000đ &emsp;&emsp;&emsp;</span>
                                <p class="fa fa-clock-o icon "></p>
                                8h &emsp;&emsp;&emsp;
                                <p class="fa fa-map-marker icon"></p>
                                357km
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
    </div>

</div>


<div>
    <h1 class="tieude font-weight-bold" >ABC - CHẤT LƯỢNG LÀ DANH DỰ</h1>
    <img src="assets/images/nenan.jpg" class="d-block w-100" 
style="  background-repeat: no-repeat;
  background-size: cover;
  opacity: 0.3;"
>
</div>


<div class="partners">
    <h2 class="title font-weight-bold">ĐIỂM ĐẾN PHỔ BIẾN</h2>
    <h4 class="title2">Gợi ý những điểm du lịch được ưa thích trong năm</h4>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-partners owl-carousel">

                    <div class="partner-item hinh">
                        <a
                            href="https://vinpearl.com/vi/ben-ninh-kieu-can-tho-co-gi-thu-vi-kinh-nghiem-an-choi-sieu-chi-tiet">
                            <img src="assets/images/CanTho.jpg" title="Cần Thơ" alt="Cần Thơ">
                        </a>


                    </div>

                    <div class="partner-item hinh">
                        <a href="https://camautourism.vn/">
                            <img src="assets/images/CaMau.jpg" title="Cà Mau" alt="Cà Mau">
                        </a>
                    </div>

                    <div class="partner-item hinh">
                        <a href="https://vinpearl.com/vi/50-dia-diem-du-lich-da-nang-hap-dan-nhat-ban-tha-ho-lua-chon">
                            <img src="assets/images/DaNang.jpg" title="Đà Nẵng" alt="Đà Nẵng">
                        </a>
                    </div>

                    <div class="partner-item hinh">
                        <a href="https://www.vntrip.vn/cam-nang/dia-diem-du-lich-nha-trang-303">
                            <img src="assets/images/NhaTrang.jpg" title="Nha Trang" alt="Nha Trang">
                        </a>
                    </div>

                    <div class="partner-item hinh">
                        <a
                            href="https://vinpearl.com/vi/toplist-23-dia-diem-du-lich-sai-gon-nghe-la-muon-xach-balo-len-va-di">
                            <img src="assets/images/SaiGon.jpg" title="Sài Gòn" alt="Sài Gòn">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-item">
                <h4>Kết nối với chúng tôi</h4>
                <ul class="social-icons">
                    <h3 style=" color: #EE6D4A; font-size: 40px; font-weight: 700;">1900 2082</h3>
                    <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
                <p>
                    Địa chỉ:
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=Địa chỉ:Trần Quang Khải, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ"
                        target="_blank" class="address">102abc, Trần Quang Khải, P.Cái Khế, Q.Ninh Kiều, TP.Cần
                        Thơ</a>
                </p>
                <p>
                    Email:
                    <a href="mailto:abc@gmail.com" class="title">abc@gmail.com</a>
                </p>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Hướng Dẫn</h4>
                <ul class="menu-list">
                    <li><a href="#">Hướng dẫn đặt vé trên Web</a></li>
                    <li><a href="#">Hướng dẫn đặt vé trên App</a></li>
                    <li><a href="#">Hỏi Đáp</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Đi đến trang</h4>
                <ul class="menu-list">
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="lichtrinh.php">Lịch trình</a></li>
                    <li><a href="services.php">Liên Hệ</a></li>
                    <li><a href="register.php">Đăng Ký</a></li>
                    <li><a href="login.php">Đăng nhập</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Khác</h4>
                <ul class="menu-list">
                    <li><a href="#">Trở thành nhà cung cấp</a></li>
                    <li><a href="#">Cộng tác với chúng tôi</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                    <li><a href="#">Liên Kết Hữu Dụng</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; 2023 nhóm 2 Phát Triển Hệ Thống Web

                    - Thiết Kế: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">Nhóm
                        2</a><br>
                    Phát hành bởi: <a rel="nofollow noopener" href="https://themewagon.com" target="_blank">Nhóm
                        2</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>

<script language="text/Javascript">
cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
function clearField(t) { //declaring the array outside of the
    if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
    }
}
</script>

</body>

</html>