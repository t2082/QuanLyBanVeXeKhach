<!DOCTYPE html>
<html lang="EN">
<title>Tra Cứu Hóa Đơn</title>
<?php
include("header.php");
?>

<!-- Biểu mẫu HTML -->
<div class="ohoadon container border"
    style="margin-top: 50px; margin-bottom: 50px; border-radius: 25px; background-color: lightgray;">
    <tiltle class="col" style="color: #EE6D4A;">
        <h4 style="font-weight: bold;">Tra Cứu Hóa Đơn</h4>
    </tiltle>
    <form method="post">
        <div class="form-group">
            <label for="ma_hoa_don">Mã hóa đơn:</label>
            <input type="text" class="form-control" id="ma_hoa_don" name="ma_hoa_don" placeholder="Nhập mã hóa đơn"
                required>
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Số điện thoại:</label>
            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai"
                placeholder="Nhập số điện thoại" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Tra Cứu</button>
        </div>
    </form>

    <!-- ocapcha -->

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <div class="g-recaptcha" data-sitekey="6LdQotckAAAAAL9Yc3rP0f7nmIAElEe5KQi_JW81"></div>


    <!-- Kết quả tìm kiếm -->
    <div class="search-results">

        <?php
    // Xử lý yêu cầu tìm kiếm và hiển thị kết quả
    if (isset($_POST['ma_hoa_don']) && isset($_POST['so_dien_thoai'])) {
      $ma_hoa_don = $_POST['ma_hoa_don'];
      $so_dien_thoai = $_POST['so_dien_thoai'];
      
      // Thực hiện truy vấn cơ sở dữ liệu để tìm kiếm hóa đơn
      // ...

      // Hiển thị kết quả tìm kiếm
      // ...
    }
  ?>
    </div>
</div>

<!-- footer-->
<?php
include("footer.php");
?>

</body>

</html>