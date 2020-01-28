<?php
$site_info          = $this->konfigurasi_model->get_all();
$menu_berita        = $this->konfigurasi_model->menu_berita();
$menu_profil        = $this->konfigurasi_model->menu_profil();
$menuatas           = $this->konfigurasi_model->menu_atas();
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);

?>

<div class="main-header" data-background-color="white">
  <div class="nav-top">
    <div class="container d-flex flex-row">
      <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <i class="fas fa-bars"></i>
        </span>
      </button>
      <button class="topbar-toggler more"><i class="fas fa-ellipsis-v"></i></button>
      <!-- Logo Header -->
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo base_url('assets/template/v3/img/logo.svg'); ?>" alt="navbar brand" class="navbar-brand">
      </a>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg p-0">

        <div class="container-fluid p-0">
          <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search ml-md-3">
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
                <i class="fe fe-globe"></i> Language
              </a>
              <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                <li>
                  <div class="dropdown-title d-flex justify-content-between align-items-center">
                    Sekect Language
                  </div>
                </li>
                <li class="see-all">
                  <?php echo anchor('language/change/id', 'Indonesia (id)') ?>
                </li>
                <li class="see-all">
                  <?php echo anchor('language/change/en', 'English (en)') ?>
                </li>
              </ul>
            </li>



            <?php if ($id_user) : ?>
              <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fe fe-bell"></i>
                  <span class="notification">4</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                  <li>
                    <div class="dropdown-title">You have 4 new notification</div>
                  </li>
                  <li>
                    <div class="notif-scroll scrollbar-outer">
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
                        <a href="#">
                          <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                          <div class="notif-content">
                            <span class="block">
                              Rahmad commented on Admin
                            </span>
                            <span class="time">12 minutes ago</span>
                          </div>
                        </a>

                        <a href="#">
                          <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                          <div class="notif-content">
                            <span class="block">
                              Farrah liked Admin
                            </span>
                            <span class="time">17 minutes ago</span>
                          </div>
                        </a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                  </li>
                </ul>
              </li>

            <?php else : ?>



            <?php endif ?>



            <?php if ($id_user) : ?>

              <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                  <div class="avatar-sm">
                    <img src="<?php echo base_url('assets/upload/image/avatar/' . $user_aktif->foto_user) ?>" alt="..." class="avatar-img rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                      <div class="user-box">
                        <div class="avatar-lg"><img src="<?php echo base_url('assets/upload/image/avatar/' . $user_aktif->foto_user) ?>" alt="image profile" class="avatar-img rounded"></div>
                        <div class="u-text">
                          <h4><?php echo $user_aktif->nama; ?></h4>
                          <p class="text-muted"><?php echo $user_aktif->email; ?></p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('myaccount'); ?>">My Profile</a>
                      <a class="dropdown-item" href="#">Inbox</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Account Setting</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('connect/logout') ?>">Logout</a>
                    </li>
                  </div>
                </ul>
              </li>

            <?php else : ?>

              <li class="nav-item hidden-caret">
                <a class="nav-link" href="<?php echo base_url('login'); ?>" aria-expanded="false">
                  <i class="far fa-user"></i> Login
                </a>
              </li>

            <?php endif ?>



          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>
  </div>
  <div class="nav-bottom bg-white">
    <h3 class="title-menu d-flex d-lg-none">
      Menu
      <div class="close-menu"> <i class="fas fa-times"></i></div>
    </h3>
    <div class="container d-flex flex-row">
      <ul class="nav page-navigation page-navigation-secondary">

        <?php foreach ($menuatas as $menuatas) { ?>
          <?php if (empty($this->session->userdata('language')) or $this->session->userdata('language') == 'id') { ?>
            <li class="nav-item submenu">
              <a class="nav-link" href="<?php echo $menuatas->url; ?>">
                <span class="menu-title"><?php echo $menuatas->nama_menu; ?></span>
              </a>
            </li>
          <?php } else { ?>
            <li class="nav-item submenu">
              <a class="nav-link" href="<?php echo $menuatas->url; ?>">
                <span class="menu-title"><?php echo $menuatas->nama_menu_en; ?></span>
              </a>
            </li>

          <?php } ?>

        <?php } ?>


      </ul>
    </div>
  </div>
</div>