<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Tambah">
  <i class="fe fe-plus"></i> Tambah Kategori
</button>

<div class="modal modal-default fade" id="Tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">


      </div>
      <div class="modal-body">
        <?php
        //attribut
        $attribut = 'class="form-horizontal"';
        //Form Open
        echo form_open(base_url('auth/kategori'), $attribut);
        ?>

        <div class="form-group">
          <label>Nama Kategori</label>
          <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required="required">
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