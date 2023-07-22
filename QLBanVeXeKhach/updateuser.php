<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "qlbanvexe";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
               
                if(isset($_POST["sb"])){
                    session_start();
                  $sql1="select*from khachhang where email='".$_SESSION["email"]."'";
                  
                  $result1 = $conn->query($sql1);
                    if($result1->num_rows>0){
                        $sql=" UPDATE khachhang SET HOTEN='".$_POST["ten"]."',NAMSINH='".$_POST["ngaysinh"]."',
                        GIOITINH='".$_POST["gioitinh"]."',SDT='".$_POST["sdt"]."',DIACHI='".$_POST["diachi"]."' WHERE email='".$_SESSION["email"]."'
                        ";
                        $result2 = $conn->query($sql);
                        //echo $sql."<br>";
                        
                        if( $result2){
                            echo '<script language="javascript">
                           alert("đã lưu thông tin!");
                            history.back();
                            exit();
                             </script>';
                        }
                     
                       }
                     
                       else{
                        echo 
                        '<script language="javascript">
                            alert("Không Thể Cập Nhật!");
                            history.back();
                            exit();
                             </script>';
                        
                       }
                        
                      
                        
                  }
                 
                    
                
                ?>