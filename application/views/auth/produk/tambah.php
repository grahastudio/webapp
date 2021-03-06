<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">', '</div>');
//Error Upload Gabar
if (isset($error_upload)) {
  echo '<div class="alert alert-warning">' . $error_upload . '</div>';
}


// Form Open
echo form_open_multipart(base_url('auth/produk/tambah'));
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group form-group-lg">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo set_value('nama_produk') ?>">
        </div>

        <div class="form-group form-group-lg">
          <label>Harga Produk</label>
          <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?php echo set_value('harga') ?>">
        </div>

        <div class="form-group">
          <label>Deskripsi Produk</label>
          <textarea name="deskripsi" class="form-control tinymce" placeholder="Isi Produk"><?php echo set_value('deskripsi') ?></textarea>
        </div>

        <div class="form-group">
          <label>Keyword Produk (Untuk SEO google)</label>
          <input type="text" name="keywords" class="form-control" placeholder="Keywords Produk">
        </div>

      </div>

      <div class="col-md-4">

        <div class="form-group form-group-lg">
          <label>Kode Produk</label>
          <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo set_value('kode_produk') ?>">
        </div>

        <div class="form-group form-group-lg">
          <label>Status Produk</label>
          <select name="status_produk" class="form-control custom-select">
            <option value="Publish">Publish</option>
            <option value="Draft">Draft</option>
          </select>
        </div>

        <div class="form-group">
          <label>kategori Produk</label>
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
          <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fe fe-save"></i> Simpan Produk</button>
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