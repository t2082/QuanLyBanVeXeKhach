<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
    include("header.php");
?>
<!-- ============================================================== -->
<!-- ket thuc header -->
<!-- ============================================================== -->
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
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Trang Chủ</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Cập Nhật Khách Hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- CRUD Nguoi dung-->
    <div class="container capnhat">
        <div class="row m-3 form">
            <!--  sua / xoa nguoi dung   -->
            <div class="col-6">
                <div class="text-center m-3 text-primary">
                    <h3> Thông Tin Người Dùng</h3>
                </div>
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Họ Tên</label>
                        <input type="text" class="form-control" id="inputAddress" value="tenbientrencsdl">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" value="tenbientrencsdl">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Số Điện Thoại</label>
                        <input type="email" class="form-control" id="inputEmail4" value="tenbientrencsdl">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Địa Chỉ</label>
                        <input type="text" class="form-control" id="inputAddress" value="tenbientrencsdl">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress" value="tenbientrencsdl">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2"
                            placeholder="Apartment, studio, or floor">
                    </div>



                    <div class="col-6 mt-4">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                    <div class="col-6 mt-4">
                        <button type="submit" class="btn btn-primary">Xóa</button>
                    </div>
                </form>
            </div>
            <!-- ket thuc sua / xoa nguoi dung   -->


            <div class="col-1">
                <div class="edithr">
                    <hr>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ket thuc  them nguoi dung   -->
            <div class="col-5">
                <div class="text-center m-3 text-primary">
                    <h3> Tạo Người Dùng Mới Người Dùng</h3>
                </div>
                <form class="row g-3">

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Phân Quyền</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>


                    <div class="col-12 m-4">
                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                    </div>
                </form>
            </div>
            <!-- ket thuc  them nguoi dung   -->
        </div>
    </div>
    <!-- ket thuc CRUD   -->
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
<script src="assets/extra-libs/knob/jquery.knob.min.js"></script>
<script>
$(function() {
    $('[data-plugin="knob"]').knob();
});
</script>

</body>

</html>