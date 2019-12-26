
  <div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
<div class="card p-md-3">
<div class="row">
  <div class="col-md-5">
    <?php echo $konfigurasi->map ?>
  </div>
  <div class="col-md-7">
 <p><h2><?php echo $konfigurasi->namaweb ?></h2>
    <i class="fe fe-home"></i> <?php echo nl2br($konfigurasi->alamat) ?>
    <br><i class="fe fe-phone"></i> <?php echo $konfigurasi->telepon ?>
    <br><i class="fe fe-mail"></i> <?php echo $konfigurasi->email ?>
    <br><i class="fe fe-globe"></i> <?php echo $konfigurasi->website ?>
  </p>
<hr>
Kirimkan Kritik dan Saran melalui Form di bawah ini.<br>
<?php

//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
//Error warning
echo validation_errors('<div class="alert alert-danger">','</div>');
echo form_open(base_url('kontak'));
?>
 <div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Nama <span class="text-danger">*</span></span></label>
      <input type="text" name="nama" placeholder="Nama" class="form-control">
    </div>
  </div>
    <div class="col-md-6">
     <div class="form-group">
      <label>Email <span class="text-danger">*</span></label>
      <input type="email" name="email" placeholder="Email" class="form-control">
     </div>
    </div>
    <div class="col-md-12">
     <div class="form-group">
      <label>Nomor Telepon/Hp <span class="text-danger">*</span></label>
      <input type="number" name="telepon" placeholder="Telepon" class="form-control">
     </div>
    </div>
    <div class="col-md-12">
     <div class="form-group">
      <label>Pesan <span class="text-danger">*</span></label>
      <textarea name="pesan" placeholder="Pesan Anda" class="form-control" ></textarea>
     </div>
     <div class="form-group">
       <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim">
     </div>
    </div>
</div>
<?php
//Form close
echo form_close();
 ?>
</div>
</div>
</div>
</div>
