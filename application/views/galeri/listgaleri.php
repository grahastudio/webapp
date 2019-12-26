<div class="container konten">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>





    <div class="row row-cards">
          <?php foreach ($galeri as $galeri) { ?>
                  <div class="col-sm-6 col-lg-4">
                    <div class="card p-3">
                      <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $galeri->id_galeri ?>" class="mb-3">
                        <img src="<?php echo base_url('assets/upload/image/'.$galeri->gambar)?>" alt="<?php echo $galeri->judul_galeri ?>" class="rounded">
                      </a>
                      <div class="d-flex align-items-center px-2">
                        <img class="avatar avatar-md mr-3" src="<?php echo base_url('assets/upload/image/'.$galeri->foto_user) ?>"></img>
                        <div>
                          <div><?php echo $galeri->nama?></div>
                          <small class="d-block text-muted"><i class="fe fe-calendar mr-1"></i> <?php echo shortdate_indo($galeri->tanggal_post) ?></small>
                        </div>
                        <div class="ml-auto text-muted">
                          <a href="javascript:void(0)" class="icon"><i class="fe fe-eye mr-1"></i> 112</a>

                        </div>
                      </div>


                      <div class="modal fade" id="exampleModal<?php echo $galeri->id_galeri ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title"><button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-window-close"></i> Tutup</button>
                              <a class="btn btn-primary" download="" href="<?php echo base_url('assets/upload/image/'.$galeri->gambar)?>"><i class="fa fa-download"></i> Download Gambar</a></h5>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$galeri->gambar)?>" alt="<?php echo $galeri->judul_galeri ?>">
                            </div>
                            <div class="modal-footer">

                            </div>
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
