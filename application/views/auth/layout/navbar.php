<?php
//Ambil data user berdsarkan Data Loginnya
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
$site_info          = $this->konfigurasi_model->get_all();

?>

<!-- 
      <div class="header py-4">
  <div class="container">
    <div class="d-flex">
     <a class="header-brand" href="<?php echo base_url() ?>">
     <img style="width:150px;" src="<?php echo base_url('assets/upload/image/' . $site_info->logo) ?>" class="img-fluid" alt="Graha Studio">
   </a>
      <div class="d-flex order-lg-2 ml-auto">


        <?php if ($this->session->userdata('akses_level') == "Superadmin") { ?>

        <div class="dropdown d-none d-md-flex">
          <a class="nav-link icon" data-toggle="dropdown">
            <i class="fe fe-bell"></i>
            </span>

            <?php } ?>


            <?php if (!empty($total_kontak)) {
				echo "<span class='nav-unread'>";
				echo "<span style='visibility:hidden'>";
				echo count($total_kontak);
				echo "</span>";
				echo "</span>";
			} else {
			} ?>


<?php if ($this->session->userdata('akses_level') == "Superadmin") { ?>

          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a href="#" class="dropdown-item d-flex">
              <span class="avatar mr-3 align-self-center bg-success" style="color:#fff;"><i class="fe fe-mail"></i> </span>
              <div>
                Ada <strong><?php echo count($total_kontak); ?></strong> Pesan Masuk.
                <div class="small text-muted">10 minutes ago</div>
              </div>
            </a>


            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center">Mark all as read</a>
          </div>
        </div>

        <?php } ?>



        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <img class="avatar" src="<?php echo base_url('assets/upload/image/avatar/' . $user_aktif->foto_user) ?>"></img>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default"><?php echo $user_aktif->nama ?></span>
              <small class="text-muted d-block mt-1"><?php echo $user_aktif->akses_level ?></small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="<?php echo base_url('auth/profile') ?>">
              <i class="dropdown-icon fe fe-user"></i> Profile
            </a>

            <a class="dropdown-item" href="<?php echo base_url('connect/logout') ?>">
              <i class="dropdown-icon fe fe-log-out"></i> Sign out
            </a>
          </div>
        </div>
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
            <a href="<?php echo base_url() ?>" class="nav-link active"><i class="fe fe-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('page/tentang-kami') ?>" class="nav-link"><i class="fe fe-github"></i> Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('layanan') ?>" class="nav-link"><i class="fe fe-briefcase"></i> Layanan</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('galeri') ?>" class="nav-link"><i class="fe fe-layers"></i> Portofolio</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('download') ?>" class="nav-link"><i class="fe fe-download-cloud"></i> Download</a>
          </li>
          <li class="nav-item">
            <a href="https://blog.grahastudio.com/" class="nav-link"><i class="fe fe-file"></i> Blog</a>
          </li>


          <?php if ($this->session->userdata('akses_level') == "Superadmin") { ?>

          <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Dashboard</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="<?php echo base_url('auth/dashboard') ?>" class="dropdown-item ">Dashboard</a>
              <a href="<?php echo base_url('auth/berita') ?>" class="dropdown-item ">Berita</a>
              <a href="<?php echo base_url('auth/kategori') ?>" class="dropdown-item ">Kategori</a>
              <a href="<?php echo base_url('auth/page') ?>" class="dropdown-item ">Halaman</a>
              <a href="<?php echo base_url('auth/download') ?>" class="dropdown-item ">Download</a>
              <a href="<?php echo base_url('auth/layanan') ?>" class="dropdown-item ">Layanan</a>
              <a href="<?php echo base_url('auth/transaksi') ?>" class="dropdown-item ">Transaksi</a>
              <a href="<?php echo base_url('auth/galeri') ?>" class="dropdown-item ">Portofolio</a>
              <a href="<?php echo base_url('auth/rekening') ?>" class="dropdown-item ">Rekening</a>
              <a href="<?php echo base_url('auth/kontak') ?>" class="dropdown-item ">Pesan Masuk <?php if (!empty($total_kontak)) {
																										echo "<span class='tag tag-red'>";
																										echo count($total_kontak);
																										echo "</span>";
																									} else {
																									} ?></a>
              <a href="<?php echo base_url('auth/user') ?>" class="dropdown-item ">Data Member</a>
              <a href="<?php echo base_url('auth/konfigurasi') ?>" class="dropdown-item ">Seting Web</a>
              <a href="<?php echo base_url('auth/konfigurasi/logo') ?>" class="dropdown-item ">Logo</a>
              <a href="<?php echo base_url('auth/konfigurasi/icon') ?>" class="dropdown-item ">Icon</a>
              <a href="<?php echo base_url('auth/homepage') ?>" class="dropdown-item ">Homepage Seting</a>



            </div>
          </li>

        <?php } ?>

        </ul>
      </div>
    </div>
  </div>
</div>


<div class="container mt-md-5 konten"> -->




<!-- V2 -->

