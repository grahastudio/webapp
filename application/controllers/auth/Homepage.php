<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
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

    $this->load->model('homepage_model');
  }
  //get_all data homepage
  public function index()
  {
    $homepage = $this->homepage_model->get_all();
    $section  = $this->homepage_model->section();

    $data = array(
      'title'      => 'Data Homepage (' . count($homepage) . ')',
      'homepage'    => $homepage,
      'section'    => $section,
      'isi'        => 'auth/homepage/listhomepage'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  public function topimage()
  {
    $homepage = $this->homepage_model->top_image();
    $data = array(
      'title'      => 'Data Homepage (' . count($homepage) . ')',
      'homepage'    => $homepage,
      'isi'        => 'auth/homepage/topimage'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //Tambah Homepage
  public function tambah()
  {
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'judul_homepage',
      'Judul Homepage',
      'required',
      array('required'        => '%s harus diisi')
    );


    if ($valid->run()) {

      $config['upload_path']          = './assets/upload/image/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {

        //End Validasi
        $data = array(
          'title'                     => 'Tambah Homepage',
          'error_upload'              => $this->upload->display_errors(),
          'isi'                       => 'auth/homepage/tambah'
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
          'judul_homepage'     => $i->post('judul_homepage'),
          'isi_homepage'       => $i->post('isi_homepage'),
          'url'          => $i->post('url'),
          'gambar'           => $upload_data['uploads']['file_name'],
          'posisi'    => $i->post('posisi'),
          'tanggal_post'     => date('Y-m-d H:i:s')
        );
        $this->homepage_model->tambah($data);
        $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
        redirect(base_url('auth/homepage'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'        => 'Tambah Homepage',
      'isi'          => 'auth/homepage/tambah'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }


  public function tambah_section()
  {

    //Validasi
    $this->form_validation->set_rules(
      'judul_homepage',
      'Judul',
      'required|is_unique[page.judul_page]',
      array(
        'required'         => '%s Harus Diisi',
      )
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi

      $data = array(
        'title'             => 'Tambah Section',
        'isi'               => 'auth/homepage/tambahsection'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);
      //Masuk Database
    } else {
      $i              = $this->input;
      $slug_page  = url_title($this->input->post('judul_page'), 'dash', TRUE);

      $data  = array(
        'id_user'          => $this->session->userdata('id_user'),
        'judul_homepage'   => $i->post('judul_homepage'),
        'isi_homepage'     => $i->post('isi_homepage'),
        'posisi'           => $i->post('posisi'),
        'url'              => $i->post('url'),
        'icon'             => $i->post('icon'),
        'tanggal_post'     => date('Y-m-d')
      );
      $this->homepage_model->tambah($data);
      $this->session->set_flashdata('sukses', 'Data Page telah ditambahkan');
      redirect(base_url('auth/homepage'), 'refresh');
    }
    //End Masuk Database

  }



  //Edit Section Homepage
  public function editsection($id_homepage)
  {
    $homepage = $this->homepage_model->detail($id_homepage);
    //Validasi
    $this->form_validation->set_rules(
      'judul_homepage',
      'Judul Homepage',
      'required',
      array('required'         => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi

      $data = array(

        'title'             => 'Edit Section',
        'homepage'          => $homepage,
        'isi'               => 'auth/homepage/editsection'
      );
      $this->load->view('auth/layout/wrapper', $data, FALSE);
      //Masuk Database
    } else {
      $i              = $this->input;

      $data  = array(
        'id_homepage'        => $id_homepage,
        'id_user'          => $this->session->userdata('id_user'),
        'judul_homepage'   => $i->post('judul_homepage'),
        'isi_homepage'     => $i->post('isi_homepage'),
        'posisi'           => $i->post('posisi'),
        'url'              => $i->post('url'),
        'icon'             => $i->post('icon'),
        'tanggal_post'     => date('Y-m-d')
      );
      $this->homepage_model->editsection($data);
      $this->session->set_flashdata('sukses', 'Data Section telah di Update');
      redirect(base_url('auth/homepage'), 'refresh');
    }
    //End Masuk Database
  }



  //Edit Homepage
  public function edit($id_homepage)
  {
    $homepage = $this->homepage_model->detail($id_homepage);
    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'judul_homepage',
      'Judul Homepage',
      'required',
      array('required'      => '%s harus diisi')
    );




    if ($valid->run()) {
      //Kalau nggak Ganti gambar
      if (!empty($_FILES['gambar']['name'])) {

        $config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'svg|gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {

          //End Validasi
          $data = array(
            'title'        => 'Edit Homepage',
            'homepage'       => $homepage,
            'error_upload' => $this->upload->display_errors(),
            'isi'          => 'auth/homepage/edit'
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
          if ($homepage->gambar != "") {
            unlink('./assets/upload/image/' . $homepage->gambar);
            unlink('./assets/upload/image/thumbs/' . $homepage->gambar);
          }
          //End Hapus Gambar

          $data  = array(
            'id_homepage'        => $id_homepage,
            'id_user'          => $this->session->userdata('id_user'),
            'judul_homepage'     => $i->post('judul_homepage'),
            'isi_homepage'       => $i->post('isi_homepage'),
            'url'          => $i->post('url'),
            'gambar'           => $upload_data['uploads']['file_name'],
            'posisi'    => $i->post('posisi')
          );
          $this->homepage_model->edit($data);
          $this->session->set_flashdata('sukses', 'Data telah Diedit');
          redirect(base_url('auth/homepage'), 'refresh');
        }
      } else {
        //Update Homepage Tanpa Ganti Gambar
        $i     = $this->input;
        // Hapus Gambar Lama Jika ada upload gambar baru
        if ($homepage->gambar != "")
          $data  = array(
            'id_homepage'        => $id_homepage,
            'id_user'          => $this->session->userdata('id_user'),
            'judul_homepage'     => $i->post('judul_homepage'),
            'isi_homepage'       => $i->post('isi_homepage'),
            'url'          => $i->post('url'),
            //'gambar'           => $upload_data['uploads']['file_name'],
            'posisi'    => $i->post('posisi')
          );
        $this->homepage_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data telah Diedit');
        redirect(base_url('auth/homepage'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'        => 'Edit Homepage',
      'homepage'       => $homepage,
      'isi'          => 'auth/homepage/edit'
    );
    $this->load->view('auth/layout/wrapper', $data, FALSE);
  }

  //delete
  public function delete($id_homepage)
  {
    //Proteksi delete
    $this->check_login->check();

    $homepage = $this->homepage_model->detail($id_homepage);
    //Hapus gambar

    if ($homepage->gambar != "") {
      unlink('./assets/upload/image/' . $homepage->gambar);
      unlink('./assets/upload/image/thumbs/' . $homepage->gambar);
    }
    //End Hapus Gambar
    $data = array('id_homepage'   => $homepage->id_homepage);
    $this->homepage_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data telah di Hapus');
    redirect(base_url('auth/homepage'), 'refresh');
  }
}


/* end of file Homepage.php */
/* Location /application/controller/auth/Homepage.php */
