<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title"><?php echo $title ?></h3>
      <a href="<?php echo base_url('auth/produk/tambah') ?>" class="btn btn-primary btn-round ml-auto">
        <i class="fa fa-plus"></i>
        Tambah Produk
      </a>
    </div>
  </div>

  <?php
  //Notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success bg-success">';
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
            <th width="20%">Nama Produk</th>
            <th>Kategori</th>
            <th>kode</th>
            <th>harga</th>
            <th>Status</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1;
          foreach ($produk as $produk) { ?>

            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo strip_tags(character_limiter($produk->nama_produk, 50)) ?></td>
              <td><?php echo $produk->nama_kategori ?></td>
              <td><?php echo $produk->kode_produk ?></td>
              <td>Rp. <?php echo number_format($produk->harga, '0', ',', '.') ?></td>
              <td><?php echo $produk->status_produk ?></td>
              <td><a class="btn btn-primary btn-sm" href="<?php echo base_url('auth/produk/edit/' . $produk->id_produk) ?>" title="Edit Produk"><i class="fas fa-edit"></i> Edit</a>

                <?php
                //link Delete
                include('delete.php');
                ?>
                <a href="<?php echo base_url('produk/' . $produk->slug_produk) ?>" title="<?php echo $produk->nama_produk ?>" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-link"></i> View</a>

              </td>
            </tr>

          <?php $i++;
          } ?>








        </tbody>
      </table>
    </div>
  </div>
</div>