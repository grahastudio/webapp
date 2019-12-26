<div class="container konten">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
</ul>
<div class="row">
      <?php foreach ($page as $page) { ?>
        <div class="col-lg-4">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h4><a href="<?php echo base_url('page/'.$page->slug_page)?>"><?php echo strip_tags(character_limiter($page->judul_page,50)) ?></a></h4>
                <div class="text-muted"><?php echo strip_tags(character_limiter($page->isi_page,40)) ?></div>

              </div>
            </div>
          </div>
          <?php } ?>

    <div class="pagination col-md-12 text-center">
      <?php if(isset($paginasi)) { echo $paginasi; } ?>
    </div>


  </div>
</div>
