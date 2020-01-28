<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
    <div class="card-options">
      <a href="<?php echo base_url('auth/berita/tambah') ?>" title="Tambah Berita baru" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Berita</a>
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

  <div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
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
        foreach ($berita as $berita) { ?>

          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo strip_tags(character_limiter($berita->judul_berita, 50)) ?></td>
            <td><?php echo $berita->nama_kategori ?></td>
            <td><?php echo $berita->nama ?></td>
            <td><?php echo $berita->berita_views ?></td>
            <td><?php echo $berita->tanggal_post ?></td>
            <td><a class="icon" href="<?php echo base_url('auth/berita/edit/' . $berita->id_berita) ?>" title="Edit Berita"><i class="fe fe-edit-3 text-primary mr-md-3"></i></a>

              <?php
              //link Delete
              include('delete.php');
              ?>
              <a href="<?php echo base_url('berita/' . $berita->slug_berita) ?>" title="<?php echo $berita->judul_berita ?>" class="icon" target="_blank"><i class="fe fe-external-link text-success"></i> </a>

            </td>
          </tr>

        <?php $i++;
        } ?>








      </tbody>
    </table>
  </div>
</div>