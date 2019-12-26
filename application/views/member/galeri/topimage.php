<div class="card">
    <div class="card-header">
                      <h3 class="card-title"><?php echo $title ?></h3>
                    </div>
  <div class="card-body">

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

 ?>


<?php foreach($galeri as $galeri) { ?>


<div class="row">
  <div class="col-md-5">
    <img src="<?php echo base_url('assets/upload/image/'.$galeri->gambar) ?>" class="img img-thumbnail img-fluid">
  </div>
  <div class="col-md-7">
      <h3><?php echo $galeri->judul_galeri ?></h3>
      <i class="fa fa-link"></i> <?php echo $galeri->website ?><br>
      <i class="fa fa-user"></i> <?php echo $galeri->nama ?><br>
      <i class="fa fa-calendar"></i> <?php echo $galeri->tanggal_post ?><br>
      <hr>
      <?php echo $galeri->isi_galeri ?>
    <a href="<?php echo base_url('member/galeri/ubahtopimage/' .$galeri->id_galeri) ?>" title="Edit Galeri" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
  </div>
</div>


<?php } ?>


</div>
</div>
