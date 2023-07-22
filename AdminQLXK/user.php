<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Trang Cá Nhân</title>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Trang cá nhân</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
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
    <div class="container">
        <form action="updatemk.php" method="POST" class="formuser">
            <h2>Thông tin tài khoản</h2>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2"
                            value="<?php echo $_SESSION["name"] ?>" name="ten">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Số điện thoại </label>
                        <input type="text" class="form-control" id="exampleFormControlInput3"
                            value="<?php echo $_SESSION["sdt"] ?>" name="sdt">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            value="<?php echo $_SESSION["diachi"] ?>" name="diachi">
                    </div>

                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email
                            <br>
                            <?php echo $_SESSION["email"]?>
                        </label>

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" id="exampleFormControlInput4"
                            value="<?php echo $_SESSION["ngaysinh"]?>" name="ngaysinh">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Giới tính</label>

                        <div class="form-check" name="gioitinh">
                            <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault1"
                                value="nam">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault2" checked
                                value="nu">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                        </div>

                    </div>


                </div>
            </div>
            <!----->
            <!-- Button trigger modal -->
            <input type="submit" name="sb" value="cập nhật">
        </form>
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