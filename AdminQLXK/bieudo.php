<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
    include("header.php");
?>
<!-- ============================================================== -->

<head>
    <title>Thống kê</title>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Thống Kê</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Thống kê</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <?php
                include('tktuyen.php');
                ?>
            </div>

            <div class="col-lg-6">
                <?php
                include('tkdoanhthu_khach.php');
                ?>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<footer class="footer text-center text-muted">
    Hệ Thống Xe ABC <a href="#">Nhóm 2 - PTHTW</a>.
</footer>
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