<?php
include("connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Trang cá nhân</title>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/htqlxe.css">
    <link rel="stylesheet" href="assets/css/owl.css">


</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <ul class="left-info">
                            <li><a href="mailto:abc@gmail.com"><i class="fa-solid fa-envelope"></i>abc@gmail.com </a>
                            </li>
                            <li><a href="tel:090-080-0760"><i class="fa fa-phone"></i>090-080-0760</a></li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="right-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h4 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold  mr-1"><i
                                class="fas fa-user-circle"></i>
                    </h4>
                    </span> <?php echo $_SESSION["name"] ?>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-right">

                <a href="dangxuat.php" class=" text-dark">
                    Đăng xuất
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Tài Khoản Của Tôi</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 310px">
                        <div class="nav-item dropdown">
                            <a href="#" class="text-dark" data-toggle="dropdown">Hồ sơ <i
                                    class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="user.php" class="dropdown-item text-dark">Thông tin cá nhân</a>
                                <a href="doimk.php" class="dropdown-item text-dark">Đổi Mật Khẩu</a>
                            </div>
                        </div>
                        <a href="hoadon.php" class="nav-item text-dark">Đơn Mua</a>
                        <a href="" class="nav-item text-dark">Thông Báo</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">

                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <a href="lichtrinh.php" class="nav-item nav-link text-dark">Lịch Trình</a>
                            <a href="services.php" class="nav-item nav-link text-dark">Liên hệ</a>
                            <a href="hoadon.php" class="nav-item nav-link text-dark">Hóa đơn</a>

                        </div>

                    </div>
                </nav>
                <!-- hien thi thong tin nguoi dung-->

                <div class="container">
                    <form action="updateuser.php" method="POST" class="formuser">
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
                                    <label for="exampleFormControlInput1" class="form-label">Địa Chỉ</label>
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

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gioitinh"
                                            id="flexRadioDefault1" value="nam">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gioitinh"
                                            id="flexRadioDefault2" checked value="nu">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Nữ
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!----->
                        <!-- Button trigger modal -->
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" name="sb">
                            Gửi
                        </button>



                    </form>
                </div>

                <!-- ket thuc hien thi thong tin nguoi dung-->

            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Footer Start -->
    <?php
    include("footer.php")
    ?>
</body>

</html>