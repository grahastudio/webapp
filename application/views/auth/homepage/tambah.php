<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>
  <div class="card-body">

    <?php
    //Error warning
    echo validation_errors('<div class="alert alert-warning">', '</div>');
    //Error Upload Gabar
    if (isset($error_upload)) {
      echo '<div class="alert alert-warning">' . $errors_upload . '</div>';
    }


    //Atribut
    $attribut = '';
    // Form Open
    echo form_open_multipart(base_url('auth/homepage/tambah'), $attribut);
    ?>

    <div class="row">
      <div class="col-md-8">
        <div class="row">

          <div class="col-md-12">
            <div class="form-group form-group-lg">
              <label>Judul Homepage</label>
              <input type="text" name="judul_homepage" class="form-control" placeholder="Judul Homepage" value="<?php echo set_value('judul_homepage') ?>">
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group form-group-lg">
              <label>Posisi Homepage</label>
              <select name="posisi" class="form-control form-control-chosen">
                <option value="Slider">Slider</option>
                <option value="Welcome">Welcome</option>
              </select>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group">
              <label>Link / URL Homepage</label>
              <input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
                                                                                                                base_url() ?>">
            </div>
          </div>

        </div>
      </div>


      <div class="col-md-4">
        <div class="form-group">
          <label>Upload Gambar</label>
          <input type="file" name="gambar" class="form-control" style="border:0;" required>
        </div>
      </div>

    </div>

    <div class="row">



      <div class="col-md-12">
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="isi_homepage" class="form-control tinymce" placeholder="Isi Homepage">
  <?php echo set_value('isi_homepage') ?>
      </textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Homepage</button>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <?php
    //Form close
    echo form_close();
    ?>

  </div>
</div>