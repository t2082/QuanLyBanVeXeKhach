<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Cập Nhật Nhân Viên</title>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cập nhật</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Nhân Viên</li>
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
            <div class="col-8">
                <h2>Thêm nhân viên</h2>
                <form method="POST" action="themnhanvien.php">
                    <label for="ID">Email:</label>
                    <input type="text" id="ID" name="email" required>

                    <label for="ho_ten">Họ và tên:</label>
                    <input type="text" id="ho_ten" name="ho_ten" required>

                    <label for="so_dien_thoai">Số điện thoại:</label>
                    <input type="text" id="so_dien_thoai" name="so_dien_thoai" required>

                    <label for="dia_chi">Địa chỉ:</label>
                    <input type="text" id="dia_chi" name="dia_chi" required>

                    <label for="ngay_sinh">Ngày sinh:</label>
                    <input type="date" id="ngaysinh" name="ngaysinh" required>

                    <label for="can_cuoc">Căn cước công dân:</label>
                    <input type="text" id="can_cuoc" name="can_cuoc" required>

                    <div class="row">
                        <div class="col-6">
                            <label for="can_cuoc">Giới tính:</label>
                            <div class="form-check" name="gioitinh">
                                <input class="form-check-input" type="radio" name="gioitinh" value="Nam"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gioitinh" value="Nữ"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="can_cuoc">Phân Quyền:</label>
                            <select class="form-select" aria-label="Default select example" name="phanquyen">
                                <option selected>Phân Quyền</option>
                                <option value="1">Admin</option>
                                <option value="2">Nhân Viên</option>
                                <option value="3">Khách Hàng</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" class="mt-2" value="Thêm nhân viên">
                </form>
            </div>
            <div class="col-4 mt-3">
                <h2>Cập Nhật quyền</h2>
                <form method="POST" action="capnhatCS.php">
                    <label for="ID">email:</label>
                    <input type="text" id="ID" name="IDD" required>
                    <label for="can_cuoc">Phân Quyền:</label>
                    <select class="form-select" aria-label="Default select example" name="phanquyen">
                        <option selected>Phân Quyền</option>
                        <option value="1">Admin</option>
                        <option value="2">Nhân Viên</option>
                        <option value="3">Khách Hàng</option>
                    </select>
                    <input type="submit" class='mt-3'></input>

                </form>
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