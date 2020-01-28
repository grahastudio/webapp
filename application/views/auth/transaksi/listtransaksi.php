<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>

  </div>

  <?php
  //Notifikasi
  if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success custom-alert">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }

  ?>

  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table card-table table-vcenter text-nowrap">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Kode</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>item</th>
            <th>Pembayaran</th>
            <th>Aksei</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1;
          foreach ($header_transaksi as $header_transaksi) { ?>

            <tr>
              <td><?php echo $i ?></td>
              <td><span class="text-muted"><?php echo $header_transaksi->kode_transaksi ?></span></td>
              <td>
                <?php echo $header_transaksi->nama ?>
                <div class="small text-muted"> <?php echo $header_transaksi->email ?></div>
                <div class="small text-muted"> <?php echo $header_transaksi->telp ?></div>
              </td>
              <td><?php echo $header_transaksi->tanggal_transaksi ?></td>
              <td>IDR. <?php echo number_format($header_transaksi->jumlah_transaksi, '0', ',', '.') ?></td>
              <td><?php echo $header_transaksi->total_item ?></td>
              <td>
                <?php if ($header_transaksi->status_bayar == "Belum") { ?>
                  <span class='badge badge-danger'> <?php echo $header_transaksi->status_bayar ?></span>
                <?php } elseif ($header_transaksi->status_bayar == "Pending") { ?>
                  <span class="badge badge-warning"> <?php echo $header_transaksi->status_bayar ?></span>
                <?php } else { ?>
                  <span class='badge badge-success'> <?php echo $header_transaksi->status_bayar ?></span>
                <?php  } ?>
              </td>
              <td>
                <a href="<?php echo base_url('auth/transaksi/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
                <a href="<?php echo base_url('auth/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print</a>
                <a href="<?php echo base_url('auth/transaksi/status/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Update Status</a>
              </td>
            </tr>

          <?php $i++;
          } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>