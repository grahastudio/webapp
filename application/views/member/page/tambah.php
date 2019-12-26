<div class="card">
  <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>
                  </div>
                  <div class="card-body">
        <?php
        //Form Open
        echo form_open(base_url('member/page/tambah'));
        ?>

        <div class="form-group">
           <label>Judul Halaman</label>
             <input type="text" class="form-control" name="judul_page" placeholder="Judul halaman">
        </div>

        <div class="form-group">
          <label>Isi Page</label>
          <textarea name="isi_page" class="form-control tinymce" placeholder="Isi Page">
        <?php echo set_value('isi_page') ?>
          </textarea>
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
