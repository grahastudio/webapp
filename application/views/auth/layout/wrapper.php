<?php
//Proteksi Halaman Admin
$this->check_login->check();
//Gabungan Semua layout
require_once('head.php');
require_once('navbar.php');
require_once('breadcrumbs.php');
require_once('content.php');
require_once('footer.php');
