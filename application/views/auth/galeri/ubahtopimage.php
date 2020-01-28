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
    echo form_open_multipart(base_url('auth/galeri/ubahtopimage/' . $galeri->id_galeri), $attribut);
    ?>



    <div class="row">

      <div class="col-md-8">
        <div class="form-group form-group-lg">
          <label>Judul Galeri</label>
          <input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri" value="<?php echo $galeri->judul_galeri ?>" required>
        </div>

        <input type="hidden" name="posisi_galeri" class="form-control" placeholder="Judul Galeri" value="Homepage">

        <div class="form-group">
          <label>Url / Link </label>
          <input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
                                                                                                                $galeri->website ?>" required>
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="isi_galeri" class="form-control tinymce" placeholder="Isi Galeri">
<?php echo $galeri->isi_galeri ?>
    </textarea>
        </div>

      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Ganti Gambar </label>
          <input type="file" name="gambar" class="form-control" style="border:0;">
          <img src="<?php echo base_url('assets/upload/image/' . $galeri->gambar) ?>" class="img img-thumbnail img-fluid">
        </div>
      </div>


    </div>





    <div class="row">
      <div class="col-md-7">


        <div class="form-group">
          <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Top Image</button>
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