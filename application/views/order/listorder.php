<div class="container konten">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
        <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
      </a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>

  <div class="row">
        <div class="col-lg-3 col-xl-3">
          <?php include('menumyaccount.php');?>
        </div>

              <div class="col-lg-9">


                <?php  if (empty($orderan)): ?>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Tidak Ada Order</h3>
                    </div>
                    <div class="card-body">
                      <div class="text-center display-1">
                        <i class="fe fe-shopping-bag"></i>
                      </div>
                      <p class="text-center">Anda belum melakukan order apapun, Silahkan cek produk layanan kami<br>
                        <a href="<?php echo base_url('produk')?>" class="btn btn-outline-secondary btn-pill"> Cek Produk Layanan </a>
                      </p>
                    </div>
                  </div>

                <?php else: ?>


                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Detail Order</h3>
                    </div>
                    <div class="card-body">
                          <?php
                            if ($this->session->flashdata('sukses')) {
                              echo "<div class='alert alert-info'>";
                              echo $this->session->flashdata('sukses');
                              echo "</div>";
                            }
                           ?>
                            <table class="table card-table table-vcenter">
                              <?php
                              //Form Update
                              echo form_open(base_url('order/update_cart/'.$orderan['rowid']));
                              //Loping data Order
                              foreach ($orderan as $orderan) {
                                $id_produk  = $orderan['id'];
                                $produk     = $this->produk_model->detail($id_produk);
                                //Hidden Input
                                echo form_hidden('cart['.$orderan['id'].']', $orderan['id']);
                                echo form_hidden('cart['.$orderan['id'].']', $orderan['rowid']);
                                echo form_hidden('cart['.$orderan['id'].']', $orderan['name']);
                                echo form_hidden('cart['.$orderan['id'].']', $orderan['price']);
                                echo form_hidden('cart['.$orderan['id'].']', $orderan['qty']);
                                ?>
                              <tr>
                                <td><img src="<?php echo base_url('assets/upload/image/'.$produk->gambar)?>" alt="" class="h-8"></td>
                                <td>
                                  <?php echo $orderan['name'];?>
                                  <br><i class="fe fe-bookmark mr-1"></i> IDR <?php echo number_format($orderan['price'],'0',',','.') ?> | <?php echo $orderan['qty']?> Item
                                </td>
                                <td class="text-right">
                                  <strong><a href="<?php echo base_url('order/hapus/'.$orderan['rowid'])?>"><i class="fe fe-trash text-danger mr-md-3"></i>Hapus </a></strong>
                                </td>
                              </tr>
                            <?php };
                            echo form_close();
                              ?>
                            </table>
                          </div>
                          <div class="card-footer text-right py-3">
                            <div class="row">
                              <h3><i class="fe fe-bookmark text-secondary mr-md-3"></i> IDR <?php echo number_format($this->cart->total(),'0',',','.') ?></h3>
                              <a href="<?php echo base_url('order/hapus/')?>" class="btn btn-cyan text-light mr-2 ml-auto"><i class="fe fe-x mr-2"></i> Batalkan Order </a>
                              <a href="<?php echo base_url('order/checkout')?>" class="btn btn-dark"><i class="fe fe-shopping-bag mr-2"></i> Checkout </a>
                            </div>
                          </div>
                  </div>

                <?php endif ?>
            </div>
      </div>
  </div>
