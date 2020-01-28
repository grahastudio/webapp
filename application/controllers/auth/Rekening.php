<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    //Proteksi
    if ($this->session->userdata('akses_level') != "Superadmin") {
      $this->session->set_flashdata('sukses', 'Opps Sayangnya halaman yang anda cari tidak ada');
      redirect(base_url('404'), 'refresh');
    }
    //End Proteksi
    $this->load->model('rekening_model');
  }
  //Main Page Rekening
  public function index()
  {
    $rekening = $this->rekening_model->get_all();

    //Validasi
    $this->form_validation->set_rules(
      'nomor_rekening',
      'Nomor',
      'required|is_unique[rekening.nomor_rekening]',
      array(
        'required'         => '%s Harus Diisi',
        'is_unque'         => '%s <strong>' . $this->input->post('nomor_rekening') .
          '</strong>Nama Rekening Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi

      $data = array(
        'title'             => 'Data rekening (' . count($rekening) . ')',
        'rekening'          => $rekening,
        'isi'               => 'auth/rekening/listrekening'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);
      //Masuk Database
    } else {
      $i              = $this->input;

      $data  = array(
        'nama_bank'             => $i->post('nama_bank'),
        'nomor_rekening'        => $i->post('nomor_rekening'),
        'nama_pemilik'          => $i->post('nama_pemilik'),
        'tanggal_post'          => date('Y-m-d H:i:s')
      );
      $this->rekening_model->tambah($data);
      $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
      redirect(base_url('auth/rekening'), 'refresh');
    }
    //End Masuk Database
  }


  //Edit Rekening
  public function edit($id_rekening)
  {
    $rekening = $this->rekening_model->detail($id_rekening);
    //Validasi
    $this->form_validation->set_rules(
      'nomor_rekening',
      'Nomor',
      'required',
      array('required'         => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi

      $data = array(
        'title'             => 'Edit rekening Berita',
        'rekening'          => $rekening,
        'isi'               => 'auth/rekening/edit'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);
      //Masuk Database
    } else {
      $i              = $this->input;

      $data  = array(
        'nama_bank'             => $i->post('nama_bank'),
        'nomor_rekening'        => $i->post('nomor_rekening'),
        'nama_pemilik'          => $i->post('nama_pemilik'),
        'tanggal_update'          => date('Y-m-d H:i:s')
      );
      $this->rekening_model->edit($data);
      $this->session->set_flashdata('sukses', 'Data telah di Update');
      redirect(base_url('auth/rekening'), 'refresh');
    }
    //End Masuk Database
  }



  //delete
  public function delete($id_rekening)
  {
    //Proteksi delete
    $this->check_login->check();

    $rekening = $this->rekening_model->detail($id_rekening);
    $data = array('id_rekening'   => $rekening->id_rekening);

    $this->rekening_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('auth/rekening'), 'refresh');
  }
}

/* end of file Rekening.php */
/* Location /application/controller/auth/Rekening.php */
