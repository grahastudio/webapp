<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php
                                                                                            echo $rekening->id_rekening ?>">
  <i class="fas fa-trash-alt"></i> Hapus
</button>

<div class="modal modal-danger fade" id="Delete<?php echo $rekening->id_rekening ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Menghapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus Rekening Bank <b><?php echo $rekening->nama_bank ?> <br>
            dengan Nomor <?php echo $rekening->nomor_rekening ?> </b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <a href="<?php echo base_url('auth/rekening/delete/' . $rekening->id_rekening) ?>" class="btn btn-danger pull-right"><i class="fas fa-trash-alt"></i> Ya, Hapus data ini</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->