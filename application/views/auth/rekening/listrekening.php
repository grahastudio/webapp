<?php
//Notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

//Error warning
echo validation_errors('<div class="alert alert-warning">', '</div>');
//include Tambah

?>

<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title"><?php echo $title ?></h3>

      <?php include('tambah.php'); ?>

    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table card-table table-vcenter text-nowrap table-bordered ">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Bank</th>
            <th>Nomor Rek</th>
            <th>Pemilik</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1;
          foreach ($rekening as $rekening) { ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $rekening->nama_bank ?></td>
              <td><?php echo $rekening->nomor_rekening ?></td>
              <td><?php echo $rekening->nama_pemilik ?></td>
              <td><?php
                  //link Delete
                  include('edit.php');
                  ?>

                <?php
                //link Delete
                include('delete.php');
                ?>


              </td>
            </tr>

          <?php $i++;
          } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>