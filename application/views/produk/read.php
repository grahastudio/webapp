<div class="container">
    <div class="row">
        <div class="col-md-8 post-detail">
          <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
                <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
              </a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ul>
          <div class="konten-produk card">

            <!-- Form Untuk Memproses Order -->
            <?php echo form_open(base_url('order/add'));
                  //Element yang di Include
                  echo form_hidden('id',  $produk->id_produk);
                  echo form_hidden('qty', 1);
                  echo form_hidden('price', $produk->harga);
                  echo form_hidden('name', $produk->nama_produk);
                  echo form_hidden('redirect_page', str_replace('index.php/','', current_url()));

            ?>


           <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar)?>" alt="" class="img-fluid">
            <div class="card-body">
                <h2><?php echo $title ?></h2>
                <div class="post-meta">
                  <span><i class="fa fa-calendar"></i> <?php echo shortdate_indo($produk->tanggal_post) ?></span>
                  <span><i class="fa fa-user"></i> <?php echo $produk->nama ?> </span>
                  <span><i class="fa fa-tag"></i> <?php echo $produk->nama_kategori ?></span>

                </div>
                <?php echo $produk->deskripsi ?>
                <button type="submit" value="submit" class="btn btn-pill btn-primary"><i class="fe fe-shopping-cart mr-2"></i> Order</button>
                <div class="addthis_inline_share_toolbox"></div>
            </div>

            <?php echo form_close()?>


        </div>
      </div>
        <div class="col-md-4 sidebar mt-md-8">
          <div class="sidebar-konten card">
            <div class="card-header">
            <h3 class="card-title">Produk Terbaru</h3>
          </div>
          <?php foreach($get_all as $get_all) { ?>
          <ul>
            <li>
              <a href="<?php echo base_url('produk/'.$get_all->slug_produk) ?>"> <?php echo strip_tags(character_limiter($get_all->nama_produk, 50)) ?> </a>
              <br><i class="fa fa-calendar"></i> <?php echo date_indo($get_all->tanggal_post) ?>
            </li>
          </ul>
          <?php } ?>
          </div>
          <div class="sidebar-konten card">
            <div class="card-header">
            <h3 class="card-title">Produk Populer</h3>
          </div>
          <?php foreach($popularpost as $popularpost) { ?>
          <ul>
            <li>
              <a href="<?php echo base_url('produk/'.$popularpost->slug_produk) ?>"> <?php echo strip_tags(character_limiter($popularpost->nama_produk, 50)) ?> </a>

            </li>
          </ul>
          <?php } ?>
        </div>
      </div>
</div>
</div>
