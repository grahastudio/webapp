<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title"><?php echo $title ?></h3>
      <a href="<?php echo base_url('auth/galeri/tambah') ?>" class="btn btn-primary btn-round ml-auto">
        <i class="fa fa-plus"></i> Tambah Galeri
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
            <th width="15%">Judul Galeri</th>
            <th>Posisi</th>
            <th>Url</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>


          <?php $i = 1;
          foreach ($galeri as $galeri) { ?>



            <tr>
              <td><?php echo $i ?></td>
              <td><img src="<?php echo base_url('assets/upload/image/thumbs/' . $galeri->gambar) ?>" width="60" class="img img-thumbnail"></td>
              <td><?php echo $galeri->judul_galeri ?></td>
              <td><?php echo $galeri->posisi_galeri ?></td>
              <td><?php echo $galeri->website ?></td>
              <td><?php echo $galeri->nama ?></td>
              <td><?php echo $galeri->tanggal_post ?></td>
              <td><a href="<?php echo base_url('auth/galeri/edit/' . $galeri->id_galeri) ?>" title="Edit Galeri" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

                <?php
                //link Delete
                include('delete.php');
                ?>

              </td>
            </tr>

          <?php $i++;
          } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>