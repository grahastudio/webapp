<div class="container konten">
          <div class="row">
            <div class="col col-login mx-auto card mt-md-6">

							<?php
							//Error warning
							echo validation_errors('<div class="alert alert-warning">','</div>');

							echo form_open(base_url('daftar'));
							?>
							<?php

							if($this->session->flashdata('sukses')){
							echo '<div class="alert alert-success">';
							echo $this->session->flashdata('sukses');
							echo '</div>';
							}

							?>
                <div class="card-body p-6">
                  <div class="card-title">Create new account</div>
                  <div class="form-group">
                    <label class="form-label">Name</label>
										<div class="input-icon">
														<span class="input-icon-addon">
															<i class="fe fe-user"></i>
														</span>
                    <input name="nama" type="text" class="form-control" placeholder="Enter name">
									</div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email address</label>
										<div class="input-icon">
														<span class="input-icon-addon">
															<i class="fe fe-mail"></i>
														</span>
                    <input name="email" type="email" class="form-control" placeholder="Enter email">
									</div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Password</label>
										<div class="input-icon">
														<span class="input-icon-addon">
															<i class="fe fe-lock"></i>
														</span>
                    <input name="password" type="password" class="form-control" placeholder="Password">
									</div>
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Agree the <a href="<?php echo base_url('page/kebijakan-privasi')?>">terms and policy</a></span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                  </div>

									<div class="text-center text-muted pt-md-6">
		                Already have account? <a href="<?php echo base_url('login')?>">Sign in</a>
		              </div>

                </div>
								<?php
								//form close
								echo form_close();

								 ?>

            </div>
          </div>

				</div>
