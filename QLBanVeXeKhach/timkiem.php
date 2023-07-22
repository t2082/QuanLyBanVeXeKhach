<!DOCTYPE html>
<html lang="EN">
<title>Tìm kiếm</title>
<!-- footer--><?php
include("header.php");
echo"<section class=\"container tuyenxe\">";
include("connect.php");
       ?>
<!-- Tim kiem tuyen-->
<div class="row timtuyen  ">
    <div class="col-6 ">
        <form class="d-flex" action="timkiem.php" method="POST">
            <input name="tentinh" list="tinhdau" class="form-control me-2" type="text" placeholder="Tìm Điểm Đi">
            <datalist id="tinhdau">
                <option value="An Giang">
                <option value="Cà Mau">
                <option value="Cần Thơ">
                <option value="Hậu Giang">
                <option value="Kiên Giang">
                <option value="Hồ Chí Minh">
                <option value="Sóc Trăng">
            </datalist>
            <input class="btn" type="submit" name="sbdau" value="Tìm"></input>
        </form>
        <!-- Tim kiem tuyen diem dau-->

    </div>
    <div class="col-6">
        <form class="d-flex" action="timkiem.php" method="POST">
            <input name="tinhcuoi" list="tinhcuoi" class="form-control me-2" type="text" placeholder="Tìm Điểm Đi">
            <datalist id="tinhcuoi">
                <option value="An Giang">
                <option value="Cà Mau">
                <option value="Cần Thơ">
                <option value="Hậu Giang">
                <option value="Kiên Giang">
                <option value="Hồ Chí Minh">
                <option value="Sóc Trăng">
            </datalist>
            <input class="btn" type="submit" name="sbcuoi" value="Tìm"></input>
        </form>
        <!-- Tim kiem tuyen diem dau-->
    </div>
</div>
<!-- KT Tim kiem tuyen -->

<?php
      //  <!-- bang tuyen xe -->
          if(isset($_POST["sbdau"])){
            echo" 
            <div class=\"bangtuyenxe\">
            <table class=\"table table-striped\" border-collapse=\"collapse\">
                <thead>
                    <tr lass=\"table-light\">
                        <th scope=\"col\">Tuyến Xe</th>
                        <th scope=\"col\">Quãng Đương</th>
                        <th scope=\"col\">Thời Gian đi</th>
                        <th scope=\"col\" colspan=\"2\">Giờ Chạy</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
            ";
             $tinh=$_POST["tentinh"];
            $sql1= "SELECT tentinh,matinh FROM tinhthanh where tentinh like '$tinh'";
             $result1 = $conn->query($sql1);
             while($row = $result1->fetch_array()) {
                 echo "<th scope=\"row\" colspan=\"6\" class=\"table-danger\">$row[0]</th>
                 </tr>
                 ";
                 $sql = "SELECT tentuyen,quangduong,tgdichuyentb FROM tuyenxe,benxe,tinhthanh,quanhuyen
                 WHERE tinhthanh.MATINH = quanhuyen.MATINH
                 AND benxe.MABX = tuyenxe.MABX 
                 AND quanhuyen.MAQUANHUYEN = benxe.MAQUANHUYEN 
                 AND tinhthanh.MATINH= '$row[1]'";
                 $result = $conn->query($sql);
                 $result_all = $result -> fetch_all();
               
               foreach ($result_all as $row) {
                 echo"
             <tr class=\"table-light\">
                     <td>".$row[0]."</td>
                     <td>".$row[1]." Km</td>
                     <td>".$row[2]." Giờ</td>
                     <td><a href=\"#\" class=\"text-decoration-none\">Chi tiết <i class=\"fa-solid fa-circle-info\"></i></a> </td>
                     <td><a href=\"#\" class=\"text-danger>
                             <i class=\"fa-solid fa-ticket-simple\"></i> Đặt Vé
                         </a></td>
                         </tr>
             ";
               }
               }
               echo"
               
               </table>
               </div>
               ";
          }
          
        //  <!-- Tim kiem tuyen diem cuoi-->
          if(isset($_POST["sbcuoi"])){
            echo" 
            <div class=\"bangtuyenxe\">
            <table class=\"table table-striped\" border-collapse=\"collapse\">
                <thead>
                    <tr lass=\"table-light\">
                        <th scope=\"col\">Tuyến Xe</th>
                        <th scope=\"col\">Quãng Đương</th>
                        <th scope=\"col\">Thời Gian đi</th>
                        <th scope=\"col\" colspan=\"2\">Giờ Chạy</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
            ";
             $tinh=$_POST["tinhcuoi"];
            $sql1= "SELECT tentinh,matinh FROM tinhthanh where tentinh like '$tinh'";
             $result1 = $conn->query($sql1);
             while($row = $result1->fetch_array()) {
                 echo "<th scope=\"row\" colspan=\"6\" class=\"table-danger\">$row[0]</th>
                 </tr>
                 ";
                 $sql = "SELECT tentuyen,quangduong,tgdichuyentb FROM tuyenxe,benxe,tinhthanh,quanhuyen 
                 WHERE tinhthanh.MATINH = quanhuyen.MATINH
                 AND benxe.MABX = tuyenxe.Ben_MABX 
                 AND quanhuyen.MAQUANHUYEN = benxe.MAQUANHUYEN 
                 AND tinhthanh.MATINH = '$row[1]'";
                 $result = $conn->query($sql);
                 $result_all = $result -> fetch_all();
               
               foreach ($result_all as $row) {
                 echo"
             <tr class=\"table-light\">
                     <td>".$row[0]."</td>
                     <td>".$row[1]." Km</td>
                     <td>".$row[2]." Giờ</td>
                     <td><a href=\"#\" class=\"text-decoration-none\">Chi tiết <i class=\"fa-solid fa-circle-info\"></i></a> </td>
                     <td><a href=\"#\" class=\"text-danger>
                             <i class=\"fa-solid fa-ticket-simple\"></i> Đặt Vé
                         </a></td>
                         </tr>
             ";
               }
               }
               echo"
               
               </table>
               </div>
               ";
          }

        ?>

</section>
<!-- footer-->
<?php
include("footer.php");
?>

</body>

</html>