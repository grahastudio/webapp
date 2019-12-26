<div class="card">
  <div class="card-header">
      <h3 class="card-title"><?php echo $title;?></h3>
  </div>
      <div class="card-body">

            <?php

            //Notifikasi
            if($this->session->flashdata('sukses'))
            {
              echo '<div class="alert alert-success">';
              echo $this->session->flashdata('sukses');
              echo '</div>';
            }
            //Error warning
            echo validation_errors('<div class="alert alert-warning">','</div>');
            //Error Upload Gabar
            if(isset($error_upload)){
              echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
            }


            //Atribut
            $attribut = '';
            // Form Open
            echo form_open_multipart(base_url('member/konfigurasi'),$attribut);
            ?>
<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">

<div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label>Nama Perusahaan / Organisasi</label>
    <input type="text" name="namaweb" class="form-control" placeholder="Nama Web" value="<?php
    echo $konfigurasi->namaweb ?>">
  </div>

  <div class="form-group">
    <label>Tagline Perusahaan / Organisasi</label>
    <input type="text" name="tagline" class="form-control" placeholder="Tagline Web" value="<?php
    echo $konfigurasi->tagline ?>">
  </div>

  <div class="form-group">
    <label>Website</label>
    <input type="url" name="website" class="form-control" placeholder="Website Perusahaan" value="<?php
    echo $konfigurasi->website ?>">
  </div>

  <div class="form-group">
    <label>Email Perusahaan / Organisasi</label>
    <input type="email" name="email" class="form-control" placeholder="Email Perusahaan" value="<?php
    echo $konfigurasi->email ?>">
  </div>

  <div class="form-group">
    <label>Telepon Perusahaan / Organisasi</label>
    <input type="text" name="telepon" class="form-control" placeholder="Telepon Perusahaan" value="<?php
    echo $konfigurasi->telepon ?>">
  </div>

  <div class="form-group">
    <label>Alamat Perusahaan</label>
    <textarea name="alamat" class="form-control" placeholder="Alamat Perusahaan"><?php
    echo $konfigurasi->alamat ?></textarea>
  </div>

  <div class="form-group">
    <label>Deskripsi Website</label>
    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Perusahaan"><?php
    echo $konfigurasi->deskripsi ?></textarea>
  </div>

  <div class="form-group">
    <label>Keywords Website</label>
    <input type="text" name="instagram" class="form-control" placeholder="Instagram Perusahaan" value="<?php
    echo $konfigurasi->keywords ?>">
  </div>

</div>



<div class="col-md-6">
<div class="row">

  <div class="col-md-6">
    <div class="form-group">
      <label>Facebook Url</label>
      <input type="url" name="facebook" class="form-control" placeholder="Facebook Perusahaan" value="<?php
      echo $konfigurasi->facebook ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Instagram</label>
      <input type="url" name="instagram" class="form-control" placeholder="Instagram Perusahaan" value="<?php
      echo $konfigurasi->instagram ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Twitter</label>
      <input type="url" name="twitter" class="form-control" placeholder="twitter Perusahaan" value="<?php
      echo $konfigurasi->twitter ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Youtube Channel</label>
      <input type="url" name="youtube" class="form-control" placeholder="Youtube Perusahaan" value="<?php
      echo $konfigurasi->twitter ?>">
    </div>
  </div>


<div class="col-md-12">
  <div class="form-group">
    <label>Google Webmaster <span class="text-danger">* Teks Ini Jangan Di Rubah ya..</span></label>
    <textarea name="metatext" class="form-control" placeholder="Google Meta" ><?php
    echo $konfigurasi->metatext ?></textarea>
  </div>

  <div class="form-group">
    <label>Bing Webmaster <span class="text-danger">* Teks Ini juga Jangan Di Rubah ya..</span></label>
    <textarea name="bingmeta" class="form-control" placeholder="Bing Meta" ><?php
    echo $konfigurasi->bingmeta ?></textarea>
  </div>

  <div class="form-group">
    <label>Google Maps</label>
    <textarea name="map" class="form-control" placeholder="Google Map"><?php
    echo $konfigurasi->map ?></textarea>
  </div>
  </div>

  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary btn-lg" value="Simpan Konfigurasi">
  </div>



</div>
</div>

<?php
//Form Close
echo form_close();
?>

</div>
</div>
