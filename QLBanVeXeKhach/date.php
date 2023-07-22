
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanvexe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Lấy ngày hiện tại
$currentDate = date("Y-m-d");

// Lấy ngày đặt
$bookDate = isset($_POST['book_date']) ? $_POST['book_date'] : '';

// Kiểm tra nếu ngày hiện tại lớn hơn ngày đặt thì không cho đặt
if ($bookDate != '' && $currentDate > $bookDate) {
    echo "Không thể đặt vé cho ngày đã qua.";
} else {
    // Hiển thị ngày đi
    echo "<input type='date' id='book_date' name='book_date' min='$currentDate' required>";
}

$conn->close();
?>
