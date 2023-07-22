<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

session_start();
if(isset($_POST["sb"])){
    $sql=" UPDATE khachhang SET HOTEN='".$_POST["ten"]."',NAMSINH='".$_POST["ngaysinh"]."',
    GIOITINH='".$_POST["gioitinh"]."',SDT='".$_POST["sdt"]."',DIACHI='".$_POST["diachi"]."' WHERE email='".$_SESSION["email"]."'
    ";
    $result = $conn->query($sql);
    if( $result){
        echo '<script language="javascript">
        alert("đã lưu thông tin!");
        history.back();
         </script>';
    }
    else{
      echo '<script language="javascript">
      alert("Không Thể cập nhật!");
      history.back();
       </script>';
      
    }
    
    }


if(isset($_POST["sbpsw"])){
    $sql1 = "select * from khachhang
    where email = '".$_SESSION["email"]."' 
    and password = '".md5($_POST["psw2"])."'";
    $result = $conn->query($sql1);
      if($result->num_rows > 0){
          if($_POST["psw"]== $_POST["psw2"]){
              echo '<script language="javascript">
              alert("Mật khẩu cũ không được giống mật khẩu mới!");
              history.back();
               </script>';
          }
          elseif($_POST["psw"] != $_POST["psw1"]){
              echo '<script language="javascript">
              alert("Mật khẩu nhập lại không khớp!");
              history.back();
               </script>';
          }
          else{
              $sql=" UPDATE khachhang set password = ' ".md5($_POST["psw"])." ' 
              where email = '".$_SESSION["email"]." '";
            //  print_r($sql);
              $result1 = $conn->query($sql);
              echo '<script language="javascript">
              alert("Đổi mật khẩu thành công!");
              history.back();
               </script>';
          }
      }
      else
       
       echo '<script language="javascript">
       alert("Mật khẩu cũ không đúng!");
       history.back();
        </script>';
     }
                
                ?>