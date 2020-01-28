<div class="container my-md-5">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-4 col-login mx-auto mt-md-5">
        <div class="card">
          <?php
          // Notifikasi
          echo $this->session->flashdata('message');

          //form open
          echo form_open(base_url('login'));

          ?>
          <div class="card-body p-6">
            <div class="card-title">Silahkan Login</div>
            <div class="form-group">
              <label class="form-label">Email address</label>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <i class="fe fe-mail"></i>
                </span>
                <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Password</label>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <i class="fe fe-lock"></i>
                </span>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" />
                <span class="custom-control-label">Remember me</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </div>
            <div class="text-center text-muted mt-6">
              Kamu Belum Punya Akun? <a href="<?php echo base_url('daftar') ?>">Daftar Disini</a>
            </div>
          </div>
          <?php
          //form close
          echo form_close();

          ?>

        </div>
      </div>
    </div>
  </div>
</div>