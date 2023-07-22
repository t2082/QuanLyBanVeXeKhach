<?php

include("connect.php");
                if(isset($_POST["sb1"])){
                    
                    $sql="SELECT * FROM khachhang where email='".$_POST["email"]."' AND password='".md5($_POST["psw1"])."'";
                    $result1 = $conn->query($sql);
                  // print_r($result1);
                    if($result1->num_rows>0){
                        
                        $row = $result1->fetch_assoc();
                        
                        session_start();
                        $_SESSION["name"] = $row["HOTEN"];
                        $_SESSION["ngaysinh"]=$row["NAMSINH"];
                        $_SESSION["email"]=$row["EMAIL"];
                        $_SESSION["sdt"]=$row["SDT"];
                        $_SESSION["diachi"]=$row["DIACHI"];
                        $_SESSION["matkhau"]=$row["password"];
                        $_SESSION["nghenghiep"]=$row["NGHENHIEP"];
                   
                        header('Location: index.php');
                     
/*
                        echo $_SESSION["name"]."<br>==";
                        echo $_SESSION["ngaysinh"]."<br>==";
                        echo $_SESSION["sdt"];
                        
    */ 
                    }
                    else{
                 
                        echo '<script language="javascript">
                    alert("Nhập sai email hoặc mật khẩu.");
                    history.back();
                     </script>';
                      
                    }
                   
                    }
                
                ?>