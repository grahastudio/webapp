<div class="container">
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-4">
        <img class="img img-thumbnail img-responsive" src="<?php echo base_url('assets/upload/image/'.$layanan->gambar)?>" alt="<?php echo $title ?>">
      </div>
      <div class="col-lg-8">
        <h2><?php echo $layanan->judul_layanan ?></h2>
        <?php echo $layanan->isi_layanan ?>
      </div>
    </div>
</div>
</div>
</div>
