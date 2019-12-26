<div class="my-3 my-md-5">
<div class="container konten">

<div class="row">

  <div class="col-lg-3 col-xl-3">
    <?php include('menumyaccount.php');?>
  </div>

  <div class="col-lg-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">#<?php echo $header_transaksi->kode_transaksi ?></h3>
              </div>
              <div class="card-body">



<?php if ($header_transaksi->status_bayar == 'Konfirmasi') {
  echo "Pembayaran anda sedang di tinjau";
}else{ ?>



                <div class="row my-5">
                  <div class="row">
                                        <div class="col-6">
                                          <div class="h4">Kode Transaksi</div>
                                          <p>#<?php echo $header_transaksi->kode_transaksi ?></p>
                                        </div>
                                        <div class="col-6">
                                          <div class="h4">Tanggal Transaksi</div>
                                          <p><?php echo longdate_indo($header_transaksi->tanggal_transaksi) ?></p>
                                        </div>
                                        <div class="col-6">
                                          <div class="h6">Status Pembayaran</div>
                                          <p><span class="status-icon bg-danger"></span> <?php echo $header_transaksi->status_bayar ?></p>
                                        </div>
                                        <div class="col-6">
                                          <div class="h6">Jumlah Total</div>
                                          <p>IDR <?php echo number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?></p>
                                        </div>
                                      </div>
                </div>

                <?php
                //Error warning
                echo validation_errors('<div class="alert alert-warning">','</div>');
                //Error Upload Gabar
                if(isset($error_upload)){
                  echo '<div class="alert alert-warning">'.$error_upload.'</div>';
                }

                echo form_open_multipart(base_url('myaccount/konfirmasi/'.$header_transaksi->kode_transaksi));
                ?>

                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group form-group-lg">
                      <label>Tranfer dari Bank</label>
                      <select name="nama_bank" class="form-control">
                          <option value="BCA">BCA</option>
                          <option value="Mandiri">Mandiri</option>
                          <option value="BRI">BRI</option>
                          <option value="BNI">BNI</option>
                          <option value="CIMB NIAGA">CIMB NIAGA</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-group-lg">
                      <label>Ke Bank</label>
                      <select name="id_rekening" class="form-control">
                        <?php foreach ($rekening as $rekening) { ?>
                          <option value="<?php echo $rekening->id_rekening?>">
                            <?php echo $rekening->nama_bank ?> | <?php echo $rekening->nomor_rekening  ?> | <?php echo $rekening->nama_pemilik ?>
                          </option>
                      <?php  } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group form-group-lg">
                      <label>Atas Nama <span class="text-danger"></span></label>
                      <input type="text" name="rek_pelanggan" class="form-control" placeholder="Telepon"
                      value="">
                    </div>
                  </div>



                  <div class="col-md-4">
                    <div class="form-group form-group-lg">
                      <label>Nomor Rek <span class="text-danger"></span></label>
                      <input type="number" name="rek_pembayaran" class="form-control" placeholder="Telepon"
                      value="">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group form-group-lg">
                      <label>Tanggal Transfer</label>
                      <input type="text" name="tanggal_bayar" class="form-control datepicker" placeholder="Tanggal Transfer"
                      value="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group form-group-lg">
                      <label>Jumlah Pembayaran</label>
                      <input type="text" name="jumlah_bayar" class="form-control" placeholder="Kode Transaksi"
                      value="">
                    </div>
                  </div>



                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Upload Bukti Transfer</label><br>
                      <input type="file" name="bukti_bayar">
                    </div>
                  </div>

                      <div class="col-md-12">
                      <!-- <div class="form-group form-group-lg">
                        <label>Catatan (Optional) <span class="text-danger"></span></label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div> -->

                      <div class="form-group">
                        <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fe fe-shopping-bag"></i> Selesaikan Pesanan</button>
                      </div>
                    </div>

                    </div>


                <?php
                echo form_close(); ?>


<?php } ?>





              </div>
            </div>
          </div>
      </div>
    </div>
</div>
