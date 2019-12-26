<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">Data Menu</h3>
     </div>

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
include('tambah.php');
 ?>

<br><hr>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th>Nama Menu</th>
  <th>Posisi</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php foreach($menu as $menu) { ?>
<tr>
  <td><?php echo $menu->nama_menu ?></td>
  <td><?php echo $menu->posisi ?></td>
  <td><?php
      //link Delete
      include('edit.php');
      ?>

      <?php
      //link Delete
      include('delete.php');
      ?>

  </td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
