<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
  //load data
  public function __construct()
  {
    parent::__construct();
    //Proteksi
    if ($this->session->userdata('akses_level') != "Superadmin") {
      $this->session->set_flashdata('sukses', 'Opps Sayangnya halaman yang anda cari tidak ada');
      redirect(base_url('404'), 'refresh');
    }
    //End Proteksi

    $this->load->model('pengunjung_model');
  }
  //get_all data berita
  public function index()
  {
    $pengunjung = $this->pengunjung_model->get_all();
    $data = array(
      'title'    => 'Data Pengunjung (' . count($pengunjung) . ')',
      'pengunjung'   => $pengunjung,
      'isi'      => 'auth/pengunjung/listpengunjung'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }
}


/* end of file Pengunjung.php */
/* Location /application/controller/auth/Pengunjung.php */
