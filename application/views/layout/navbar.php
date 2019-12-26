<?php
$site_info          = $this->konfigurasi_model->get_all();
$menu_berita        = $this->konfigurasi_model->menu_berita();
$menu_profil        = $this->konfigurasi_model->menu_profil();
$menuatas           = $this->konfigurasi_model->menu_atas();
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);

 ?>
<div class="header py-4">
  <div class="container">
    <div class="d-flex">
       <a class="header-brand" href="<?php echo base_url() ?>">
         <img style="width:150px;" src="<?php echo base_url('assets/upload/image/'.$site_info->logo) ?>" class="img-fluid" alt="Graha Studio">
       </a>

   <div class="d-flex order-lg-2 ml-auto">
         <?php
         //Cek Data Order Ada atau Tidak
         $orderan = $this->cart->contents();
         $total_order = 'IDR ' .number_format($this->cart->total(),'0',',','.');
          ?>
          <div class="dropdown d-none d-md-flex">
            <a class="nav-link icon" data-toggle="dropdown">
              <i class="fe fe-shopping-bag"></i>
              <?php
              if (empty($orderan)) {
                echo "";
              }else{
                echo "<span class='nav-unread'></span>";
              }
               ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
               <?php
               //Kalau Nggak Ada Belanjaan
               if (empty($orderan)) {?>
                 <a href="<?php echo base_url('produk')?>" class="dropdown-item d-flex">
                   <span class="avatar mr-3 align-self-center bg-danger" style="color:#fff;"><i class="fe fe-x"></i> </span>
                   <div>
                      Tidak Ada Order
                   </div>
                 </a>
               <?php }else{
                 //Count Total order
                 $total_order = 'IDR ' .number_format($this->cart->total(),'0',',','.');

                 //Showing Order
                 foreach ($orderan as $orderan) {

                 ?>
                 <a href="<?php echo base_url('order')?>" class="dropdown-item d-flex">
                   <span class="avatar mr-3 align-self-center bg-success" style="color:#fff;"><i class="fe fe-shopping-cart"></i> </span>
                   <div>
                      <strong><?php echo $orderan['name']?></strong>.
                     <div class="small text-muted">IDR <?php echo number_format($orderan['price'],'0',',','.')?> |  <?php echo $orderan['qty']?> Item IDR <?php echo number_format($orderan['subtotal'],'0',',','.')?></div>

                   </div>
                 </a>

               <?php
                 } //foreach Close
              } ?>

              <div class="dropdown-divider"></div>
                                 <a href="<?php echo base_url('order')?>" class="dropdown-item"> Total Harga <?php echo $total_order ?></a>

            </div>
          </div>
<?php if($this->session->userdata('akses_level') == "Superadmin") { ?>

     <div class="dropdown d-none d-md-flex">
       <a class="nav-link icon" data-toggle="dropdown">
         <i class="fe fe-bell"></i>
         </span>
         <?php }?>
         <?php if(!empty($total_kontak)) {
             echo "<span class='nav-unread'>";
             echo "<span style='visibility:hidden'>";
             echo count($total_kontak);
             echo "</span>";
             echo "</span>";
         }else{
         } ?>
     <?php if($this->session->userdata('akses_level') == "Superadmin") { ?>
       </a>
       <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
         <a href="#" class="dropdown-item d-flex">
           <span class="avatar mr-3 align-self-center bg-success" style="color:#fff;"><i class="fe fe-mail"></i> </span>
           <div>
             Ada <strong><?php echo count($total_kontak);?></strong> Pesan Masuk.
             <div class="small text-muted">10 minutes ago</div>
           </div>
         </a>
       </div>
     </div>
<?php } ?>
<?php if ($id_user): ?>

     <div class="dropdown">
        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
        <img class="avatar" src="<?php echo base_url('assets/upload/image/avatar/'.$user_aktif->foto_user) ?>"></img>
        <span class="ml-2 d-none d-lg-block">
        <span class="text-default"> <?php echo $user_aktif->nama ?> </span>
        <small class="text-muted d-block mt-1"> <?php echo $user_aktif->akses_level ?></small>
        </span>
        </a>
       <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
         <a class="dropdown-item" href="<?php echo base_url('myaccount') ?>">
           <i class="dropdown-icon fe fe-user"></i> My Account
         </a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="<?php echo base_url('connect/logout') ?>">
           <i class="dropdown-icon fe fe-log-out"></i> Sign out
         </a>
       </div>
     </div>
     <?php else: ?>
       <a href="<?php echo base_url('login')?>" class="nav-link icon">
         <i class="fe fe-lock"></i>
        <span class="nav-item">Login</span>
       </a>
       <?php endif ?>
   </div>
   <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
     <span class="header-toggler-icon"></span>
   </a>
 </div>
