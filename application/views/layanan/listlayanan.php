<div class="container konten">
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
      <div class="row row-cards row-deck">

        <?php foreach ($layanan as $layanan) { ?>

              <div class="col-sm-6 col-xl-3">
                <div class="card">
                  <a href="<?php echo base_url('layanan/'.$layanan->slug_layanan)?>"><img class="card-img-top" src="<?php echo base_url('assets/upload/image/'.$layanan->gambar)?>" alt="<?php echo $layanan->judul_layanan ?>"></a>
                  <div class="card-body d-flex flex-column">
                    <h4><a href="<?php echo base_url('layanan/'.$layanan->slug_layanan)?>"><?php echo $layanan->judul_layanan ?></a></h4>
                    <div class="text-muted"><?php echo strip_tags(character_limiter($layanan->isi_layanan,90)) ?></div>
                    <div class="d-flex align-items-center pt-5 mt-auto">
                      <img class="avatar avatar-md mr-3" src="<?php echo base_url('assets/upload/image/'.$layanan->foto_user) ?>"></img>
                      <div>
                        <a href="<?php echo base_url()?>" class="text-default"><?php echo $layanan->nama?></a>
                        <small class="d-block text-muted"><i class="fe fe-calendar mr-1"></i> <?php echo shortdate_indo($layanan->tanggal_post) ?></small>
                      </div>
                      <div class="ml-auto text-muted">
                        <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>


            </div>

            <div class="row">
                  <div class="paginasi col-md-12 text-center">
                      <?php if(isset($paginasi)) { echo $paginasi; } ?>
                  </div>
            </div>

        </div>
