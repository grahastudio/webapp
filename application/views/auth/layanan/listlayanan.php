<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title"><?php echo $title ?></h3>
      <a href="<?php echo base_url('auth/layanan/tambah') ?>" class="btn btn-primary btn-round ml-auto">
        <i class="fa fa-plus"></i>
        Tambah Layanan
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
            <th>Gambar</th>
            <th>Nama Layanan</th>
            <th>Status</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>


          <?php $i = 1;
          foreach ($layanan as $layanan) { ?>



            <tr>
              <td><?php echo $i ?></td>
              <td><img src="<?php echo base_url('assets/upload/image/thumbs/' . $layanan->gambar) ?>" width="60" class="img img-thumbnail"></td>
              <td><?php echo $layanan->judul_layanan ?></td>
              <td><?php echo $layanan->status_layanan ?></td>
              <td><?php echo $layanan->nama ?></td>
              <td><?php echo $layanan->tanggal_post ?></td>
              <td><a href="<?php echo base_url('auth/layanan/edit/' . $layanan->id_layanan) ?>" title="Edit Layanan" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

                <?php
                //link Delete
                include('delete.php');
                ?>

                <a href="<?php echo base_url('layanan/' . $layanan->slug_layanan) ?>" title="<?php echo $layanan->judul_layanan ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat</a>

              </td>
            </tr>

          <?php $i++;
          } ?>

        </tbody>

      </table>
    </div>
  </div>
</div>