<div class="container my-md-5">
  <div class="page-inner">

    <div class="row">

      <div class="col-lg-3 col-xl-3">
        <?php include('menumyaccount.php'); ?>
      </div>

      <div class="col-lg-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">#<?php echo $header_transaksi->kode_transaksi ?></h3>
            <div class="card-options">
              <button type="button" class="btn btn-primary" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
            </div>
          </div>
          <div class="card-body">
            <div class="row my-8">
              <div class="col-6">
                <p class="h3">Graha Studio</p>
                <address>
                  Jl. Graha Raya Bintaro Jaya,<br>
                  Pondok Aren <br>
                  Tangerang Selatan<br>
                  ghrahastudio35@gmail.com
                </address>
              </div>
              <div class="col-6 text-right">
                <p class="h3"><?php echo $header_transaksi->nama ?></p>
                <address>
                  <?php echo $header_transaksi->alamat ?><br>
                  <?php echo $header_transaksi->telp ?><br>
                  <?php echo $header_transaksi->tanggal_transaksi ?><br>
                  <?php echo $header_transaksi->email ?>
                </address>
              </div>
            </div>
            <div class="table-responsive push">
              <table class="table table-bordered table-hover">
                <tr>
                  <th></th>
                  <th>Kode Produk</th>
                  <th>Product</th>
                  <th>Qnt</th>
                  <th>Harga</th>
                  <th>
                    <?php if ($header_transaksi->jumlah_transaksi == 0) { ?>
                      Download Link
                    <?php } else { ?>
                      subtotal
                    <?php } ?>
                  </th>
                </tr>

                <?php $i = 1;
                foreach ($transaksi as $transaksi) { ?>
                  <tr>
                    <td class="text-center"><?php echo $i ?></td>
                    <td><?php echo $transaksi->kode_produk ?></td>
                    <td>
                      <p class="font-w600 mb-1"><?php echo $transaksi->nama_produk ?></p>
                    </td>
                    <td><?php echo $transaksi->jumlah ?></td>
                    <td class="text-center">
                      IDR <?php echo number_format($transaksi->harga, '0', ',', '.') ?>
                    </td>
                    <td class="text-right">
                      <?php if ($transaksi->harga == 0) { ?>
                        <?php echo form_open('myaccount/detail/' . $header_transaksi->kode_transaksi); ?>
                        <input type="hidden" name="status_url" value="1">
                        <?php if ($header_transaksi->status_url == 1) { ?>
                          Sudah di Download
                        <?php } else { ?>
                          <button type="submit" class="btn btn-primary" onclick="window.open('<?php echo $transaksi->url ?>');">Download</button>
                        <?php } ?>


                        <?php echo form_close(); ?>
                      <?php } else { ?>
                        IDR <?php echo number_format($transaksi->total_harga, '0', ',', '.') ?>
                      <?php } ?>

                    </td>

                  </tr>

                <?php $i++;
                } ?>





                <tr>
                  <?php if ($header_transaksi->jumlah_transaksi == 0) { ?>
                  <?php } else { ?>
                    <td colspan="5" class="font-weight-bold text-uppercase text-right">Total Harga</td>
                    <td class="font-weight-bold text-right">IDR <?php echo number_format($header_transaksi->jumlah_transaksi, '0', ',', '.') ?></td>
                  <?php } ?>
                </tr>
              </table>
            </div>
            <p class="text-muted text-center">Terima kasih banyak untuk berbisnis dengan kami. Kami berharap dapat bekerja sama dengan Anda lagi!</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>