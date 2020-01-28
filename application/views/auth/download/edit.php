<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>

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
  echo form_open(base_url('auth/download/edit/' . $download->id_download), $attribut);
  ?>

  <div class="card-body">

    <div class="row">
      <div class="col-md-8">
        <div class="form-group form-group-lg">
          <label>Judul Download</label>
          <input type="text" name="judul_download" class="form-control" placeholder="Judul Download" value="<?php echo $download->judul_download ?>">
        </div>

        <div class="form-group">
          <label>Isi Download</label>
          <textarea name="deskripsi" class="form-control summernote" placeholder="Isi Download">
  <?php echo $download->deskripsi ?>
    </textarea>
        </div>

      </div>

      <div class="col-md-4">

        <div class="form-group form-group-lg">
          <label>Link Download</label>
          <input type="text" name="url_download" class="form-control" placeholder="Url Download" value="<?php echo $download->url_download ?>">
        </div>

        <div class="form-group">
          <label>Keyword </label>
          <input type="text" name="keywords" class="form-control" placeholder="Keywords Download" value="<?php echo $download->keywords ?>">
        </div>

        <div class="form-group form-group-lg">
          <label>Status Download</label>
          <select name="status_download" class="form-control custom-select">
            <option value="Publish">Publish</option>
            <option value="Draft" <?php if ($download->status_download == "Draft") {
                                    echo "selected";
                                  } ?>>Draft</option>
          </select>
        </div>

        <div class="form-group">
          <label>kategori Download</label>
          <select name="id_kategori" class="form-control custom-select">

            <?php foreach ($kategori as $kategori) { ?>
              <option value="<?php echo $kategori->id_kategori ?>" <?php if ($download->id_kategori == $kategori->id_kategori) {
                                                                      echo "selected";
                                                                    } ?>>
                <?php echo $kategori->nama_kategori ?>
              </option>
            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Download</button>
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