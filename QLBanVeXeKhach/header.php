<!DOCTYPE html>
<html lang="en">
<?php

include("connect.php");

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/htqlxe.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>



    <!-- Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        <li><a href="mailto:abc@gmail.com"><i class="fa-solid fa-envelope"></i>abc@gmail.com </a></li>
                        <li><a href="tel:090-080-0760"><i class="fa fa-phone"></i>090-080-0760</a></li>
                        <?php
        session_start();
  if (isset($_SESSION['email'])) {
    echo '
    <li><a href="user.php"><i class="fa-solid fa-user"></i>Trang cá nhân</a></li>
    ';
 }
 else{
    echo'
    <li><a href="taikhoan.php"><i class="fa-solid fa-right-to-bracket"></i>Đăng Nhập</a></li> ';
 }
                        ?>

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>

    </div>

    <header>
        
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Hệ thống xe abc</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lichtrinh.php">Lịch Trình</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hoadon.php">Hóa Đơn</a>
                        </li>
                        <?php
  if (isset($_SESSION['email'])) {
    echo '
    <div class="navbar-nav ml-auto py-0">
         <a href="dangxuat.php" class="nav-item nav-link">Đăng Xuất </a>
     </div>
    ';

 }
 else{
    echo'<li class="nav-item ">
    <a class="nav-link" href="taikhoan.php">Đăng ký </a>
</li>';
 }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active banner">
                <img src="assets/images/banner.png" class="d-block w-100" alt="ảnh banner">
            </div>

        </div>
    </div>


</body>


</html>