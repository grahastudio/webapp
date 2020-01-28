<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

  //Load Data Konfigurasi
  public function __construct()
  {
    parent::__construct();
    //Proteksi
    if ($this->session->userdata('akses_level') != "Superadmin") {
      $this->session->set_flashdata('sukses', 'Opps Sayangnya halaman yang anda cari tidak ada');
      redirect(base_url('404'), 'refresh');
    }
    //End Proteksi
    $this->load->model('konfigurasi_model');
  }

  //Konfigurasi Umum
  public function index()
  {
    $konfigurasi = $this->konfigurasi_model->get_all();

    //Validasi
    $this->form_validation->set_rules(
      'namaweb',
      'Nama Perusahaan',
      'required',
      array('required'        => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi

      $data = array(
        'title'           => 'Konfigurasi Website',
        'konfigurasi'     => $konfigurasi,
        'isi'             => 'auth/konfigurasi/listkonfigurasi'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);

      //Masuk Database
    } else {
      $i              = $this->input;

      $data  = array(
        'id_konfigurasi'  => $konfigurasi->id_konfigurasi,
        'id_user'         => $this->session->userdata('id_user'),
        'namaweb'         => $i->post('namaweb'),
        'tagline'         => $i->post('tagline'),
        'email'           => $i->post('email'),
        'telepon'         => $i->post('telepon'),
        'alamat'          => $i->post('alamat'),
        'website'         => $i->post('website'),
        'deskripsi'       => $i->post('deskripsi'),
        'keywords'        => $i->post('keywords'),
        'metatext'        => $i->post('metatext'),
        'bingmeta'        => $i->post('bingmeta'),
        'map'             => $i->post('map'),
        'facebook'        => $i->post('facebook'),
        'twitter'         => $i->post('twitter'),
        'youtube'         => $i->post('youtube'),
        'instagram'       => $i->post('instagram')
      );
      $this->konfigurasi_model->edit($data);
      $this->session->set_flashdata('sukses', 'Data telah diubah');
      redirect(base_url('auth/konfigurasi'), 'refresh');
    }
    //End Masuk Database

  }


  //Konfigurasi Logo
  public function logo()
  {
    $konfigurasi = $this->konfigurasi_model->get_all();

    //Validasi
    $this->form_validation->set_rules(
      'id_konfigurasi',
      'Nama Perusahaan',
      'required',
      array('required'         => '%s Harus Diisi')
    );
    if ($this->form_validation->run()) {

      $config['upload_path']          = './assets/upload/image/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('logo')) {

        //End Validasi

        $data = array(
          'title'           => 'Konfigurasi Website',
          'konfigurasi'     => $konfigurasi,
          'error'           => $this->upload->display_errors(),
          'isi'             => 'auth/konfigurasi/logo'
        );
        $this->load->view('auth/layout/wrapper', $data, FALSE);

        //Masuk Database
      } else {
        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  => $this->upload->data());
        //Gambar Asli disimpan di folder assets/upload/image
        //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/' . $upload_data['uploads']['file_name'];
        //Gambar Versi Kecil dipindahkan
        $config['new_image']        = './assets/upload/image/thumbs/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

        $i     = $this->input;
        $i     = $this->input;

        $data  = array(
          'id_konfigurasi'  => $konfigurasi->id_konfigurasi,
          'id_user'         => $this->session->userdata('id_user'),
          'logo'            => $upload_data['uploads']['file_name']
        );
        $this->konfigurasi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah diubah');
        redirect(base_url('auth/konfigurasi/logo'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'         => 'Konfigurasi Website',
      'konfigurasi'          => $konfigurasi,
      'isi'                  => 'auth/konfigurasi/logo'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  //Konfigurasi Icon
  public function icon()
  {
    $konfigurasi = $this->konfigurasi_model->get_all();

    //Validasi
    $this->form_validation->set_rules(
      'id_konfigurasi',
      'Nama Perusahaan',
      'required',
      array('required'         => '%s Harus Diisi')
    );
    if ($this->form_validation->run()) {

      $config['upload_path']          = './assets/upload/image/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('icon')) {

        //End Validasi

        $data = array(
          'title'           => 'Konfigurasi Icon',
          'konfigurasi'     => $konfigurasi,
          'error'           => $this->upload->display_errors(),
          'isi'             => 'auth/konfigurasi/icon'
        );
        $this->load->view('auth/layout/wrapper', $data, FALSE);

        //Masuk Database
      } else {
        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  => $this->upload->data());
        //Gambar Asli disimpan di folder assets/upload/image
        //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/' . $upload_data['uploads']['file_name'];
        //Gambar Versi Kecil dipindahkan
        $config['new_image']        = './assets/upload/image/thumbs/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;
        $config['thumb_marker']     = '';

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

        $i     = $this->input;
        $i     = $this->input;

        $data  = array(
          'id_konfigurasi'  => $konfigurasi->id_konfigurasi,
          'id_user'         => $this->session->userdata('id_user'),
          'icon'            => $upload_data['uploads']['file_name']
        );
        $this->konfigurasi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah diubah');
        redirect(base_url('auth/konfigurasi/icon'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'         => 'Konfigurasi Icon Website',
      'konfigurasi'          => $konfigurasi,
      'isi'                  => 'auth/konfigurasi/icon'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }
}

/* end of file Konfigurasi.php */
/* Location /application/controller/auth/Dabor.php */
