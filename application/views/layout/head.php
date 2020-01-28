<?php

$site = $this->konfigurasi_model->get_all();
$total_kontak = $this->konfigurasi_model->total_kontak();
$total_unread = $this->konfigurasi_model->total_unread();

// error_reporting(0);
// ini_set('display_errors', 0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en" />
  <meta name="keywords" content="<?php echo $title . ',' . $keywords ?>">
  <meta name="google-site-verification" content="<?php echo $site->metatext ?>" />
  <meta name="msvalidate.01" content="<?php echo $site->bingmeta ?>" />
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#4188c9">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <link rel="icon" href="<?php echo base_url('assets/upload/image/' . $site->icon) ?>" />
  <title><?php echo $title ?></title>
  <!-- CSS Files V3 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/v3/fontawesome/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/v3/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/v3/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/v3/css/feather-icon.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/v3/fonts/flaticon/flaticon.css'); ?>">




</head>

<body>