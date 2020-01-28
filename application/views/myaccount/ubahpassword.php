<div class="container my-md-5">
  <div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">

      <div class="col-lg-3 col-xl-3">
        <?php include('menumyaccount.php'); ?>
      </div>

      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">

            <div class="text-wrap p-lg-6">
              <h2 class="mt-0 mb-4">Ubah Password</h2>

              <?php //Notifikasi
              if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success custom-alert">';
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }
              //Error warning
              echo validation_errors('<div class="alert alert-danger custom-alert">', '</div>');
              ?>
              <?php

              //Atribut
              $attribut = 'class="alert alert-link"';
              // Form Open
              echo form_open_multipart(base_url('myaccount/ubah_password'));
              ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Masukan Password Baru</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
                  </div>
                </div>


              </div>

              <?php
              //form Close
              echo form_close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>