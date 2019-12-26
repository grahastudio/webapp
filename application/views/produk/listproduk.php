<div class="container konten">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
</ul>
  <div class="row">

    <?php foreach ($produk as $produk) {?>

    <div class="col-lg-6">
      <!-- Form Untuk Memproses Order -->
      <?php echo form_open(base_url('order/add'));
            //Element yang di Include
            echo form_hidden('id',  $produk->id_produk);
            echo form_hidden('qty', 1);
            echo form_hidden('price', $produk->harga);
            echo form_hidden('name', $produk->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php/','', current_url()));

      ?>

        <div class="card card-aside">
          <a href="#" class="card-aside-column" style="background-image: url(<?php echo base_url('assets/upload/image/'.$produk->gambar)?>)"></a>
          <div class="card-body d-flex flex-column">
            <h4><a href="<?php echo base_url('produk/'.$produk->slug_produk)?>"><?php echo $produk->nama_produk ?></a></h4>
            <div class="text-muted"><?php echo strip_tags(character_limiter($produk->deskripsi,140)) ?></div>
            <div class="d-flex align-items-center pt-5 mt-auto">
              <div class="avatar avatar-md mr-3" style="background-image: url(<?php echo base_url('assets/upload/image/avatar/'.$produk->foto_user)?>)"></div>
              <div>
                <a href="./profile.html" class="text-default"><?php echo $produk->nama ?></a>
                <small class="d-block text-muted"><?php echo mediumdate_indo($produk->tanggal_post) ?></small>
              </div>
              <div class="ml-auto">
                <div class="d-none d-md-inline-block ml-3"><i class="fe fe-bookmark mr-1"></i> IDR <?php echo number_format($produk->harga,'0',',','.') ?></div>
              </div>
            </div>
          </div>
        </div>

<?php echo form_close() ?>

      </div>

    <?php } ?>

    </div>
  </div>
