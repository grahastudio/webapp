<div class="container">
    <div class="row">
        <div class="col-md-8 post-detail">
          <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
                <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
              </a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ul>
          <div class="konten-berita card">
           <img src="<?php echo base_url('assets/upload/image/'.$berita->gambar)?>" alt="<?php echo $berita->judul_berita ?>" class="img-fluid">
            <div class="card-body">
                <h2><?php echo $title ?></h2>
                <div class="post-meta">
                  <span><i class="fa fa-calendar"></i> <?php echo shortdate_indo($berita->tanggal_post) ?></span>
                  <span><i class="fa fa-user"></i> <?php echo $berita->nama ?> </span>
                  <span><i class="fa fa-tag"></i> <?php echo $berita->nama_kategori ?></span>
                  <span><i class="fa fa-eye"></i> <?php echo $berita->berita_views ?> Kali dilihat</span>
                </div>
                <p><?php echo $berita->isi_berita ?></p>
                <div class="addthis_inline_share_toolbox"></div>
            </div>
        </div>
      </div>
        <div class="col-md-4 sidebar mt-md-8">
          <div class="sidebar-konten card">
            <div class="card-header">
            <h3 class="card-title">Berita Terbaru</h3>
          </div>
          <?php foreach($get_all as $get_all) { ?>
          <ul>
            <li>
              <a href="<?php echo base_url('berita/'.$get_all->slug_berita) ?>"> <?php echo strip_tags(character_limiter($get_all->judul_berita, 50)) ?> </a>
              <br><i class="fa fa-calendar"></i> <?php echo date_indo($get_all->tanggal_post) ?>
            </li>
          </ul>
          <?php } ?>
          </div>
          <div class="sidebar-konten card">
            <div class="card-header">
            <h3 class="card-title">Berita Populer</h3>
          </div>
          <?php foreach($popularpost as $popularpost) { ?>
          <ul>
            <li>
              <a href="<?php echo base_url('berita/'.$popularpost->slug_berita) ?>"> <?php echo strip_tags(character_limiter($popularpost->judul_berita, 50)) ?> </a>
              <br><i class="fa fa-eye"></i> <?php echo $popularpost->berita_views ?> Kali dilihat
            </li>
          </ul>
          <?php } ?>
        </div>
      </div>
</div>
</div>
