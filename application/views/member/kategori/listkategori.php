<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//include Tambah

 ?>

<div class="card">
   <div class="card-header">
     <h3 class="card-title"><?php echo $title ?></h3>
     <div class="card-options">
        <?php include('tambah.php');?>
     </div>
   </div>
   
<div class="table-responsive">
<table class="table card-table table-vcenter text-nowrap datatable">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Nama Kategori</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori as $kategori) { ?>
<tr>
  <td><?php echo $i ?></td>
  <td><?php echo $kategori->nama_kategori ?></td>
  <td><?php
      //link Delete
      include('edit.php');
      ?>

      <?php
      //link Delete
      include('delete.php');
      ?>

<a href="<?php echo base_url('berita/kategori/' .$kategori->slug_kategori) ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat</a>

  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
