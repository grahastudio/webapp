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

                          <div class="text-wrap p-lg-6">
                            <h2 class="mt-0 mb-4"><?php echo $title ?></h2>
                            Berikut adalah riwayat Order <?php echo $this->session->userdata('nama')?>

                            <?php
                            //Kalau Ada Transaksi, Tampilkan
                            if ($header_transaksi) {?>

                              <div class="table-responsive">
                                  <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                      <tr>
                                        <th width="10%">Kode</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>item</th>
                                        <th>Status</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($header_transaksi as $header_transaksi) {?>

                                      <tr>
                                        <td><span class="text-muted"><?php echo $header_transaksi->kode_transaksi ?></span></td>
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
                                          <a href="<?php echo base_url('myaccount/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-teal mr-2"><i class="fe fe-eye mr-2"></i>View</button>
                                            <?php if ($header_transaksi->jumlah_transaksi == 0) {?>
                                              <a href="<?php echo base_url('myaccount/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary"><i class="fe fe-download mr-2"></i>Download</button>
                                            <?php }else{?>
                                              <a href="<?php echo base_url('myaccount/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-primary"><i class="fe fe-credit-card mr-2"></i>Bayar</button>
                                            <?php } ?>


                                        </td>
                                      </tr>

                                      <?php } ?>

                                    </tbody>
                                    </table>
                                  </div>


                            <?php }else{ ?>
                              <div class="card-alert alert alert-success mb-0">
                                <div class="text-center display-1">
                                  <i class="fe fe-shopping-bag"></i>
                                </div>
                                <p class="text-center">Anda belum pernah melakukan order apapun, Silahkan cek produk layanan kami<br><br>
                                  <a href="<?php echo base_url('produk')?>" class="btn btn-gray-dark"> Cek Produk Layanan </a>
                                </p>
                              </div>
                            <?php } ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
