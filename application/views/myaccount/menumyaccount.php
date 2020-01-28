<div class="card">
  <div class="card-header">
    <h3 class="card-title">Menu</h3>
  </div>

  <div class="card-alert alert alert-success mb-0">
    <?php
    date_default_timezone_set("Asia/Jakarta");

    $b = time();
    $hour = date("G", $b);

    if ($hour >= 0 && $hour <= 11) {
      echo "Selamat Pagi :)";
    } elseif ($hour >= 12 && $hour <= 14) {
      echo "Selamat Siang :) ";
    } elseif ($hour >= 15 && $hour <= 17) {
      echo "Selamat Sore :) ";
    } elseif ($hour >= 17 && $hour <= 18) {
      echo "Selamat Petang :) ";
    } elseif ($hour >= 19 && $hour <= 23) {
      echo "Selamat Malam :) ";
    }

    ?> <br>
    <?php echo $this->session->userdata('nama') ?>
  </div>
  <div class="card-body">
    <!-- Getting started -->
    <div class="list-group list-group-transparent mb-0">
      <?php if ($this->session->userdata('nama')) : ?>
        <a href="<?php echo base_url('myaccount') ?>" class="list-group-item list-group-item-action active"><span class="icon mr-3"><i class="fe fe-home"></i></span>My Account</a>
        <a href="<?php echo base_url('myaccount/profile') ?>" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-user"></i></span>Profile Saya</a>
        <a href="<?php echo base_url('myaccount/order') ?>" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-clock"></i></span>History Order</a>
        <a href="<?php echo base_url('myaccount/ubah_password') ?>" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-lock"></i></span>Ubah Password</a>
        <a href="<?php echo base_url('connect/logout') ?>" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-log-out"></i></span>Keluar</a>

      <?php else : ?>
        <a href="<?php echo base_url('login') ?>" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-lock"></i></span>Login</a>

      <?php endif ?>
    </div>
  </div>
</div>