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
echo form_open_multipart(base_url('auth/berita/edit/' . $berita->id_berita), $attribut);
?>


<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="col-md-8">
        <div class="form-group form-group-lg">
          <label>Judul Berita</label>
          <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>" required>
        </div>

        <div class="form-group">
          <label>Isi Berita</label>
          <textarea name="isi_berita" class="form-control tinymce" placeholder="Isi Berita">
  <?php echo $berita->isi_berita ?>
    </textarea>
        </div>

        <div class="form-group">
          <label>Keyword Berita (Untuk SEO google)</label>
          <input type="text" name="keywords" class="form-control" placeholder="Keywords Berita" value="<?php echo $berita->keywords ?>">

        </div>




      </div>

      <div class="tile col-md-4">
        <div class="form-group form-group-lg">
          <label>Status Berita</label>
          <select name="status_berita" class="form-control custom-select">
            <option value="Publish">Publish</option>
            <option value="Draft" <?php if ($berita->status_berita == "Draft") {
                                    echo "selected";
                                  } ?>>Draft</option>
          </select>
        </div>


        <div class="form-group">
          <label>Jenis Berita</label>
          <select name="jenis_berita" class="form-control custom-select">
            <option value="Berita">Berita</option>
            <option value="Profil" <?php if ($berita->jenis_berita == "Profil") {
                                      echo "selected";
                                    } ?>>Profil</option>
          </select>
        </div>

        <div class="form-group">
          <label>kategori Berita</label>
          <select name="id_kategori" class="form-control custom-select">

            <?php foreach ($kategori as $kategori) { ?>
              <option value="<?php echo $kategori->id_kategori ?>" <?php if ($berita->id_kategori == $kategori->id_kategori) {
                                                                      echo "selected";
                                                                    } ?>>
                <?php echo $kategori->nama_kategori ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Ganti Gambar</label><br>
          <input type="file" name="gambar"><br><br>
          <img src="<?php echo base_url('assets/upload/image/thumbs/' . $berita->gambar) ?>" width="70%" class="img img-thumbnail">

        </div>

        <div class="form-group">
          <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Berita</button>
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