</div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
<div class="container">
 <div class="row align-items-center">
   <div class="col-lg-3 ml-auto">
     <form class="input-icon my-3 my-lg-0">
       <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
       <div class="input-icon-addon">
         <i class="fe fe-search"></i>
       </div>
     </form>
   </div>
   <div class="col-lg order-lg-first">
     <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
       <li class="nav-item">
         <a href="<?php echo base_url() ?>" <?php if($this->uri->segment(0)==""){echo "class='nav-link active'";}?>><i class="fe fe-home"></i> Home</a>
       </li>
       <li class="nav-item">
         <a href="<?php echo base_url('page/tentang-kami') ?>"  <?php if($this->uri->segment(2)=="tentang-kami"){echo "class='nav-link active'";}?>><i class="fe fe-github"></i> Tentang Kami</a>
       </li>
       <li class="nav-item">
         <a href="<?php echo base_url('layanan') ?>" <?php if($this->uri->segment(1)=="layanan"){echo "class='nav-link active'";}?>><i class="fe fe-briefcase"></i> Layanan</a>
       </li>
       <li class="nav-item">
         <a href="<?php echo base_url('galeri') ?>" <?php if($this->uri->segment(1)=="galeri"){echo "class='nav-link active'";}?>><i class="fe fe-layers"></i> Portofolio</a>
       </li>
       <li class="nav-item">
         <a href="<?php echo base_url('download') ?>" <?php if($this->uri->segment(1)=="download"){echo "class='nav-link active'";}?>><i class="fe fe-download-cloud"></i> Download</a>
       </li>
       <li class="nav-item">
         <a href="https://blog.grahastudio.com" <?php if($this->uri->segment(1)==""){echo "class='nav-link active'";}?>><i class="fe fe-file"></i> Blog</a>
       </li>
       <li class="nav-item">
         <a href="https://www.grahastudio.com/kontak" <?php if($this->uri->segment(1)=="kontak"){echo "class='nav-link active'";}?>><i class="fe fe-mail"></i> Kontak</a>
       </li>
       <?php if($this->session->userdata('akses_level') == "Superadmin") { ?>
       <li class="nav-item dropdown">
         <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Dashboard</a>
         <div class="dropdown-menu dropdown-menu-arrow">
           <a href="<?php echo base_url('member/dashboard') ?>" class="dropdown-item ">Dashboard</a>
           <a href="<?php echo base_url('member/berita') ?>" class="dropdown-item ">Berita</a>
           <a href="<?php echo base_url('member/kategori') ?>" class="dropdown-item ">Kategori</a>
           <a href="<?php echo base_url('member/page') ?>" class="dropdown-item ">Halaman</a>
           <a href="<?php echo base_url('member/download') ?>" class="dropdown-item ">Download</a>
           <a href="<?php echo base_url('member/layanan') ?>" class="dropdown-item ">Layanan</a>
           <a href="<?php echo base_url('member/galeri') ?>" class="dropdown-item ">Portofolio</a>
           <a href="<?php echo base_url('member/kontak') ?>" class="dropdown-item ">Pesan Masuk <?php if(!empty($total_kontak)) {
             echo "<span class='tag tag-red'>";
             echo count($total_kontak);
             echo "</span>";
                 }else {
                 } ?></a>
           <a href="<?php echo base_url('member/user') ?>" class="dropdown-item ">Data Member</a>
           <a href="<?php echo base_url('member/konfigurasi') ?>" class="dropdown-item ">Seting Web</a>
           <a href="<?php echo base_url('member/konfigurasi/logo') ?>" class="dropdown-item ">Logo</a>
           <a href="<?php echo base_url('member/konfigurasi/icon') ?>" class="dropdown-item ">Icon</a>
           <a href="<?php echo base_url('member/homepage') ?>" class="dropdown-item ">Homepage Seting</a>
         </div>
       </li>
     <?php } ?>
     </ul>
   </div>
 </div>
</div>
</div>
<div class="">
