<a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#Delete<?php
                                                                                    echo $produk->id_produk ?>">
  <i class="fas fa-trash-alt"></i> Delete
</a>

<div class="modal fade" id="Delete<?php echo $produk->id_produk ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"> Menghapus Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span></button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Menghapus Data Artkel <br><b><?php echo $produk->nama_produk ?></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
        <a href="<?php echo base_url('auth/produk/delete/' . $produk->id_produk) ?>" class="btn btn-danger pull-right"><i class="fa fa-close"></i> Ya, Hapus Artikel</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->