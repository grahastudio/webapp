<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('berita_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('layanan_model');
    $this->load->model('galeri_model');
    $this->load->model('menu_model');
    $this->load->model('homepage_model');
  }

  //main page - home page
  public function index()
  {
    $konfigurasi                    = $this->konfigurasi_model->get_all();
    $slider                         = $this->galeri_model->slider();
    $homepage                       = $this->homepage_model->get_all();
    $section                        = $this->homepage_model->section();
    $layanan                        = $this->layanan_model->home();
    $berita                         = $this->berita_model->home();



    $data = array(  'title'         => $konfigurasi->namaweb.' - '.$konfigurasi->tagline,
                    'keywords'      => $konfigurasi->namaweb.' - '.$konfigurasi->tagline.','.$konfigurasi->keywords,
                    'deskripsi'     => $konfigurasi->deskripsi,
                    'slider'        => $slider,
                    'homepage'      => $homepage,
                    'section'       => $section,
                    'layanan'       => $layanan,
                    'berita'        => $berita,
                    'isi'       => 'home/listhome'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }
}

 /* End of file home.php */
 /* Location: ./application/controllers/Home.php */
