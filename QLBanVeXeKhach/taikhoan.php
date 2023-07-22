<!DOCTYPE html>
<html lang="EN">

<!-- footer--><?php
include("header.php");

?>
 <title>Đăng nhập - Đăng ký</title>
<!-- tai khoan Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Đăng Ký / Đăng Nhập</span></h2>
    </div>

    <div class="row px-xl-5">
        <!-- dag ky-->
        <div class="col-lg-5 mb-5">
            <section class="dangky">
                <div class="row">
                    <div class="col-6">
                        <form class="row g-3 formdangky" action="dangky.php" method="POST">
                            <h2>Đăng Ký</h2>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Họ
                                    và
                                    tên<span class="error"></span> </label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Tên" name="ten">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Email<span class="error">*</span> </label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Tên"
                                    name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Mật
                                    khẩu<span class="error">*</span></label>
                                <input type="password" class="form-control" id="Mật khẩu" name="psw">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Nhập
                                    lại mật khẩu<span class="error">*</span></label>
                                <input type="password" class="form-control" id="Nhập lại" name="psw1">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNumberl4" class="form-label">Số
                                    điện thoại<span class="error"></span></label>
                                <input type="text" class="form-control" id="inputNumberl4" name="sdt">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNumberl4" class="form-label">CCCD<span class="error"></span></label>
                                <input type="text" class="form-control" id="inputNumberl4" name="cccd">
                            </div>

                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Ngày
                                    sinh<span class="error"></span></label>
                                <input type="date" class="form-control" id="inputdate" name="ngaysinh">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Giới
                                    tính</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault2"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="inputtext4" class="form-label">Địa
                                    chỉ<span class="error"></span></label>
                                <input type="text" class="form-control" id="Nhập lại" name="diachi">
                            </div>
                            <input type="submit" class="mt-2" name="sb" value="Đăng ký">
                        </form>

                    </div>
                </div>
            </section>
        </div>
        <!-- ket thuc dk-->
        <div class="col-lg-2 mb-5">
            <div id="hredit">
                <hr>
            </div>
        </div>
        <!-- dag ky-->
        <div class="col-lg-5 mb-5">
            <section class="dangky">
                <div class="row">
                    <div class="col-6">
                        <form class="row g-3 formdangky" action="dangnhap.php" method="POST">
                            <h2>Đăng Nhập</h2>
                            <div class="col-md-12">
                                <label for="inputNumberl4" class="form-label">Email<span class="error">*</span></label>
                                <input type="text" class="form-control" id="inputNumberl" name="email">
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label">Mật
                                    khẩu<span class="error">*</span></label>
                                <input type="password" class="form-control" id="MatKhau" name="psw1">
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label dieukhoansd" for="gridCheck">
                                        <b> <a href="doimk.php">Bạn Quên Mật Khẩu?</a> </b>
                                    </label>
                                </div>
                            </div>
                            <input type="submit" name="sb1" value="Đăng Nhập">
                        </form>

                    </div>
                </div>
            </section>
        </div>
        <!-- ket thuc dk-->
    </div>
</div>
<!-- tai khoan End -->
<!-- footer--><?php
include("footer.php");

?>

</body>

</html>