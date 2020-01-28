<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title; ?></h3>
  </div>
  <div class="card-body">

    <?php

    //Notifikasi
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success custom-alert">';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }
    //Error upload
    if (isset($error)) {
      echo '<div class="alert alert-danger">';
      echo $error;
      echo '</div>';
    }

    //Error warning
    echo validation_errors('<div class="alert alert-warning">', '</div>');
    //Error Upload Gabar
    if (isset($error_upload)) {
      echo '<div class="alert alert-warning">' . $errors_upload . '</div>';
    }


    //Atribut
    $attribut = '';
    // Form Open
    echo form_open_multipart(base_url('auth/konfigurasi/icon'), $attribut);
    ?>
    <input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
    <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Upload Icon Website</label><br>
          <input type="file" name="icon" required="required">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-lg" value="Upload Icon">
        </div>

      </div>

      <div class="col-md-3">
        <?php if ($konfigurasi->icon != "") { ?>
          <img class="img-thumbnail img-fluid" src="<?php echo base_url('assets/upload/image/' . $konfigurasi->icon) ?>" alt="<?php echo
                                                                                                                              $konfigurasi->namaweb ?>" width="100">
        <?php } else { ?>
          <p class="alert alert-warning text-center">Anda Belum Memiliki Icon</p>
        <?php } ?>
      </div>

    </div>

    <?php
    //Form Close
    echo form_close();
    ?>
  </div>
</div>