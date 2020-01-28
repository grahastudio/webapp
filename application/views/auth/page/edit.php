<div class="card">

  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>
  <div class="card-body">

    <?php
    //Error warning
    echo validation_errors('<div class="alert alert-warning">', '</div>');
    // Form Open
    echo form_open_multipart(base_url('auth/page/edit/' . $page->id_page));
    ?>

    <div class="form-group">
      <label>Judul Halaman</label>
      <input type="text" class="form-control" name="judul_page" value="<?php echo $page->judul_page ?>">
    </div>

    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="isi_page" class="form-control summernote"><?php echo $page->isi_page ?></textarea>
    </div>


    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
    </div>


    <?php
    //Form Close
    echo form_close();
    ?>
  </div>
</div>