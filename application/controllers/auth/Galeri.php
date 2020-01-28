<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
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
    $this->load->model('galeri_model');
  }
  //get_all data galeri
  public function index()
  {
    $galeri = $this->galeri_model->get_all();
    $data = array(
      'title'      => 'Data Galeri (' . count($galeri) . ')',
      'galeri'    => $galeri,
      'isi'        => 'auth/galeri/listgaleri'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  public function topimage()
  {
    $galeri = $this->galeri_model->top_image();
    $data = array(
      'title'      => 'Data Galeri (' . count($galeri) . ')',
      'galeri'    => $galeri,
      'isi'        => 'auth/galeri/topimage'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //Tambah Galeri
  public function tambah()
  {
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'judul_galeri',
      'Judul Galeri',
      'required',
      array('required'        => '%s harus diisi')
    );


    if ($valid->run()) {

      $config['upload_path']          = './assets/upload/image/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {

        //End Validasi
        $data = array(
          'title'                     => 'Tambah Galeri',
          'error_upload'              => $this->upload->display_errors(),
          'isi'                       => 'auth/galeri/tambah'
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

        $data  = array(
          'id_user'          => $this->session->userdata('id_user'),
          'judul_galeri'     => $i->post('judul_galeri'),
          //'isi_galeri'       => $i->post('isi_galeri'),
          'website'          => $i->post('website'),
          'gambar'           => $upload_data['uploads']['file_name'],
          'posisi_galeri'    => $i->post('posisi_galeri'),
          'tanggal_post'     => date('Y-m-d H:i:s')
        );
        $this->galeri_model->tambah($data);
        $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
        redirect(base_url('auth/galeri'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'        => 'Tambah Galeri',
      'isi'          => 'auth/galeri/tambah'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //Edit Galeri
  public function edit($id_galeri)
  {
    $galeri = $this->galeri_model->detail($id_galeri);
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'judul_galeri',
      'Judul Galeri',
      'required',
      array('required'      => '%s harus diisi')
    );




    if ($valid->run()) {
      //Kalau nggak Ganti gambar
      if (!empty($_FILES['gambar']['name'])) {

        $config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {

          //End Validasi
          $data = array(
            'title'        => 'Edit Galeri',
            'galeri'       => $galeri,
            'error_upload' => $this->upload->display_errors(),
            'isi'          => 'auth/galeri/edit'
          );
          $this->load->view('auth/layout/wrapper', $data, FALSE);

          //Masuk Database

        } else {

          //Proses Manipulasi Gambar
          $upload_data    = array('uploads'  => $this->upload->data());
          //Gambar Asli disimpan di folder assets/upload/image
          //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

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

          // Hapus Gambar Lama Jika Ada upload gambar baru
          if ($galeri->gambar != "") {
            unlink('./assets/upload/image/' . $galeri->gambar);
            unlink('./assets/upload/image/thumbs/' . $galeri->gambar);
          }
          //End Hapus Gambar

          $data  = array(
            'id_galeri'        => $id_galeri,
            'id_user'          => $this->session->userdata('id_user'),
            'judul_galeri'     => $i->post('judul_galeri'),
            //'isi_galeri'       => $i->post('isi_galeri'),
            'website'          => $i->post('website'),
            'gambar'           => $upload_data['uploads']['file_name'],
            'posisi_galeri'    => $i->post('posisi_galeri')
          );
          $this->galeri_model->edit($data);
          $this->session->set_flashdata('sukses', 'Data telah Diedit');
          redirect(base_url('auth/galeri'), 'refresh');
        }
      } else {
        //Update Galeri Tanpa Ganti Gambar
        $i     = $this->input;
        // Hapus Gambar Lama Jika ada upload gambar baru
        if ($galeri->gambar != "")
          $data  = array(
            'id_galeri'        => $id_galeri,
            'id_user'          => $this->session->userdata('id_user'),
            'judul_galeri'     => $i->post('judul_galeri'),
            'isi_galeri'       => $i->post('isi_galeri'),
            'website'          => $i->post('website'),
            //'gambar'           => $upload_data['uploads']['file_name'],
            'posisi_galeri'    => $i->post('posisi_galeri')
          );
        $this->galeri_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah Diedit');
        redirect(base_url('auth/galeri'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'        => 'Edit Galeri',
      'galeri'       => $galeri,
      'isi'          => 'auth/galeri/edit'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  //Edit Galeri
  public function ubahtopimage($id_galeri)
  {
    $galeri = $this->galeri_model->detail($id_galeri);
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'judul_galeri',
      'Judul Galeri',
      'required',
      array('required'      => '%s harus diisi')
    );




    if ($valid->run()) {
      //Kalau nggak Ganti gambar
      if (!empty($_FILES['gambar']['name'])) {

        $config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {

          //End Validasi
          $data = array(
            'title'        => 'Edit Top Image',
            'galeri'       => $galeri,
            'error_upload' => $this->upload->display_errors(),
            'isi'          => 'auth/galeri/topimage'
          );
          $this->load->view('auth/layout/wrapper', $data, FALSE);

          //Masuk Database

        } else {

          //Proses Manipulasi Gambar
          $upload_data    = array('uploads'  => $this->upload->data());
          //Gambar Asli disimpan di folder assets/upload/image
          //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

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

          // Hapus Gambar Lama Jika Ada upload gambar baru
          if ($galeri->gambar != "") {
            unlink('./assets/upload/image/' . $galeri->gambar);
            unlink('./assets/upload/image/thumbs/' . $galeri->gambar);
          }
          //End Hapus Gambar

          $data  = array(
            'id_galeri'        => $id_galeri,
            'id_user'          => $this->session->userdata('id_user'),
            'judul_galeri'     => $i->post('judul_galeri'),
            //'isi_galeri'       => $i->post('isi_galeri'),
            'website'          => $i->post('website'),
            'gambar'           => $upload_data['uploads']['file_name'],
            'posisi_galeri'    => $i->post('posisi_galeri')
          );
          $this->galeri_model->edit($data);
          $this->session->set_flashdata('sukses', 'Data telah Diedit');
          redirect(base_url('auth/galeri/topimage'), 'refresh');
        }
      } else {
        //Update Galeri Tanpa Ganti Gambar
        $i     = $this->input;
        // Hapus Gambar Lama Jika ada upload gambar baru
        if ($galeri->gambar != "")
          $data  = array(
            'id_galeri'        => $id_galeri,
            'id_user'          => $this->session->userdata('id_user'),
            'judul_galeri'     => $i->post('judul_galeri'),
            'isi_galeri'       => $i->post('isi_galeri'),
            'website'          => $i->post('website'),
            //'gambar'           => $upload_data['uploads']['file_name'],
            'posisi_galeri'    => $i->post('posisi_galeri')
          );
        $this->galeri_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah Diedit');
        redirect(base_url('auth/galeri/topimage'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'        => 'Edit Top Image',
      'galeri'       => $galeri,
      'isi'          => 'auth/galeri/ubahtopimage'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //delete
  public function delete($id_galeri)
  {
    //Proteksi delete
    $this->check_login->check();

    $galeri = $this->galeri_model->detail($id_galeri);
    //Hapus gambar

    if ($galeri->gambar != "") {
      unlink('./assets/upload/image/' . $galeri->gambar);
      unlink('./assets/upload/image/thumbs/' . $galeri->gambar);
    }
    //End Hapus Gambar
    $data = array('id_galeri'   => $galeri->id_galeri);
    $this->galeri_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('auth/galeri'), 'refresh');
  }
}


/* end of file Galeri.php */
/* Location /application/controller/auth/Galeri.php */
