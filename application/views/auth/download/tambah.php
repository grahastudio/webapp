<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>
  <?php
  //Error warning
  echo validation_errors('<div class="alert alert-warning">', '</div>');
  //Error Upload Gabar
  if (isset($error_upload)) {
    echo '<div class="alert alert-warning">' . $error_upload . '</div>';
  }


  // Form Open
  echo form_open_multipart(base_url('auth/download/tambah'));
  ?>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group form-group-lg">
          <label>Judul Download</label>
          <input type="text" name="judul_download" class="form-control" placeholder="Judul Download" value="<?php echo set_value('judul_download') ?>">
        </div>

        <div class="form-group">
          <label>Deskripsi Download</label>
          <textarea name="deskripsi" class="form-control summernote" placeholder="Deskripsi Download">
  <?php echo set_value('deskripsi') ?>
    </textarea>
        </div>



      </div>

      <div class="col-md-4">


        <div class="form-group form-group-lg">
          <label>Link Download</label>
          <input type="text" name="url_download" class="form-control" placeholder="Link Download" value="<?php echo set_value('url_download') ?>">
        </div>

        <div class="form-group">
          <label>Keywords</label>
          <input type="text" name="keywords" class="form-control" placeholder="Keywords Download">
        </div>

        <div class="form-group form-group-lg">
          <label>Status Download</label>
          <select name="status_download" class="form-control custom-select">
            <option value="Publish">Publish</option>
            <option value="Draft">Draft</option>
          </select>
        </div>

        <div class="form-group">
          <label>kategori</label>
          <select name="id_kategori" class="form-control custom-select">
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori as $kategori) { ?>
              <option value="<?php echo $kategori->id_kategori ?>">
                <?php echo $kategori->nama_kategori ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fe fe-save"></i> Simpan Download</button>
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