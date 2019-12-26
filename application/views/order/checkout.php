<div class="container konten">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
        <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
      </a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
  </ul>


<div class="row row-cards">
              <div class="col-lg-9">
                <div class="card">
                  <div class="card-status bg-teal"></div>
                  <div class="card-header">
                    <h3 class="card-title">Detail Order</h3>
                  </div>

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


                <div class="card">
                  <div class="card-status bg-teal"></div>
                  <div class="card-header">
                    <h3 class="card-title">Data pengiriman</h3>
                  </div>

                  <div class="card-body">


                  <?php
                    //Error warning
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    echo form_open(base_url('order/checkout'));
                    $kode_transaksi = date('dmY').strtoupper(random_string('alnum',5));

                  ?>
                  <input type="hidden" name="id_user" value="<?php echo $userlogin->id_user;?>">
                  <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total();?>">
                  <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d');?>">

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group form-group-lg">
                          <label>Kode Transaksi</label>
                          <input type="text" name="kode_transaksi" class="form-control" placeholder="Kode Transaksi"
                          value="<?php echo $kode_transaksi ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-group-lg">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" placeholder="Nama Penerima"
                          value="<?php echo $userlogin->nama ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group form-group-lg">
                            <label>Alamat Email <span class="text-danger">* File Akan di kirim ke email ini</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Email"
                            value="<?php echo $userlogin->email ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-lg">
                            <label>Nomor HP <span class="text-danger"></span></label>
                            <input type="number" name="telp" class="form-control" placeholder="Telepon"
                            value="<?php echo $userlogin->telp ?>">
                          </div>
                        </div>
                          <div class="col-md-12">
                          <div class="form-group form-group-lg">
                            <label>Alamat <span class="text-danger"></span></label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $userlogin->alamat ?></textarea>
                          </div>

                          <div class="form-group">
                            <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fe fe-shopping-bag"></i> Selesaikan Pesanan</button>
                          </div>
                        </div>

                        </div>


                  <?php echo form_close();?>

                </div>
              </div>

              </div>
            </div>

          </div>
