

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $rekening->id_rekening ?>">
     <i class="fa fa-edit"></i> Edit
</button>

<div class="modal modal-default fade" id="Edit<?php echo $rekening->id_rekening ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Rekening</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          

      </div>
      <div class="modal-body">
        <?php
        //Error warning
        echo validation_errors('<div class="alert alert-warning">','</div>');

        echo form_open(base_url('member/rekening/edit/'.$rekening->id_rekening));
        ?>

        <div class="form-group">
           <label>Nama Bank</label>
             <input type="text" class="form-control" name="nama_bank" value="<?php echo $rekening->nama_bank ?>">
        </div>
        <div class="form-group">
           <label>Nomor Rekening</label>
             <input type="text" class="form-control" name="nomor_rekening" value="<?php echo $rekening->nomor_rekening ?>">
        </div>
        <div class="form-group">
           <label>Atas Nama</label>
             <input type="text" class="form-control" name="nama_pemilik" value="<?php echo $rekening->nama_pemilik ?>">
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
