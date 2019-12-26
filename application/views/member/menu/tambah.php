<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
     <i class="fa fa-plus"></i> Tambah Baru
</button>

<div class="modal modal-default fade" id="Tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <?php
        //attribut
        $attribut = 'class="form-horizontal"';
        //Form Open
        echo form_open(base_url('member/menu'),$attribut);
        ?>

        <div class="form-group">
           <label>Nama Menu</label>
             <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu" required="required">
        </div>

        <div class="form-group">
           <label>Link/Url</label>
             <input type="url" class="form-control" name="url" placeholder="Nama Menu" required="required">
        </div>

        <div class="form-group">
          <label>Posisi Menu</label>
          <select name="posisi" class="form-control form-control-chosen">
            <option value="Menu Atas">Menu Atas</option>
            <option value="Menu Bawah 1">Menu Bawah 1</option>
            <option value="Menu Bawah 2">Menu Bawah 2</option>
            <option value="Menu Bawah 3">Menu Bawah 3</option>
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
