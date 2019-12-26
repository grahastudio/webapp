<div class="card">
  <div class="card-header">
                  <h3 class="card-title"><?php echo $title?></h3>

                </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

 ?>

<div class="table-responsive">
<table class="table card-table table-vcenter text-nowrap datatable">
<thead>
<tr>
  <th width="5%">No</th>
  <th width="10%">Kode</th>
  <th>Nama User</th>
  <th>Tanggal</th>
  <th>Total</th>
  <th>item</th>
  <th>Status</th>
  <th></th>
</tr>
</thead>
<tbody>

 <?php $i=1; foreach ($header_transaksi as $header_transaksi) {?>

<tr>
  <td><?php echo $i ?></td>
  <td><span class="text-muted"><?php echo $header_transaksi->kode_transaksi ?></span></td>
  <td>
    <?php echo $header_transaksi->nama ?>
    <div class="small text-muted"> <?php echo $header_transaksi->email ?></div>
    <div class="small text-muted"> <?php echo $header_transaksi->telp ?></div>
  </td>
  <td><?php echo $header_transaksi->tanggal_transaksi ?></td>
  <td>IDR. <?php echo number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?></td>
  <td><?php echo $header_transaksi->total_item ?></td>
  <td>
    <?php if ($header_transaksi->status_bayar == "Belum") {?>
      <span class='status-icon bg-danger'></span> <?php echo $header_transaksi->status_bayar ?>
    <?php }elseif($header_transaksi->status_bayar == "Pending"){?>
      <span class="status-icon bg-warning"></span> <?php echo $header_transaksi->status_bayar ?>
    <?php }else{?>
      <span class='status-icon bg-success'></span> <?php echo $header_transaksi->status_bayar ?>
  <?php  } ?>
    </td>
  <td>
    <a href="<?php echo base_url('member/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-teal mr-2"><i class="fe fe-eye mr-2"></i>View</a>
    <a href="<?php echo base_url('member/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary"><i class="fe fe-printer mr-2"></i>Print</a>
    <a href="<?php echo base_url('member/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Update Status</a>
  </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