<div class="main-header" data-background-color="blue">
	<!-- Logo Header -->
	<div class="logo-header">

		<a href="index.html" class="logo">
			<img class="text-white" src="assets/img/logoazzara.svg" alt="Admin" class="navbar-brand">
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="fa fa-bars"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
		<div class="navbar-minimize">
			<button class="btn btn-minimize btn-rounded">
				<i class="fa fa-bars"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg">

		<div class="container-fluid">
			<div class="collapse" id="search-nav">
				<form class="navbar-left navbar-form nav-search mr-md-3">
					<div class="input-group">
						<div class="input-group-prepend">
							<button type="submit" class="btn btn-search pr-1">
								<i class="fa fa-search search-icon"></i>
							</button>
						</div>
						<input type="text" placeholder="Search ..." class="form-control">
					</div>
				</form>
			</div>
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
				<li class="nav-item toggle-nav-search hidden-caret">
					<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
						<i class="fa fa-search"></i>
					</a>
				</li>
				<li class="nav-item dropdown hidden-caret">
					<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-envelope"></i>
						<?php if (!empty($total_kontak)) {
							echo "<span class='notification'>";
							echo count($total_kontak);
							echo "</span>";
							echo "</span>";
						} else {
						} ?>
					</a>
					<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
						<li>
							<div class="dropdown-title d-flex justify-content-between align-items-center">
								Messages
								<a href="#" class="small">Mark all as read</a>
							</div>
						</li>
						<li>
							<div class="message-notif-scroll scrollbar-outer">
								<div class="notif-center">
									<a href="#">
										<div class="notif-img">
											<i class="fas fa-envelope"></i>
										</div>
										<div class="notif-content">
											<span class="block">Anda Memiliki <?php echo count($total_kontak); ?> Pesan Belum di baca</span>
										</div>
									</a>

								</div>
							</div>
						</li>
						<li>
							<a class="see-all" href="<?php echo base_url('auth/kontak'); ?> ">See all messages<i class="fa fa-angle-right"></i> </a>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown hidden-caret">
					<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-bell"></i>
						<span class="notification">4</span>
					</a>
					<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
						<li>
							<div class="dropdown-title">You have 4 new notification</div>
						</li>
						<li>
							<div class="notif-center">
								<a href="#">
									<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
									<div class="notif-content">
										<span class="block">
											New user registered
										</span>
										<span class="time">5 minutes ago</span>
									</div>
								</a>

							</div>
						</li>
						<li>
							<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="<?php echo base_url('assets/upload/image/avatar/' . $user_aktif->foto_user) ?>" alt="..." class="avatar-img rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-user animated fadeIn">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src="<?php echo base_url('assets/upload/image/avatar/' . $user_aktif->foto_user) ?>" alt="image profile" class="avatar-img rounded"></div>
								<div class="u-text">
									<h4><?php echo $user_aktif->nama; ?></h4>
									<p class="text-muted"><?php echo $user_aktif->email; ?></p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('auth/profile') ?>">My Profile</a>
							<a class="dropdown-item" href="#">My Balance</a>
							<a class="dropdown-item" href="#">Inbox</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Account Setting</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('connect/logout') ?>">Logout</a>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>
<!-- Sidebar -->
<div class="sidebar">

	<div class="sidebar-wrapper scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?php echo base_url('assets/upload/image/avatar/' . $user_aktif->foto_user) ?>" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php echo $user_aktif->nama; ?>
							<span class="user-level"><?php echo $user_aktif->akses_level; ?></span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="<?php echo base_url('auth/profile') ?>">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav">
				<li class="nav-item">
					<a href="<?php echo base_url('auth/dashboard') ?>">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						<span class="badge badge-count">5</span>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Data Master</h4>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/produk'); ?>">
						<i class="fas fa-shopping-bag"></i>
						<p>Produk</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/transaksi'); ?>">
						<i class="fas fa-credit-card"></i>
						<p>Transaksi</p>
						<span class="caret"></span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('auth/berita'); ?>">
						<i class="fas fa-newspaper"></i>
						<p>Berita</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/page'); ?>">
						<i class="fas fa-file"></i>
						<p>Page</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/download'); ?>">
						<i class="fas fa-download"></i>
						<p>Download</p>
						<span class="caret"></span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('auth/layanan'); ?>">
						<i class="fas fa-briefcase"></i>
						<p>Layanan</p>
						<span class="caret"></span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('auth/galeri'); ?>">
						<i class="fas fa-image"></i>
						<p>Galery</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/rekening'); ?>">
						<i class="fas fa-credit-card"></i>
						<p>Rekening</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/kontak'); ?>">
						<i class="fas fa-envelope"></i>
						<p>Pesan Masuk</p>
						<?php if (!empty($total_kontak)) {
							echo "<span class='badge badge-count badge-danger'>";
							echo count($total_kontak);
							echo "</span>";
						} else {
							echo "<span class='badge badge-count badge-success'>";
							echo count($total_kontak);
							echo "</span>";
						} ?>

					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('auth/member'); ?>">
						<i class="fas fa-users"></i>
						<p>Member</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('auth/user'); ?>">
						<i class="fas fa-user"></i>
						<p>User</p>
						<span class="caret"></span>
					</a>
				</li>

				<li class="nav-item">
					<a data-toggle="collapse" href="#tables">
						<i class="fas fa-cog fa-spin"></i>
						<p>Setings</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tables">
						<ul class="nav nav-collapse">
							<li>
								<a href="<?php echo base_url('auth/konfigurasi') ?>">
									<span class="sub-item">Profile web</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('auth/konfigurasi/logo') ?>">
									<span class="sub-item">Logo</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('auth/konfigurasi/favicon') ?>">
									<span class="sub-item">Favicon</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('auth/homepage') ?>">
									<span class="sub-item">Homepage</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('auth/menu') ?>">
									<span class="sub-item">Menu</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="nav-item active">
					<a href="widgets.html">
						<i class="fas fa-desktop"></i>
						<p>Widgets</p>
						<span class="badge badge-count badge-success">4</span>
					</a>
				</li>

			</ul>
		</div>
	</div>
</div>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">