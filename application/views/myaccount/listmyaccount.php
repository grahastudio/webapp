<div class="container my-md-5">
  <div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">

      <div class="col-lg-3 col-xl-3">
        <?php include('menumyaccount.php'); ?>
      </div>

      <div class="col-lg-9">




        <div class="card">
          <div class="card-body">

            <?php //Notifikasi
            if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success custom-alert">';
              echo $this->session->flashdata('sukses');
              echo '</div>';
            }
            //Error warning
            echo validation_errors('<div class="alert alert-danger custom-alert">', '</div>');
            ?>

            <div class="text-wrap p-lg-6">
              <h2 class="mt-0 mb-4">Introduction</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>