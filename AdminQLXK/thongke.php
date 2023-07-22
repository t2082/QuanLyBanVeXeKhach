<html>

<head>
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
$_SESSION['ngaybd']=date('Y-m-d', strtotime('-1 month'));
$_SESSION['ngaykt']= date('Y-m-d');

//echo $_SESSION['ngaybd']."<br>";
//echo $_SESSION['ngaykt']."<br>";
                if(isset($_POST["kt"])){
                    $_SESSION['ngaybd']=$_POST["tgbd"];
                    $_SESSION['ngaykt']=$_POST["kt"];
                }
        
               header("location: index.php");
//============================================
                    
                ?>