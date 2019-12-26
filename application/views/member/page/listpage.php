<div class="card">
  <div class="card-header">
                  <h3 class="card-title"><?php echo $title?></h3>
                  <div class="card-options">
                  <a href="<?php echo base_url('member/page/tambah') ?>" title="Tambah Berita baru" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Halaman</a>
                </div>
                </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}


//Error warning
echo validation_errors('<div class="alert alert-warning custom-alert">','</div>');
//include Tambah
 ?>



<div class="table-responsive">
<table class="table card-table table-vcenter text-nowrap datatable">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Judul Halaman</th>
  <th>Isi</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($page as $page) { ?>
<tr>
  <td><?php echo $i ?></td>
  <td><?php echo $page->judul_page ?></td>
  <td><?php echo strip_tags(character_limiter($page->isi_page,50)) ?></td>
  <td><a href="<?php echo base_url('member/page/edit/' .$page->id_page) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

      <?php
      //link Delete
      include('delete.php');
      ?>
<a href="<?php echo base_url('page/'.$page->slug_page) ?>" title="<?php echo $page->judul_page ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
