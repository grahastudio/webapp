<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
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
    $this->load->model('download_model');
    $this->load->model('kategori_model');
  }
  //get_all data download
  public function index()
  {
    $download = $this->download_model->get_all();
    $data = array(
      'title'    => 'Data Artikel (' . count($download) . ')',
      'download'   => $download,
      'isi'      => 'auth/download/listdownload'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //Tambah Download
  public function tambah()
  {

    $kategori = $this->kategori_model->get_all();

    //Validasi
    $this->form_validation->set_rules(
      'judul_download',
      'Judul Download',
      'required',
      array('required'      => '%s harus diisi')
    );

    $this->form_validation->set_rules(
      'deskripsi',
      'Deskripsi  Download',
      'required',
      array('required'      => '%s harus diisi')
    );


    if ($this->form_validation->run() === FALSE) {

      //End Validasi
      $data = array(
        'title'        => 'Tambah Download',
        'kategori'     => $kategori,
        'isi'          => 'auth/download/tambah'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);

      //Masuk Database

    } else {

      $i     = $this->input;

      $data  = array(
        'id_user'          => $this->session->userdata('id_user'),
        'id_kategori'      => $i->post('id_kategori'),
        'slug_download'    => url_title($this->input->post('judul_download'), 'dash', TRUE),
        'judul_download'   => $i->post('judul_download'),
        'deskripsi'     => $i->post('deskripsi'),
        'status_download'  => $i->post('status_download'),
        'url_download'    => $i->post('url_download'),
        'keywords'         => $i->post('keywords'),
        'tanggal_post'     => date('Y-m-d H:i:s')
      );
      $this->download_model->tambah($data);
      $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
      redirect(base_url('auth/download'), 'refresh');
    }
    //End Masuk Database
    $data = array(
      'title'        => 'Tambah Download',
      'kategori'     => $kategori,
      'isi'          => 'auth/download/tambah'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //Edit Download
  public function edit($id_download)
  {
    $download = $this->download_model->detail($id_download);
    //Validasi
    $kategori = $this->kategori_model->get_all();

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'judul_download',
      'Judul Download',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'deskripsi',
      'Deskripsi Download',
      'required',
      array('required'      => '%s harus diisi')
    );


    if ($valid->run() === FALSE) {


      //End Validasi
      $data = array(
        'title'        => 'Edit Download',
        'kategori'     => $kategori,
        'download'       => $download,
        'isi'          => 'auth/download/edit'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);

      //Masuk Database

    } else {

      $i     = $this->input;

      $data  = array(
        'id_download'      => $id_download,
        'id_user'          => $this->session->userdata('id_user'),
        'id_kategori'      => $i->post('id_kategori'),
        'slug_download'    => url_title($this->input->post('judul_download'), 'dash', TRUE),
        'judul_download'   => $i->post('judul_download'),
        'deskripsi'        => $i->post('deskripsi'),
        'status_download'  => $i->post('status_download'),
        'url_download'     => $i->post('url_download'),
        'keywords'         => $i->post('keywords'),
        'tanggal_update'   => date('Y-m-d H:i:s')
      );
      $this->download_model->edit($data);
      $this->session->set_flashdata('sukses', 'Data telah Diedit');
      redirect(base_url('auth/download'), 'refresh');
    }

    //End Masuk Database
    $data = array(
      'title'        => 'Edit Download',
      'kategori'     => $kategori,
      'download'       => $download,
      'isi'          => 'auth/download/edit'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //delete
  public function delete($id_download)
  {
    //Proteksi delete
    $this->check_login->check();

    $download = $this->download_model->detail($id_download);
    $data = array('id_download'   => $download->id_download);
    $this->download_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('auth/download'), 'refresh');
  }
}


/* end of file Download.php */
/* Location /application/controller/auth/Download.php */
