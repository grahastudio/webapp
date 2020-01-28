<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">Data Pengunjung</h3>
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

<hr>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Ip Address</th>
  <th>Tanggal</th>
  <th>Total Kunjungan</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($pengunjung as $pengunjung) { ?>

<tr>
  <td><?php echo $i ?></td>
  <td><?php echo $pengunjung->ip_address ?></td>
  <td><?php echo $pengunjung->date ?></td>
  <td><?php echo $pengunjung->total ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
