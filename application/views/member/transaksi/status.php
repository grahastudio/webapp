<div class="container">
  <div class="card my-3">
    <div class="card-header">
                    <h3 class="card-title"><?php echo $title?></h3>

                  </div>

                  <?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar
if(isset($error_upload)){
  echo '<div class="alert alert-warning">'.$error_upload.'</div>';
}

echo form_open(base_url('member/transaksi/status/'.$header_transaksi->kode_transaksi));
?>

<div class="col-md-3">
  <div class="form-group form-group-lg">
    <label>Ubah status Bayar</label>
    <select name="status_bayar" class="form-control">
        <option value="Lunas">Lunas</option>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fe fe-check"></i> Konfirmasi</button>
  </div>
</div>



<?php
echo form_close(); ?>

</div>
</div>
