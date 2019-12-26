
<div class="container">
<div class="row">


  <div class="col-sm-6 col-lg-3">
                        <div class="card p-3">
                          <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-blue mr-3">
                              <i class="fe fe-users"></i>
                            </span>
                            <div>
                              <h4 class="m-0"><a href="#"><?php echo count($user) ?> <small>Member</small></a></h4>
                              <small class="text-muted">163 registered today</small>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 col-lg-3">
                                            <div class="card p-3">
                                              <div class="d-flex align-items-center">
                                                <span class="stamp stamp-md bg-green mr-3">
                                                  <i class="fe fe-mail"></i>
                                                </span>
                                                <div>
                                                  <h4 class="m-0"><a href="#"><?php echo count($kontak) ?> <small>Pesan Masuk</small></a></h4>
                                                  <small class="text-muted">163 registered today</small>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-sm-6 col-lg-3">
                                                                <div class="card p-3">
                                                                  <div class="d-flex align-items-center">
                                                                    <span class="stamp stamp-md bg-red mr-3">
                                                                      <i class="fe fe-download-cloud"></i>
                                                                    </span>
                                                                    <div>
                                                                      <h4 class="m-0"><a href="#"><?php echo count($download) ?> <small>Data Download</small></a></h4>
                                                                      <small class="text-muted">163 registered today</small>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>

                                                              <div class="col-sm-6 col-lg-3">
                                                                                    <div class="card p-3">
                                                                                      <div class="d-flex align-items-center">
                                                                                        <span class="stamp stamp-md bg-yellow mr-3">
                                                                                          <i class="fe fe-image"></i>
                                                                                        </span>
                                                                                        <div>
                                                                                          <h4 class="m-0"><a href="#"><?php echo count($galeri) ?> <small>Galery</small></a></h4>
                                                                                          <small class="text-muted">163 registered today</small>
                                                                                        </div>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>




</div>

<div class="tile">
  App Version 1.0
</div>

<div class="row">


  <div class="col-md-7">
    <div class="card">
      <div class="card-header">
                    <h3 class="card-title">Data Download Terbaru</h3>
                  </div>

      <div class="table-responsive">
      <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
      <thead>
      <tr>
        <th>Download</th>
        <th width="27%"></th>
      </tr>
      </thead>
      <tbody>

      <?php foreach($download as $download) { ?>

      <tr>

        <td>
          <?php echo $download->judul_download ?><br>
          <div class="small text-muted"><i class="fe fe-bar-chart"></i> <?php echo $download->download_views ?> Views <span><i class="fe fe-calendar"></i> <?php echo $download->tanggal_post ?>
          </span></div>
        </td>
        <td><a href="<?php echo base_url('member/berita/edit/' .$download->id_download) ?>" title="Edit" class=""><i class="fe fe-edit-3 text-primary mr-md-3"></i></a>
          <a href="<?php echo base_url('berita/' .$download->slug_download) ?>" title="Lihat" class=""><i class="fe fe-eye text-success mr-md-3"></i></a>

        </td>
      </tr>

      <?php } ?>

      </tbody>
      </table>
      </div>

    </div>
  </div>

  <div class="col-md-5">
    <div class="card">

      <div class="card-header">
                    <h3 class="card-title">Pesan Masuk</h3>
                  </div>
      <div class="table-responsive">
      <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
      <thead>
      <tr>
          <th>Nama</th>
        <th>Tanggal Pesan</th>
        <th width="17%">Aksi</th>
      </tr>
      </thead>
      <tbody>

      <?php foreach($kontak as $kontak) { ?>

      <tr>
          <td><i class="fe fe-user"></i> <?php echo $kontak->nama ?>

            <?php if($kontak->status_read == 0) {
              echo '<span class="badge badge-danger">';
              echo "New";
              echo '</span>';
            }else {
              // echo '<span class="badge badge-success">';
              // echo "Ok";
              // echo '</span>';
            } ?>


          </td>
        <td><i class="fe fe-calendar"></i> <?php echo shortdate_indo($kontak->tanggal_post) ?></td>
        <td><a href="<?php echo base_url('member/kontak/lihat/' .$kontak->id_kontak) ?>" title="Edit Berita" class=""><i class="fe fe-eye text-primary mr-md-3"></i></a>
        </td>
      </tr>

      <?php } ?>

      </tbody>
      </table>
      </div>
    </div>
  </div>



</div>
</div>
