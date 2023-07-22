<!DOCTYPE html>
<html lang="en">
<?php
    include("header.php");
?>
<head>
    <title>Cập Nhật Tuyến Xe</title>
</head>
<body>


    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- dieu huong-->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cập Nhật </h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Cập Nhật Tuyến Xe
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- CAP NHAT TUYEN XE-->
        <div class="container capnhat">
            <div class="row m-4">
                <!--  sua / xoa nguoi dung   -->
                <form enctype="multipart/form-data" action="themtuyenxe.php" method="post" class="row g-3 needs-validation" required >


                    
                    <div class="col-md-4">
    <label for="IDT" class="form-label">ID_Tuyến</label>
    <?php
        // Kết nối đến cơ sở dữ liệu
        $conn = mysqli_connect("localhost", "root", "", "qlbanvexe");
        
        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối không thành công: " . mysqli_connect_error());
        }
        
        // Truy vấn để lấy ID_Tuyến tự động
        $sql = "SELECT MAX(ID_TUYEN) + 1 AS next_id FROM tuyenxe";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $next_id = "TX0" . $row['next_id'];
        
        // Đóng kết nối
        mysqli_close($conn);
    ?>
    <input type="text" name="idtuyen" class="form-control" id="IDT" value="<?php echo $next_id; ?>" required>
</div>

                    <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Mã bến đi</label>
                    <?php
              include('mucchonmabx.php');
              ?>

                    </div>
                    <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Mã bến đến</label>
                    <?php
              include('mucchonben_mabx.php');
              ?>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03"  class="form-label">Tên tuyến</label>
                        <input type="text" name="tentuyen" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên tuyến
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="validationCustom03"  class="form-label">Số ngày trong tuần chạy</label>
                        <input type="text" class="form-control" name="songaytrongtuanchay" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập số ngày
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Số chuyến trong ngày</label>
                        <input type="text" class="form-control" id="validationCustom03" name="sochuyentrongngay"  required>
                        <div class="invalid-feedback">
                            Vui lòng nhập số chuyến trong ngày
                        </div>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="validationCustom03"  class="form-label">Thời gian di chuyển trung bình</label>
                        <input type="text" class="form-control" name="thoigiandichuyentrungbinh" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập thời gian cụ thể
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="validationCustom03"  class="form-label">Quãng đường</label>
                        <input type="text" class="form-control" name="quangduong" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập quãng đường cụ thể
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="validationCustom03"  class="form-label">Giá Hiện Hành</label>
                        <input type="text" class="form-control" name="giahienhanh" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập giá cụ thể
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">



                        </div>
                    </div>
                    <div class="col-4">
                        <br></br>
                        <button class="btn btn-success" type="submit" name="action" value="themtuyenxe">Thêm tuyến xe</button>
                    </div>
                    <div class="col-4">
                        <br></br>
                        <button class="btn btn-primary" type="submit" name="action" value="suatuyenxe">Sửa tuyến xe</button>
                    </div>
                    <div class="col-4">
                        <br></br>
                        <button class="btn btn-danger" type="submit" name="action" value="xoatuyenxe">Xóa tuyến xe</button>
                    </div>
                </form>
                
                

            </div>
        </div>
        <!-- ket thuc  CAP NHAT NGUOI DUNG  -->
        <!-- ============================================================== -->

        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
        Hệ Thống Xe ABC <a href="CNTuyenxe.php">Nhóm 2 - PTHTW</a>.
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
    <script src="assets/extra-libs/knob/jquery.knob.min.js"></script>
    <script>
    $(function() {
        $('[data-plugin="knob"]').knob();
    });
    </script>

</body>

</html>