<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Tambah">
     <i class="fe fe-plus"></i> Tambah Rekening
</button>

<div class="modal modal-default fade" id="Tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Rekening</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">


      </div>
      <div class="modal-body">
        <?php
        //attribut
        $attribut = 'class="form-horizontal"';
        //Form Open
        echo form_open(base_url('member/rekening'),$attribut);
        ?>

        <div class="form-group">
           <label>Nama Bank</label>
             <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank">
        </div>

        <div class="form-group">
           <label>Nomor Rekening</label>
             <input type="number" class="form-control" name="nomor_rekening" placeholder="Nomor Rekening">
        </div>
        <div class="form-group">
           <label>Atas Nama</label>
             <input type="text" class="form-control" name="nama_pemilik" placeholder="Atas Nama">
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
