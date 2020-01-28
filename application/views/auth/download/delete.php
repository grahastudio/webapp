<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php
                                                                          echo $download->id_download ?>">
  <i class="fa fa-trash-alt text-white"></i>
</a>

<div class="modal fade" id="Delete<?php echo $download->id_download ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Menghapus Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-window-close"></i></span></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Menghapus Data Artkel <b><?php echo $download->judul_download ?></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
        <a href="<?php echo base_url('auth/download/delete/' . $download->id_download) ?>" class="btn btn-danger pull-right" id="alert_demo_3_3"><i class="fa fa-close"></i> Ya, Hapus Artikel</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->