<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  //load data
  public function __construct()
  {
    parent::__construct();
    //Proteksi
    if($this->session->userdata('akses_level') != "Superadmin")
    {
      $this->session->set_flashdata('sukses', 'Opps Sayangnya halaman yang anda cari tidak ada');
      redirect(base_url('404'),'refresh');
    }
    //End Proteksi
    
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('download_model');
    $this->load->model('galeri_model');
    $this->load->model('layanan_model');
    $this->load->model('user_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('kontak_model');
    $this->load->model('pengunjung_model');


    //Proteksi
    if($this->session->userdata('akses_level') != "Superadmin")
    {
      $this->session->set_flashdata('sukses', 'Hak Akses Anda Tidak Mencukupi');
      redirect(base_url('member/profile'),'refresh');
    }
    //End Proteksi


  }

  public function index()
  {
    $download         = $this->download_model->get_all();
    $galeri           = $this->galeri_model->get_all();
    $user             = $this->user_model->get_all();
    $layanan          = $this->layanan_model->get_all();
    $kontak           = $this->kontak_model->get_all();
    $pengunjung       = $this->pengunjung_model->get_all();
    $pageview         = $this->pengunjung_model->pageview();


    $data = array(  'title'       => 'Halaman Dashboard',
                    'download'      => $download,
                    'galeri'      => $galeri,
                    'user'        => $user,
                    'layanan'     => $layanan,
                    'kontak'      => $kontak,
                    'pengunjung'  => $pengunjung,
                    'pageview'    => $pageview,

                    'isi'         => 'member/dashboard/listdashboard'
   );

    $this->load->view('member/layout/wrapper', $data, FALSE);
  }
}

/* end of file Dasbor.php */
/* Location /application/controller/member/Dabor.php */
