<div class="container konten">
  <div class="row">
    <div class="col-md-8">
      <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
          <li class="breadcrumb-item active"><?php echo $title ?></li>
      </ul>
        <?php foreach ($download as $download) { ?>
          <div class="card">
            <div class="card-body">
            <div class="row">

              <div class="col-md-12">
                <h2><a href="<?php echo base_url('download/'.$download->slug_download)?>"><?php echo strip_tags(character_limiter($download->judul_download,50)) ?></a></h2>

                      <p> <?php echo strip_tags(character_limiter($download->deskripsi,140)) ?></p>
               </div>
              </div>
              <div class="post-meta">
                <span class="mr-md-5"><i class="fe fe-calendar"></i> <?php echo shortdate_indo($download->tanggal_post) ?> </span>
                <span class="mr-md-5"><i class="fe fe-eye"></i> <?php echo $download->download_views ?> Kali dilihat</span>
                <span class="mr-md-5"><i class="fe fe-link"></i> <a href="<?php echo base_url('download/'.$download->slug_download)?>">Selengkapnya</a></span>
              </div>
            </div>


          </div>
        <?php } ?>
        <div class="paginasi col-md-12 text-center">
          <?php if(isset($paginasi)) { echo $paginasi; } ?>
        </div>
    </div>
    <div class="col-md-4 sidebar mt-md-8">
      <div class="sidebar-konten card">
        <div class="card-header">
        <h3 class="card-title">Download Terbaru</h3>
      </div>
          <?php foreach($get_all as $get_all) { ?>
            <ul>
              <li>
                <a href="<?php echo base_url('download/'.$get_all->slug_download) ?>"> <?php echo strip_tags(character_limiter($get_all->judul_download, 50)) ?> </a>
                <br><small class="d-block text-muted"><i class="fe fe-calendar"></i> <?php echo date_indo($get_all->tanggal_post) ?>  </small> 
              </li>
            </ul>
          <?php } ?>
        </div>
      <div class="sidebar-konten card">
        <div class="card-header">
        <h3 class="card-title">Populer Download</h3>
      </div>
          
            <ul>
                <?php foreach($populardownload as $populardownload) { ?>
              <li>
                <h4></h3><a href="<?php echo base_url('download/'.$populardownload->slug_download) ?>"> <?php echo strip_tags(character_limiter($populardownload->judul_download, 50)) ?> </a></h3>
                <br><small class="d-block text-muted"> <i class="fe fe-calendar "></i> <?php echo date_indo($get_all->tanggal_post) ?>   <i class="fe fe-eye ml-md-5"></i> <?php echo $populardownload->download_views ?> Hits</small>
              </li>
              <?php } ?>
            </ul>
          
        </div>
      </div>
    </div>
</div>
