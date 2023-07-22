<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/Logo-icon.png">


    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <img src="" alt="">
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <h4>ABC Bus &emsp; &emsp;<img src="https://img.icons8.com/dusk/64/null/bus--v1.png" />
                                </h4>
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings" class="svg-icon"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="user.php">Chỉnh Sửa cá nhân</a>
                                <a class="dropdown-item" href="doimk.php">Đổi Mật Khẩu</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <!-- anh dai dien -->
                                <img src="assets/images/profile.jpg" alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Xin chào</span> <span
                                        class="text-dark"> <?php echo $_SESSION["name"]; ?></span> <i
                                        data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="user.php"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Trang cá nhân</a>
                                <a class="dropdown-item" href="/QLBanVeXeKhach/index.php"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Trang Chủ hệ thống</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="dangxuat.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Đăng Xuất</a>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="indexnv.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu"> Chung</span></li>


                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu"> Người Dùng </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><span class="hide-menu"> Nhân
                                            Viên
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="capnhatuser.php" class="sidebar-link"><span
                                            class="hide-menu"> Khách
                                            Hàng
                                        </span></a>
                                </li>

                            </ul>
                        </li>
            
                    </ul>
                </nav>
                <!-- ket thuc nav -->
                <!-- ============================================================== -->
            </div>
        </aside>

        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- dieu huong-->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Danh Sách Khách Hàng</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Trang Chủ</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Khách Hàng</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Họ Tên</th>
                                                <th>Email</th>
                                                <th>Địa Chỉ</th>
                                                <th>Giới Tính</th>
                                                <th>Tuổi</th>
                                                <th>Số lần đặt vé</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
                    
                    $sql="SELECT * FROM khachhang ";

                    $result1 = $conn->query($sql);
                  // print_r($result1);
                 
                while( $row = $result1->fetch_assoc() ){
                    $birthday = $row["NAMSINH"]; 
                    $today = date('Y-m-d'); 
                    $diff = date_diff(date_create($birthday), date_create($today)); 
                    // so lan mua;
                    $solanmua= "SELECT COUNT(maphieu)  AS tongve  FROM
                    khachhang ,phieudatve WHERE khachhang.email=phieudatve.email
                    and khachhang.email= '".$row["EMAIL"]."'" ;
                    $result = mysqli_query($conn, $solanmua);
                    $tong=$result->fetch_assoc();
                   
                    
                    echo"
                    <tr>
                        <td>".$row["HOTEN"]."</td>
                        <td>".$row["EMAIL"]."</td>
                        <td>".$row["DIACHI"]."</td>
                        <td>".$row["GIOITINH"]."</td>
                        <td>".$diff->format('%y')."</td>
                        <td>".$tong["tongve"]."</td>
                </tr>
                    ";
                }

                $tongkh= "SELECT COUNT(EMAIL) AS TONGKH FROM khachhang";
                $result = mysqli_query($conn, $tongkh);
                $tong1= $result->fetch_assoc();
                    echo"
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng số khách hàng: ".$tong1["TONGKH"]."</th>
                                        ";
?>
                                            </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                Hệ Thống Xe ABC <a href="#">Nhóm 2 - PTHTW</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
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