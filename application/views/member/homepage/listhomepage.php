
<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

 ?>

 <a href="<?php echo base_url('member/galeri/topimage') ?>" title="Tambah Galeri baru" class="btn btn-primary"><i class="fa fa-image"></i> Ubah Top Image</a>
 <hr>


<div class="card">
  <div class="card-header">
                  <h3 class="card-title">Data Home Page</h3>
                  <div class="card-options">
                  <a href="<?php echo base_url('member/homepage/tambah') ?>" title="Tambah Berita baru" class="btn btn-outline-primary"><i class="fe fe-plus"></i> Tambah Baru</a>
                </div>
                </div>
<div class="table-responsive">
<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Gambar</th>
  <th width="15%">Judul Homepage</th>
  <th>Posisi</th>
  <th>Website</th>
  <th>Penulis</th>
  <th>Tanggal</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>


<?php $i=1; foreach($homepage as $homepage) { ?>



<tr>
  <td><?php echo $i ?></td>
  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$homepage->gambar) ?>" width="60"
    class="img img-thumbnail"></td>
  <td><?php echo $homepage->judul_homepage ?></td>
  <td><?php echo $homepage->posisi ?></td>
  <td><?php echo $homepage->url ?></td>
  <td><?php echo $homepage->nama ?></td>
  <td><?php echo $homepage->tanggal_post ?></td>
  <td><a href="<?php echo base_url('member/homepage/edit/' .$homepage->id_homepage) ?>" title="Edit Homepage" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

      <?php
      //link Delete
      include('delete.php');
      ?>

  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>



<div class="card">
  <div class="card-header">
                  <h3 class="card-title">Data Section</h3>
                  <div class="card-options">
                  <a href="<?php echo base_url('member/homepage/tambah_section') ?>" title="Tambah Berita baru" class="btn btn-outline-primary"><i class="fe fe-plus"></i> Tambah Baru</a>
                </div>
                </div>
<div class="table-responsive">
<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
<thead>
<tr>
  <th width="5%">No</th>
  <th>Icon</th>
  <th width="15%">Judul Homepage</th>
  <th>Posisi</th>
  <th>Website</th>
  <th>Penulis</th>
  <th>Tanggal</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>


<?php $i=1; foreach($section as $section) { ?>



<tr>
  <td><?php echo $i ?></td>
  <td><i class="<?php echo $section->icon ?>"></i></td>
  <td><?php echo $section->judul_homepage ?></td>
  <td><?php echo $section->posisi ?></td>
  <td><?php echo $section->url ?></td>
  <td><?php echo $section->nama ?></td>
  <td><?php echo $section->tanggal_post ?></td>
  <td><a href="<?php echo base_url('member/homepage/editsection/' .$section->id_homepage) ?>" title="Edit Homepage" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>

      <?php
      //link Delete
      include('delete.php');
      ?>

  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>




</div>
