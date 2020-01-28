<?php
$site_info      = $this->konfigurasi_model->get_all();
$page           = $this->konfigurasi_model->menu_page();
$layanan        = $this->konfigurasi_model->menu_layanan();
$menubawah2     = $this->konfigurasi_model->menu_bawah2();
$beritabawah     = $this->konfigurasi_model->berita_bottom();

?>





<footer class="footer_area">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="single_ftr">
          <h4 class="sf_title">Contacts</h4>
          <ul>
            <li>4080 Repperts Coaol Road Sackson, MS 00201 USA</li>
            <li>(+123) 685 78 455 <br> (+064) 336 987 245</li>
            <li>Contact@yourcompany.com</li>
          </ul>
        </div>
      </div> <!--  End Col -->

      <div class="col-md-3 col-sm-6">
        <div class="single_ftr">
          <h4 class="sf_title">Information</h4>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Delivery Information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div> <!--  End Col -->

      <div class="col-md-3 col-sm-6">
        <div class="single_ftr">
          <h4 class="sf_title">Services</h4>
          <ul>
            <li><a href="#">Returns</a></li>
            <li><a href="#">Site Map</a></li>
            <li><a href="#">Wish List</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Order History</a></li>
          </ul>
        </div>
      </div> <!--  End Col -->

      <div class="col-md-3 col-sm-6">
        <div class="single_ftr">
          <h4 class="sf_title">Newsletter</h4>
          <div class="newsletter_form">
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
            </p>
            <form method="post" class="form-inline">
              <input name="EMAIL" id="email" placeholder="Enter Your Email" class="form-control" type="email">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div> <!--  End Col -->

    </div>
  </div>


  <div class="ftr_btm_area">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 pull-left">
          <div class="ftr_social_icon">
            <ul>
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#"><i class="fab fa-google"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <p class="copyright_text text-center">Copyright &copy; 2019 All Rights Reserved Bootstrap 4
            footer</p>
        </div>

        <div class="col-sm-4">
          <div class="payment_mthd_icon">
            <ul>
              <li><i class="fab fa-cc-paypal"></i></li>
              <li><i class="fab fa-cc-visa"></i></li>
              <li><i class="fab fa-cc-discover"></i></li>
              <li><i class="fab fa-cc-mastercard"></i></li>
              <li><i class="fab fa-cc-amex"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<!--   Core JS Files V3   -->
<script src="<?php echo base_url('assets/template/v3/js/jquery.3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/plugin/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/plugin/jquery.scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/plugin/datatables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/plugin/bootstrap-toggle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/js/grahastudio.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/js/particles-dots.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/js/particles.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/v3/js/section-slider.js'); ?>"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139907811-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-139907811-1');
</script>
</body>

</html>