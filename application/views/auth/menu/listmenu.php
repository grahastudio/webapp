<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title"><?php echo $title ?></h3>
      <?php include('tambah.php'); ?>

    </div>
  </div>

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


  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table card-table table-vcenter text-nowrap">
        <thead>
          <tr>
            <th>Nama Menu</th>
            <th>Posisi</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($menu as $menu) { ?>
            <tr>
              <td><?php echo $menu->nama_menu ?></td>
              <td><?php echo $menu->posisi ?></td>
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

          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>