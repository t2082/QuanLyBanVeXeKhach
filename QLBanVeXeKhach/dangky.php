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
                    //echo $_POST["sdt"]."<br>";
                    $sql1="SELECT * FROM khachhang where email='".$_POST["email"]."' ";
                    $result1= $conn->query($sql1);
                    if(mysqli_num_rows($result1)>0){
                        echo '<script language="javascript">
                    alert("Email đã được đăng ký!");
                    history.back();
                     </script>';
                    
                    }
                    else{
                   
                    $date = date_create($_POST["ngaysinh"]);
                    $sql2="INSERT INTO khachhang(email,sdt,password,hoten,cccd,gioitinh,namsinh,diachi) 
                    values('".$_POST["email"]."','".$_POST["sdt"]."','".md5($_POST["psw"])."',
                    '".$_POST["ten"]."','".$_POST["cccd"]."','".$_POST["gioitinh"]."','".$date ->format('Y-m-d') ."','".$_POST["diachi"]."') ";
                    //echo $result2."<br>";
                    $result2 = $conn->query($sql2);

                    $sql="SELECT * FROM khachhang where email='".$_POST["email"]."' ";
                    $result1 = $conn->query($sql);
                    //echo $sql."<br>";
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
                   
                      //  header('Location: index.php');
                   }
                   else{
                       echo"Lỗi không thể đăng ký";
                     
                   }
                    }
                }
                ?>