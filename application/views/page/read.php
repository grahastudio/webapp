<div class="container konten">
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?php echo $title ?></h3>
    </div>
      <div class="card-body">
        <div class="post-detail">
          <div class="konten-page">
            <?php echo $page->isi_page ?>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
