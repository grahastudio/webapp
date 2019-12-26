<h4 class="cat-judul text-center"><?php echo $title ?></h4>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
          <li class="breadcrumb-item active"><?php echo $title ?></li>
      </ul>
        <?php foreach ($berita as $berita) { ?>
          <div class="post">
            <div class="row">
              <div class="col-md-4 list-property-img-frame">
                    <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="<?php echo $berita->judul_berita ?>">
              </div>
              <div class="col-md-7">
                <h2><a href="<?php echo base_url('berita/'.$berita->slug_berita)?>"><?php echo strip_tags(character_limiter($berita->judul_berita,50)) ?></a></h2>

                      <p> <?php echo strip_tags(character_limiter($berita->isi_berita,140)) ?></p>
               </div>
              </div>
              <div class="post-meta">
                <span><i class="fa fa-calendar"></i> <?php echo shortdate_indo($berita->tanggal_post) ?> </span>
                <span><i class="fa fa-eye"></i> <?php echo $berita->berita_views ?> Kali dilihat</span>
                <span><i class="fa fa-link"></i> <a href="<?php echo base_url('berita/'.$berita->slug_berita)?>">Selengkapnya</a></span>
              </div>
          </div>
        <?php } ?>
        <div class="paginasi col-md-12 text-center">
          <?php if(isset($paginasi)) { echo $paginasi; } ?>
        </div>
    </div>
    <div class="col-md-4 sidebar">
      <div class="sidebar-konten">
        <h3 class="sidebar-title">Berita Terbaru</h3>
          <?php foreach($get_all as $get_all) { ?>
            <ul>
              <li>
                <img src="<?php echo base_url('assets/upload/image/'.$get_all->gambar)?>" alt="<?php echo $get_all->judul_berita ?>" class="img-fluid">
                <a href="<?php echo base_url('berita/'.$get_all->slug_berita) ?>"> <?php echo strip_tags(character_limiter($get_all->judul_berita, 50)) ?> </a>
                <br><i class="fa fa-calendar"></i> <?php echo date_indo($get_all->tanggal_post) ?>
              </li>
            </ul>
          <?php } ?>
        </div>
      <div class="sidebar-konten">
        <h3 class="sidebar-title">Berita Terpopuler</h3>
          <?php foreach($popularpost as $popularpost) { ?>
            <ul>
              <li>
                <img src="<?php echo base_url('assets/upload/image/'.$popularpost->gambar)?>" alt="<?php echo $popularpost->judul_berita ?>" class="img-fluid">
                <a href="<?php echo base_url('berita/'.$popularpost->slug_berita) ?>"> <?php echo strip_tags(character_limiter($popularpost->judul_berita, 50)) ?> </a>
                <br><i class="fa fa-eye"></i> <?php echo $popularpost->berita_views ?> Kali dilihat
              </li>
            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
</div>
