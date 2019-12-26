

<?php
$site_info      = $this->konfigurasi_model->get_all();
$page           = $this->konfigurasi_model->menu_page();
$layanan        = $this->konfigurasi_model->menu_layanan();
$menubawah2     = $this->konfigurasi_model->menu_bawah2();
$beritabawah     = $this->konfigurasi_model->berita_bottom();

 ?>






</div> <!-- Container -->
<!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>assets/admin/js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
      <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/dataTables.bootstrap.min.js"></script>

      
      <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/chosen.jquery.min.js"></script>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

      <script type="text/javascript">
      $('.datatable').DataTable({
    order: [[0, 'desc']],
});
    </script>
      <script>
          window.setTimeout(function() {
            //$(".custom-alert").alert('close'); <--- Do not use this

            $(".custom-alert").slideUp(500, function() {
                $(this).remove();
            });
          }, 3000);

          $('.form-control-chosen').chosen({
          });

        </script>

  <!-- TinyMce -->
  <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

  <script>
  tinymce.init({
  selector: '.tinymce',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});

  </script>




<footer class="footer">
  <div class="container">
    <div class="row align-items-center flex-row-reverse">
      <div class="col-12 mt-3 mt-lg-0 text-center">
          Copyright © 2019 <a href="<?php echo base_url() ?>"><?php echo $title ?></a>. All rights reserved.
      </div>
    </div>
  </div>
</footer>

<script>
  require(['jquery'], function () {
    $(document).ready(function () {

      function setCookie(name,value,days) {
        var expires = "";
        if (days) {
          var date = new Date();
          date.setTime(date.getTime() + (days*24*60*60*1000));
          expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
      }

      function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
          var c = ca[i];
          while (c.charAt(0)==' ') c = c.substring(1,c.length);
          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
      }

      if (!getCookie('bottombar-hidden')) {
        $('.js-bottombar').show();
      }

      $('.js-bottombar-close').on('click', function (e) {
        $('.js-bottombar').hide();
        setCookie('bottombar-hidden', 1, 7);

        e.preventDefault();
        return false;
      });
    });
  });
</script>



<script>
  require(['datatables', 'jquery'], function(datatable, $) {
        $('.datatable').DataTable();
      });
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139907811-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139907811-1');
</script>


</body>
</html>
