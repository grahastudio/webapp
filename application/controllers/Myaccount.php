<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
{


  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('user_model');
    $this->load->model('header_transaksi_model');
    $this->load->model('transaksi_model');
    $this->load->model('rekening_model');
    //Proteksi
    $this->check_login->check();
    //End Proteksi
  }

  //main page - home page
  public function index()
  {
    //Get id login User
    $id_user          = $this->session->userdata('id_user');
    $header_transaksi = $this->header_transaksi_model->user($id_user);

    $data = array(
      'title' => 'Akun Saya',
      'keywords'  => 'Halaman User',
      'id_user'   => $id_user,
      'header_transaksi'  => $header_transaksi,
      'header_transaksi'         => $header_transaksi,
      'isi'  => 'myaccount/listmyaccount'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
  //Order user Page
  public function order()
  {
    //Get id login User
    $id_user          = $this->session->userdata('id_user');
    $header_transaksi = $this->header_transaksi_model->user($id_user);

    $data = array(
      'title'             => 'Riwayat Order',
      'keywords'          => 'Order saya',
      'id_user'           => $id_user,
      'header_transaksi'  => $header_transaksi,
      'isi'               => 'myaccount/order'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
  //Detail Transaksi
  public function detail($kode_transaksi)
  {
    //Ambil Data Login Id user dari session
    $id_user          = $this->session->userdata('id_user');
    $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);
    //Pastikan bahwa user hanya mengakses data transaksinya
    if ($header_transaksi->id_user != $id_user) {
      $this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi user lain');
      redirect(base_url('login'));
    }

    //Validasi
    $this->form_validation->set_rules(
      'status_url',
      'Status Url',
      'required|is_unique[kategori.nama_kategori]',
      array(
        'required'         => '%s Harus Diisi',
        'is_unque'         => '%s <strong>' . $this->input->post('nama_kategori') .
          '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      //End Validasi


      $data = array(
        'title'             => 'Detail Order',
        'keywords'          => 'Detail Order',
        'id_user'           => $id_user,
        'header_transaksi'  => $header_transaksi,
        'transaksi'         => $transaksi,
        'isi'               => 'myaccount/detail'
      );
      $this->load->view('layout/wrapper', $data, FALSE);
    } else {

      $i              = $this->input;

      $data  = array(
        'id_header_transaksi'      => $header_transaksi->id_header_transaksi,
        // 'status_bayar'               => $i->post('status_bayar'),
        'status_url'                => $i->post('status_url')
      );
      $this->header_transaksi_model->edit($data);
      $this->session->set_flashdata('sukses', 'Download Berhasil');
      redirect(base_url('myaccount/order'), 'refresh');
    }
  }
  //Konfirmasi Pembayaran
  public function konfirmasi($kode_transaksi)
  {
    $id_user            = $this->session->userdata('id_user');
    $header_transaksi   = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    $rekening           = $this->rekening_model->get_all();

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'jumlah_bayar',
      'Jumlah Bayar',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'nama_bank',
      'Nama Bank',
      'required',
      array('required'      => '%s harus diisi')
    );


    if ($valid->run()) {
      //Kalau nggak Ganti gambar
      if (!empty($_FILES['bukti_bayar']['name'])) {

        $config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000; //Dalam Kilobyte
        $config['max_width']            = 5000; //Lebar (pixel)
        $config['max_height']           = 5000; //tinggi (pixel)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_bayar')) {

          //End Validasi

          $data = array(
            'title'             => 'Konfirmasi Pembayaran',
            'keywords'          => 'Halaman Konfirmasi Pembayaran',
            'id_user'           => $id_user,
            'header_transaksi'  => $header_transaksi,
            'rekening'          => $rekening,
            'error_upload'      => $this->upload->display_errors(),
            'isi'               => 'myaccount/konfirmasi'
          );
          $this->load->view('layout/wrapper', $data, FALSE);


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

          $data  = array(
            'id_header_transaksi'      => $header_transaksi->id_header_transaksi,
            'status_bayar'             => 'Pending',
            'jumlah_bayar'             => $i->post('jumlah_bayar'),
            'rek_pembayaran'           => $i->post('rek_pembayaran'),
            'rek_pelanggan'            => $i->post('rek_pelanggan'),
            'bukti_bayar'              => $upload_data['uploads']['file_name'],
            'id_rekening'              => $i->post('id_rekening'),
            'tanggal_bayar'            => $i->post('tanggal_bayar'),
            'nama_bank'                => $i->post('nama_bank')
          );
          $this->header_transaksi_model->edit($data);
          $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
          redirect(base_url('myaccount'), 'refresh');
        }
      } else {
        //Update Produk Tanpa Ganti Gambar
        $i     = $this->input;

        $data  = array(
          'id_header_transaksi'      => $header_transaksi->id_header_transaksi,
          'status_bayar'             => 'Konfirmasi',
          'jumlah_bayar'             => $i->post('jumlah_bayar'),
          'rekening_pembayaran'      => $i->post('rekening_pembayaran'),
          'rekening_pelanggan'       => $i->post('rekening_pelanggan'),
          // 'bukti_bayar'              => $upload_data['uploads']['file_name'],
          'id_rekening'              => $i->post('id_rekening'),
          'tanggal_bayar'            => $i->post('tanggal_bayar'),
          'nama_bank'                => $i->post('nama_bank')
        );
        $this->header_transaksi_model->edit($data);
        $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
        redirect(base_url('myaccount'), 'refresh');
      }
    }
    //End Masuk Database
    $data = array(
      'title'             => 'Konfirmasi Pembayaran',
      'keywords'          => 'Halaman Konfirmasi Pembayaran',
      'id_user'           => $id_user,
      'header_transaksi'  => $header_transaksi,
      'rekening'          => $rekening,
      'isi'               => 'myaccount/konfirmasi'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
  //Halaman Profile
  public function profile()
  {
    //Ambil Session data User login
    $id_user    = $this->session->userdata('id_user');
    $user       = $this->user_model->detail($id_user);


    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'nama',
      'Nama',
      'required',
      array('required'      => '%s harus diisi')
    );

    $valid->set_rules(
      'email',
      'Email',
      'required|valid_email',
      array(
        'required'      => '%s harus diisi',
        'valid_email'   => 'Format %s Tidak Valid'
      )
    );

    // $valid->set_rules('password','Password','required',
    //                     array( 'required'      => '%s harus diisi'));

    if ($valid->run() === FALSE) {
      //End Validasi
      // $data = array( 'title'  => 'Update Profile: ' .$user->nama,
      //                'user'   => $user,
      //                'isi'    => 'myaccount/profile'
      //              );
      //              $this->load->view('member/layout/wrapper', $data, FALSE);

      //Masuk Database

    } else {

      $i     = $this->input;

      $data  = array(
        'id_user'        => $id_user,
        'nama'           => $i->post('nama'),
        'email'          => $i->post('email'),
        'telp'           => $i->post('telp'),
        'username'       => $i->post('username'),
        // 'password'       => sha1($i->post('password')),
        'foto_user'      => $i->post('foto_user'),
        'tanggal'        => date('Y-m-d H:i:s'),
        'akses_level'    => $i->post('akses_level')
      );
      $this->user_model->edit($data);
      $this->session->set_flashdata('sukses', 'Profile telah di Update');
      redirect(base_url('myaccount/profile'), 'refresh');

      // }
    }
    //End Masuk Database

    $data = array(
      'title'             => 'Profile Saya',
      'keywords'          => 'Detail Profile saya',
      'user'              => $user,
      'id_user'           => $id_user,
      'isi'               => 'myaccount/profile'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

  public function ubah_password()
  {
    //Ambil Session data User login
    $id_user    = $this->session->userdata('id_user');
    $user       = $this->user_model->detail($id_user);


    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'password',
      'Password',
      'required',
      array('required'      => '%s harus diisi')
    );

    if ($valid->run() === FALSE) {
      //End Validasi
      // $data = array( 'title'  => 'Update Profile: ' .$user->nama,
      //                'user'   => $user,
      //                'isi'    => 'myaccount/profile'
      //              );
      //              $this->load->view('member/layout/wrapper', $data, FALSE);

      //Masuk Database

    } else {

      $i     = $this->input;

      $data  = array(
        'id_user'        => $id_user,
        // 'nama'           => $i->post('nama'),
        // 'email'          => $i->post('email'),
        // 'telp'           => $i->post('telp'),
        // 'username'       => $i->post('username'),
        'password'       => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        // 'foto_user'      => $i->post('foto_user'),
        'tanggal'        => date('Y-m-d H:i:s')
        // 'akses_level'    => $i->post('akses_level')
      );
      $this->user_model->edit($data);
      $this->session->set_flashdata('sukses', 'Profile telah di Update');
      redirect(base_url('myaccount/profile'), 'refresh');

      // }
    }
    //End Masuk Database

    $data = array(
      'title'             => 'Profile Saya',
      'keywords'          => 'Detail Profile saya',
      'id_user'           => $id_user,
      'user'              => $user,
      'isi'               => 'myaccount/ubahpassword'
    );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
}

 /* End of file home.php */
 /* Location: ./application/controllers/Home.php */
