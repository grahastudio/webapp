<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">', '</div>');
//Error Upload Gabar
if (isset($error_upload)) {
  echo '<div class="alert alert-warning">' . $error_upload . '</div>';
}



// Form Open
echo form_open_multipart(base_url('auth/berita/tambah'));
?>

<div class="row">

  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <div class="form-group form-group-lg">
          <label>Judul Berita</label>
          <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo set_value('judul_berita') ?>">
        </div>

        <div class="form-group">
          <label>Isi Berita</label>
          <textarea name="isi_berita" class="form-control summernote" placeholder="Isi Berita"><?php echo set_value('isi_berita') ?></textarea>
        </div>

        <div class="form-group">
          <label>Keyword Berita (Untuk SEO google)</label>
          <input type="text" name="keywords" class="form-control" placeholder="Keywords Berita">
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="form-group form-group-lg">
          <label>Status Berita</label>
          <select name="status_berita" class="form-control custom-select">
            <option value="Publish">Publish</option>
            <option value="Draft">Draft</option>
          </select>
        </div>

        <div class="form-group">
          <label>Jenis Berita</label>
          <select name="jenis_berita" class="form-control custom-select">
            <option value="Berita">Berita</option>
            <option value="Profil">Profil</option>
          </select>
        </div>

        <div class="form-group">
          <label>kategori Berita</label>
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
          <label>Upload Gambar</label><br>
          <input type="file" name="gambar">
        </div>

        <div class="form-group">
          <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fe fe-save"></i> Simpan Berita</button>
        </div>
      </div>
    </div>
  </div>


  <?php
  //Form close
  echo form_close();
  ?>