<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  //Load Login Page
  public function index()
  {

    //Validasi
    $valid = $this->form_validation;

    $valid->set_rules(
      'email',
      'Email',
      'required|trim|valid_email',
      array(
        'required'      => '%s harus diisi',
        'valid_email'   => 'Email Harus Valid'
      )
    );

    $valid->set_rules(
      'password',
      'Password',
      'required',
      array('required'      => '%s harus diisi')
    );

    if ($valid->run() == false) {
      //Validasi Gagal
      $data = array(
        'title'       => 'Login',
        'deskripsi'   => 'Login Gama',
        'keywords'    => 'login',
        'isi'         => 'login/login_form'
      );
      $this->load->view('layout/wrapper', $data, FALSE);
    } else {
      //Validasi Berhasil
      $this->_login();
    }
  }
  private function _login()
  {
    $email    = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if ($user) {
      //User Ada
      //Jika User Aktif
      if ($user['active'] == 1) {
        //Cek Password
        if (password_verify($password, $user['password'])) {
          //Password Berhasil
          $data  = [
            'id_user'       => $user['id_user'],
            'email'         => $user['email'],
            'akses_level'   => $user['akses_level'],
            'nama'          => $user['nama']
          ];
          $this->session->set_userdata($data);
          redirect('myaccount');
        } else {
          //Password Salah
          $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger">
          <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Password Salah</div> ');
          redirect('login');
        }
      } else {
        //User tidak Aktif
        $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger">
        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Email Belum di Aktivasi, Silahkan Cek email anda</div> ');
        redirect('login');
      }
    } else {
      //User tidak ada
      $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger">
      <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Email Tidak Terdaftar</div> ');
      redirect('login');
    }
  }

  //logout
  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('akses_level');
    $this->session->unset_userdata('nama');
    $this->session->set_flashdata('message', '<div class="alert alert-icon alert-success"><i class="fe fe-check mr-2" aria-hidden="true"></i> Anda sudah Logout</div> ');
    redirect('login');
  }
}
