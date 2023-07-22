<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
?>

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
                                <li class="breadcrumb-item text-muted active" aria-current="page">> Cập Nhật Xe
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- CAP NHAT XE-->

        <p class="mt-5 ml-4">THÊM XE VÀO HỆ THỐNG</p>
        <form action="xe.php" method="post" class="container m-3 d-flex">
            <div class="row">
                <div class="col-md-3">
                    <label for="BSX" class="form-label">Biển số xe: </label>
                    <input type="text" name="idxe" class="form-control" id="BSX" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">ID Loại xe: </label>
                    <?php
                    include('mucchonloaixe.php');
                    ?>
                </div>
                <div class="col-md-3">
                    <label for="tenXe" class="form-label">Tên xe: </label>
                    <input type="text" name="tenxe" class="form-control" id="tenXe" required>
                </div>
                <div class="col-md-3">
                    <br><br>
                    <button class="btn btn-success mx-auto" type="submit" name="action" value="themXe">Thêm xe</button>
                </div>
            </div>

        </form>

        <div class="container row mt-5">
            <form action="xe.php" method="post" class="col-md-6 p-4">
                <p>CHỈNH SỬA THÔNG TIN XE</p>
                <div>
                    <label for="BSX" class="form-label">Biển số xe: </label>
                    <input type="text" name="idxe" class="form-control" id="BSX" required>
                </div>
                <div>
                    <label class="form-label">ID Loại xe: </label>
                    <?php
                    include('mucchonloaixe.php');
                    ?>
                </div>
                <div>
                    <label for="validationCustom03" class="form-label">Tên xe: </label>
                    <input type="text" name="tenxe" class="form-control" required>
                </div>
                <div>
                    <button class="btn btn-primary mt-4" type="submit" name="action" value="suaXe">Xác nhận</button>
                </div>
            </form>
            <form action="xe.php" method="post" class="col-md-6 p-4">
                <p>XÓA XE</p>
                <div>
                    <label for="BSX" class="form-label">Biển số xe: </label>
                    <input type="text" name="idxe" class="form-control" id="BSX" required>
                </div>
                <div>
                    <button class="btn btn-primary mt-4" type="submit" name="action" value="xoaXe" onclick="alertDelete(event)">Xác nhận</button>
                </div>
            </form>
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

        function alertDelete(event){
            var result = confirm("Thao tác này sẽ xóa tất cả vị trí ghế trong xe và xóa luôn cả xe\n Bạn có chắc là muốn thực hiện nó ?");
            if (result == true) {

            } else {
                event.preventDefault();
            }
        }
    </script>

</body>

</html>