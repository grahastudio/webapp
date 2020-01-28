<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title"><?php echo $title ?></h3>
      <a href="<?php echo base_url('auth/download/tambah') ?>" class="btn btn-primary btn-round ml-auto">
        <i class="fa fa-plus"></i>
        Tambah Data Download
      </a>
    </div>
  </div>


  <?php
  //Notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success custom-alert">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }

  ?>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table card-table table-vcenter text-nowrap">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="20%">Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Views</th>
            <th>Tanggal</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1;
          foreach ($download as $download) { ?>

            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo strip_tags(character_limiter($download->judul_download, 50)) ?></td>
              <td><?php echo $download->nama_kategori ?></td>
              <td><?php echo $download->nama ?></td>
              <td><?php echo $download->download_views ?></td>
              <td><?php echo $download->tanggal_post ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href="<?php echo base_url('auth/download/edit/' . $download->id_download) ?>" title="Edit Download"><i class="far fa-edit"></i></a>

                <?php
                //link Delete
                include('delete.php');
                ?>
                <a href="<?php echo base_url('download/' . $download->slug_download) ?>" title="<?php echo $download->judul_download ?>" class="icon" target="_blank"><i class="fe fe-external-link text-success"></i> </a>

              </td>
            </tr>

          <?php $i++;
          } ?>








        </tbody>
      </table>
    </div>
  </div>
</div>