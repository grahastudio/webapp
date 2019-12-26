<div class="card">
  <div class="card-header">
                  <h3 class="card-title"><?php echo $title ?></h3>
                  <div class="card-options">
                  <a href="<?php echo base_url('member/produk/tambah') ?>" title="Tambah Produk baru" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
                </div>
                </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
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
  <th width="20%">Nama Produk</th>
  <th>Kategori</th>
  <th>kode</th>
  <th>harga</th>
  <th>Status</th>
  <th width="15%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($produk as $produk) { ?>

<tr>
  <td><?php echo $i ?></td>
  <td><?php echo strip_tags(character_limiter($produk->nama_produk,50)) ?></td>
  <td><?php echo $produk->nama_kategori ?></td>
  <td><?php echo $produk->kode_produk ?></td>
  <td>Rp. <?php echo number_format($produk->harga,'0',',','.') ?></td>
  <td><?php echo $produk->status_produk ?></td>
  <td><a class="icon" href="<?php echo base_url('member/produk/edit/' .$produk->id_produk) ?>" title="Edit Produk"><i class="fe fe-edit-3 text-primary mr-md-3"></i></a>

      <?php
      //link Delete
      include('delete.php');
      ?>
      <a href="<?php echo base_url('produk/' .$produk->slug_produk) ?>" title="<?php echo $produk->nama_produk ?>" class="icon" target="_blank"><i class="fe fe-external-link text-success"></i> </a>

  </td>
</tr>

<?php $i++; } ?>








</tbody>
</table>
</div>
</div>
