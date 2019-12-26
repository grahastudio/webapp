
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
          <li class="breadcrumb-item active"><?php echo $title ?></li>
      </ul>
        <?php foreach ($berita as $berita) { ?>
          <div class="card">
            <div class="card-body">
            <div class="row">

              <div class="col-md-12">
                <h2><a href="<?php echo base_url('berita/'.$berita->slug_berita)?>"><?php echo strip_tags(character_limiter($berita->judul_berita,50)) ?></a></h2>

                      <p> <?php echo strip_tags(character_limiter($berita->isi_berita,140)) ?></p>
               </div>
              </div>
              <div class="post-meta">
                <span class="mr-md-5"><i class="fe fe-calendar"></i> <?php echo shortdate_indo($berita->tanggal_post) ?> </span>
                <span class="mr-md-5"><i class="fe fe-eye"></i> <?php echo $berita->berita_views ?> Kali dilihat</span>
                <span class="mr-md-5"><i class="fe fe-link"></i> <a href="<?php echo base_url('berita/'.$berita->slug_berita)?>">Selengkapnya</a></span>
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
