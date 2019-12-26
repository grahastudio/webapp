<?php
$site = $this->konfigurasi_model->get_all();
$total_kontak = $this->konfigurasi_model->total_kontak();
$total_unread = $this->konfigurasi_model->total_unread();
 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="google-site-verification" content="<?php echo $site->metatext ?>" />
     <meta name="msvalidate.01" content="<?php echo $site->bingmeta ?>" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"/>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext"> -->
    <link href='https://fonts.googleapis.com/css?family=Quicksand:500,700' rel='stylesheet'/>
    <link href="<?php echo base_url('assets/template/css/main.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/template/css/style.css')?>" rel="stylesheet" />

    <script src="<?php echo base_url('assets/template/js/dashboard.js')?>"></script>
    <script src="<?php echo base_url('assets/template/plugins/input-mask/plugin.js')?>"></script>
    <script src="<?php echo base_url('assets/template/plugins/datatables/plugin.js')?>"></script>
  </head>
  <body>
