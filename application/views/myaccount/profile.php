


<div class="container konten">
      <div class="page-header">
                  </div>
                  <div class="row">

                    <div class="col-lg-3 col-xl-3">
                      <?php include('menumyaccount.php');?>
                    </div>

                    <div class="col-lg-9">
                      <div class="card">
                        <div class="card-body">

                          <div class="text-wrap p-lg-6">
                            <h2 class="mt-0 mb-4">Profile Saya</h2>



                            <?php //Notifikasi
                            if($this->session->flashdata('sukses'))
                            {
                              echo '<div class="alert alert-success custom-alert">';
                              echo $this->session->flashdata('sukses');
                              echo '</div>';
                            }
                            //Error warning
                            echo validation_errors('<div class="alert alert-danger custom-alert">','</div>');
                            ?>
                              <?php

                                //Atribut
                                $attribut = 'class="alert alert-link"';
                                // Form Open
                                echo form_open_multipart(base_url('myaccount/profile'));
                              ?>

                              <div class="row">

                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Nama </label>
                                  <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>">
                                </div>
                                </div>


                                <div class="col-md-12">
                                <div class="form-group">
                                  <label>Telp </label>
                                  <input type="text" name="telp" class="form-control" placeholder="Telp" value="<?php echo $user->telp ?>">
                                </div>
                              </div>

                                <div class="col-md-5">
                                <div class="form-group">
                                  <label>Email </label>
                                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" readonly>
                                </div>
                              </div>


                              <div class="col-md-5">
                                <div class="form-group">
                                  <label>Level Akses</label>
                                    <input type="text" name="akses_level" class="form-control" value="<?php echo $user->
                                          akses_level ?>" readonly>
                                </div>
                              </div>

                                <!-- <div class="col-md-12">
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                                </div>
                              </div> -->


                              <div class="col-md-12">
                                <div class="form-group">
                            <div class="form-label">Pilih Avatar</div>
                            <div class="custom-controls-stacked">
                              <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="foto_user" value="1.jpg">
                                <span class="custom-control-label"><img class="avatar avatar-xl" src="<?php echo base_url('assets/upload/image/avatar/1.jpg')?>"></span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="foto_user" value="2.jpg" <?php if($user->foto_user=="2.jpg"){echo "checked";}?>>
                                <span class="custom-control-label"><img class="avatar avatar-xl" src="<?php echo base_url('assets/upload/image/avatar/2.jpg')?>"></span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="foto_user" value="3.jpg" <?php if($user->foto_user=="3.jpg"){echo "checked";}?>>
                                <span class="custom-control-label"><img class="avatar avatar-xl" src="<?php echo base_url('assets/upload/image/avatar/3.jpg')?>"></span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="foto_user" value="4.jpg" <?php if($user->foto_user=="4.jpg"){echo "checked";}?>>
                                <span class="custom-control-label"><img class="avatar avatar-xl" src="<?php echo base_url('assets/upload/image/avatar/4.jpg')?>"></span>
                              </label>
                            </div>
                          </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
                                </div>
                              </div>


                              </div>

                            <?php
                            //form Close
                            echo form_close();
                            ?>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
