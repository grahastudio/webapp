<div class="container konten">
    <div class="row">
        <div class="col-md-8 post-detail">
          <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
                <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
              </a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ul>
          <div class="konten-download card">
            <div class="card-body">
                <h2><?php echo $title ?></h2>
                <div class="post-meta">
                  <span><i class="fa fa-calendar"></i> <?php echo shortdate_indo($download->tanggal_post) ?></span>
                  <span><i class="fa fa-user"></i> <?php echo $download->nama ?> </span>
                  <span><i class="fa fa-tag"></i> <?php echo $download->nama_kategori ?></span>
                  <span><i class="fa fa-eye"></i> <?php echo $download->download_views ?> Kali dilihat</span>
                </div>
                <?php echo $download->deskripsi ?>

                <?php if ($id_user): ?>

                <p><a class="btn btn-outline-primary" href="<?php echo $download->url_download ?>">Download</a></p>

                <?php else: ?>

                  <p><a class="btn btn-outline-primary" href="<?php echo base_url('login')?>">Download</a></p>

                   <?php endif ?>


                <div class="addthis_inline_share_toolbox"></div>
            </div>
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
</div>
</div>
