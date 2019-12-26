<?php $page           = $this->konfigurasi_model->menu_page();?>

  <div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>


  <div class="col-md-12" style="min-height:500px;">

<div class="error_404 card pt-md-3">
  <div class="card-body">
      <div class="row">
      <div class="col-md-12">
          <div class="row">
          <div class="col-md-6 text-center">
            <div class="text_404">404</div>
        </div>
        <div class="col-md-6">
            <p>Maaf Halaman Yang anda Cari tidak di temukan</p>
            <?php foreach ($page as $page) { ?>
                <li><a class="text-muted" href="<?php echo base_url('page/'.$page->slug_page) ?> "><?php echo $page->judul_page ?></a></li>
              <?php } ?>
            <p> Kembali ke <a href="<?php echo base_url()?>">Home</a>
        </div>
        </div>

        </div>
      </div>
    </div>

</div>

  </div><!-- /.col-lg-4 -->



</div>
