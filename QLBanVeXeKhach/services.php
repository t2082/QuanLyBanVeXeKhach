<!DOCTYPE html>
<html lang="EN">

<?php
include("header.php");
include("connect.php");
?>

<!-- Banner Ends Here 

    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Request a call back right now ?</h4>
            <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
          </div>
          <div class="col-md-4">
            <a href="contact.html" class="border-button">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

-->
<!-- Liên hệ -->
<main>
    <div class="container contact-container">
        <h1 class="title mt-4">Liên hệ</h1>
        <p class="title-desc">Cảm ơn bạn đã ghé thăm website. Nếu bạn muốn nhận được thông tin từ chúng tôi dễ dàng, hãy
            điền vào form dưới đây.</p>
        <div id="body-contact" class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-ms-12 form-horizontal">
                <form action="/action_page.php" class="was-validated">
                    <div class="mb-3">
                        <label for="name" class="Field-Title">Họ và tên *</label> <input type="text" id="name"
                            placeholder="Nhập họ tên" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="Field-Title">Số điện thoại *</label> <input type="text" id="phone"
                            placeholder="Nhập số điện thoại di động" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email *</label> <input type="email"
                            class="form-control" id="exampleFormControlInput1" placeholder="Nhập email" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="Field-Title">Tiêu đề *</label> <input type="text" id="title"
                            placeholder="Nhập tiêu đề" value="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nội dung *</label> <textarea
                            class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Nhập nội dung"
                            required></textarea>
                    </div>
                    <div id="send-mail-captcha-element" class="g-recaptcha"></div>
                    <div class="btn-container">
                        <button type="submit" class="btn btn-block btn-success btn-flat submit-btn"><i
                                class="fa fa-check icon-flat icon-bg-success"></i>Gửi</button>
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-ms-12">
                </form>
                <!-- map -->
                <div id="maps">
                    <div class="span11">
                        <div id="map" style="height: 320px">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.631800027042!2d105.78268031476514!3d10.047211192818812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a82498fca3%3A0x80a461d79b6585a0!2zVHLhuqduIFF1YW5nIEto4bqjaSwgQ8OhaSBLaOG6vywgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1677471749651!5m2!1svi!2s"
                                width="100%" height="320px" style="border:0;" frameborder="0"
                                allowfullscreen="allowfullscreen" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                <!-- info -->
                <div id="contact-info">
                    <h2 class="title">Công ty cổ phần xe khách ABC</h2>
                    <p>
                        <a href="https://www.google.com/maps/search/?api=1&amp;query=Địa chỉ:Trần Quang Khải, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ"
                            target="_blank" class="address">Địa chỉ: 102abc, Trần Quang Khải, P.Cái Khế, Q.Ninh Kiều,
                            TP.Cần Thơ</a>
                    </p>
                    <p>
                        Điện thoại:
                        <a href="tel:090-080-0760" class="title">090-080-0760</a>
                    </p>
                    <p>
                        Email:
                        <a href="mailto:abc@gmail.com" class="title">abc@gmail.com</a>
                    </p>
                    <p class="hotline">
                        Tổng đài đặt vé:
                        <span><a href="tel:1900 2082" class="title">1900 2082</a></span>
                    </p>
                </div>
            </div>
</main>
<!-- end lien he -->


<div class="partners">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-partners owl-carousel">

                    <div class="partner-item">
                        <img src="assets/images/CanTho.jpg" title="1" alt="1">
                    </div>

                    <div class="partner-item">
                        <img src="assets/images/CaMau.jpg" title="2" alt="2">
                    </div>

                    <div class="partner-item">
                        <img src="assets/images/DaNang.jpg" title="3" alt="3">
                    </div>

                    <div class="partner-item">
                        <img src="assets/images/NhaTrang.jpg" title="4" alt="4">
                    </div>

                    <div class="partner-item">
                        <img src="assets/images/SaiGon.jpg" title="5" alt="5">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<!-- footer-->
<!-- footer--><?php
include("footer.php");

?>

</body>

</html>