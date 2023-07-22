<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang quản lý thống kê</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="openbtn" onclick="openNav()">☰</button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="admin_manager.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Về trang ABC</a>
          </li>
        </ul>
      </div>
      <a class="navbar-brand" href="#">
        Tên đăng nhập
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
      </a>
    </div>
  </nav>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="text-center mt-3">
      <img src="https://via.placeholder.com/150" alt="Hình ảnh">
      <p>Tên tài khoản</p>
      <p>Thông tin</p>
    </div>
    <hr>
    
    <h5>Cài đặt:</h5>
    <ul>
      <li><a href="#">Cài đặt tài khoản</a></li>
      <li><a href="#">Đăng xuất</a></li>
    </ul>
    

  </div>
  <div id="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Trang quản lý thống kê</h1>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
        <p>Số lượng chuyến xe:</p>
            
            <p>Doanh thu theo khách:</p>
            <p>Doanh thu theo tuyến:</p>
            
            
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'chuyenxe')">Số lượng chuyến xe</button>
                <button class="tablinks" onclick="openTable(event, 'doanhthukhach')">Doanh thu theo khách</button>
                <button class="tablinks" onclick="openTable(event, 'doanhthuthang')">Doanh thu theo tháng</button>
            </div>

            <div id="chuyenxe" class="tabcontent">
                <h3>Số lượng chuyến xe</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Trạng thái</th>
                            <th>Tổng chuyến xe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tháng 1</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Tháng 2</td>
                            <td>20</td>
                            <td>120</td>
                        </tr>
                        <tr>
                            <td>Tháng 3</td>
                            <td>30</td>
                            <td>150</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="doanhthukhach" class="tabcontent">
                <h3>Doanh thu theo khách</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Số khách</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tháng 1</td>
                            <td>50</td>
                            <td>$500</td>
                        </tr>
                        <tr>
                            <td>Tháng 2</td>
                            <td>70</td>
                            <td>$700</td>
                        </tr>
                        <tr>
                            <td>Tháng 3</td>
                            <td>90</td>
                            <td>$900</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="doanhthuthang" class="tabcontent">
                <h3>Doanh thu theo tháng</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Doanh thu trong tháng</th>
                            <th>Tổng doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tháng 1</td>
                            <td>$1,000</td>
                        <td>$10,000</td>
                    </tr>
                    <tr>
                        <td>Tháng 2</td>
                        <td>$2,000</td>
                        <td>$12,000</td>
                    </tr>
                    <tr>
                        <td>Tháng 3</td>
                        <td>$3,000</td>
                        <td>$15,000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        
        </div>
        <div class="col-md-3">
          <h2>Phương thức thống kê</h2>
          
          <!-- --------------------------------------Chức năng------------------------------------- -->
          

          
            <p>Bộ lọc: </p>
            <p>Số lượng chuyến trong ngày</p>
            <p>Số lượng trong tuần</p>
            <p>Số lượng trong tháng</p>
            <p>Số lượng trong năm</p>


        </div>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/9d63b403ea.js" crossorigin="anonymous"></script>
  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.getElementById("navbarSupportedContent").style.marginLeft = "250px";
      
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.getElementById("navbarSupportedContent").style.marginLeft = "0";
    }

    function openTable(evt, tableName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tableName).style.display = "block";
        evt.currentTarget.className += " active";
    }
  </script>
</body>
</html>