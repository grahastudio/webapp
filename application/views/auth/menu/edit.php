<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $menu->id_menu ?>">
  <i class="fa fa-edit"></i> Edit
</button>

<div class="modal modal-default fade" id="Edit<?php echo $menu->id_menu ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <?php
        //Error warning
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        echo form_open(base_url('auth/menu/edit/' . $menu->id_menu));
        ?>

        <div class="form-group">
          <label>Nama Menu</label>
          <input type="text" class="form-control" name="nama_menu" value="<?php echo $menu->nama_menu ?>">
        </div>

        <div class="form-group">
          <label>Link / Url</label>
          <input type="url" class="form-control" name="url" value="<?php echo $menu->url ?>">
        </div>

        <div class="form-group form-group-lg">
          <label>Posisi Menu</label>
          <select name="posisi" class="form-control form-control-chosen">
            <option value="Menu Atas">Menu Atas</option>
            <option value="Menu Bawah 1" <?php if ($menu->posisi == "Menu Bawah 1") {
                                            echo "selected";
                                          } ?>>Menu Bawah 1</option>
            <option value="Menu Bawah 2" <?php if ($menu->posisi == "Menu Bawah 2") {
                                            echo "selected";
                                          } ?>>Menu Bawah 2</option>
            <option value="Menu Bawah 3" <?php if ($menu->posisi == "Menu Bawah 3") {
                                            echo "selected";
                                          } ?>>Menu Bawah 3</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
        </div>


        <?php
        //Form Close
        echo form_close();
        ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->