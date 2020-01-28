<div class="my-3 my-md-5">
<div class="container konten">

<div class="row">
  <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">#<?php echo $header_transaksi->kode_transaksi ?></h3>
                <div class="card-options">
                  <button type="button" class="btn btn-primary" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                </div>
              </div>
              <div class="card-body">
                <div class="row my-3">

                  <div class="col-md-6">
                    <p class="h3">Data User</p>
                    <address>
                      <?php echo $header_transaksi->nama ?><br>
                      <?php echo $header_transaksi->alamat ?><br>
                      <?php echo $header_transaksi->telp ?><br>
                      <?php echo $header_transaksi->tanggal_transaksi ?><br>
                      <?php echo $header_transaksi->email ?>
                    </address>


                    <?php if (empty($header_transaksi->tanggal_bayar) || empty($header_transaksi->nama_bank)     ||
                              empty($header_transaksi->rek_pembayaran)||
                              empty($header_transaksi->rek_pelanggan)||
                              empty($header_transaksi->jumlah_bayar)||
                              empty($header_transaksi->id_rekening)
                              ) {
                      echo "<p class='h3'>Belum Melakukan Konfirmasi</p>";
                    }else{?>

                    <p class="h3">Data Bukti Pembayaran </p>
                    Tanggal : <?php echo $header_transaksi->tanggal_bayar ?><br>
                    Nama Bank : <?php echo $header_transaksi->nama_bank ?><br>
                    No. Rekening  : <?php echo $header_transaksi->rek_pembayaran ?><br>
                    Atas Nama : <?php echo $header_transaksi->rek_pelanggan ?><br>
                    Jumlah Bayar : Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?><br>
                    Ke Rekening  : <?php echo $header_transaksi->bank ?> Nomor <?php echo $header_transaksi->nomor_rekening ?> A.n <?php echo $header_transaksi->nama_pemilik ?> <br>
                    <?php }?>
                  </div>



                  <div class="col-md-6">

                    <?php if ($header_transaksi->bukti_bayar == "") {
                      echo "<p class='h3'>Belum Upload foto Bukti Transfer</p>";
                    }else{?>
                      <p class="h3">Bukti Transfer </p>
                <img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img-fluid">
                  <?php } ?>

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
                      <th>subtotal</th>
                    </tr>

                    <?php $i=1; foreach ($transaksi as $transaksi) {?>
                    <tr>
                      <td class="text-center"><?php echo $i ?></td>
                      <td><?php echo $transaksi->kode_produk ?></td>
                      <td>
                        <p class="font-w600 mb-1"><?php echo $transaksi->nama_produk ?></p>
                      </td>
                      <td><?php echo $transaksi->jumlah ?></td>
                      <td class="text-center">
                        IDR <?php echo number_format($transaksi->harga,'0',',','.') ?>
                      </td>
                      <td class="text-right">IDR <?php echo number_format($transaksi->total_harga,'0',',','.') ?></td>

                    </tr>

                  <?php $i++; } ?>


                    <tr>
                      <td colspan="5" class="font-weight-bold text-uppercase text-right">Total Harga</td>
                      <td class="font-weight-bold text-right">IDR <?php echo number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?></td>
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
