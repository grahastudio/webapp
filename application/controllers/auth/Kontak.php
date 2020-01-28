<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
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

    $this->load->model('kontak_model');
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat

  }


  //get_all data kontak
  public function index()
  {
    $kontak = $this->kontak_model->get_all();
    //$total_kontak = $this->kontak_model->total_kontak();

    $data = array(
      'title'    => 'Data Pesan Masuk (' . count($kontak) . ')',
      'kontak'   => $kontak,
      //'total_kontak' =>$total_kontak,
      'isi'      => 'auth/kontak/listkontak'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  //View Pendaftaran
  public function lihat($id_kontak)
  {
    $kontak = $this->kontak_model->detail($id_kontak);


    $data = array(
      'title'             => 'View Data Pesan Masuk',
      'kontak'       => $kontak,
      'id_kontak'    => $id_kontak,
      'isi'               => 'auth/kontak/lihat'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  //delete
  public function delete($id_kontak)
  {
    //Proteksi delete
    $this->check_login->check();

    $kontak = $this->kontak_model->detail($id_kontak);


    $data = array('id_kontak'   => $kontak->id_kontak);
    $this->kontak_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('auth/kontak'), 'refresh');
  }
}


/* end of file Pendaftaran.php */
/* Location /application/controller/auth/Pendaftaran.php */
