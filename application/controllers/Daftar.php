<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	//load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('daftar_model');

		//get all users
		$this->data['user'] = $this->daftar_model->getAllUsers();
	}

	//Tambah Pendaftaran
	public function index()
	{

		//$user = $this->daftar_model->get_all();

		//Validasi
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|is_unique[user.email]',
			array(
				'required'         => '%s Harus Diisi',
				'is_unque'         => '%s <strong>' . $this->input->post('email') .
					'</strong>Nama Area Sudah Ada. Buat Nama yang lain!'
			)
		);
		if ($this->form_validation->run() === FALSE) {
			//End Validasi

			$data = array(
				'title'             => 'Daftar',
				'deskripsi'         => 'Desk',
				'keywords'          => 'key',

				'isi'               => 'daftar/listdaftar'
			);
			$this->load->view('layout/wrapper', $data, FALSE);
			//Masuk Database


		} else {


			$akses_level 	= $this->input->post('akses_level');
			$foto_user     = $this->input->post('foto_user');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$username = $this->input->post('username');
			//$slug_user  = url_title($this->input->post('username'), 'dash', TRUE);

			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);


			//insert user to users table and get id
			$user['akses_level'] = 'Member';
			$user['foto_user'] = '1.jpg';
			$user['username'] = substr($email, 0, strpos($email, '@'));
			//$user['slug_user'] = $slug_user;
			$user['nama'] = $nama;
			$user['email'] = $email;
			$user['password'] = $password;
			$user['code'] = $code;
			$user['active'] = false;
			$id_user = $this->daftar_model->insert($user);


			//set up email
			$config = array(
				'protocol' => 'smtp',
				//'smtp_host' => 'ssl://srv65.niagahoster.com',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				//'smtp_user' => 'admin@grahastudio.com', 
				'smtp_user' => 'aktivasigrahastudio@gmail.com',
				//'smtp_pass' => 'dH?0%@@BGEwA',
				'smtp_pass' => '0123456789/*',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$message = 	"
             						<html>
             						<head>
             							<title>Verification Code</title>
             							<style>
							body{
							font-family:Segoe UI;
							}
							.btn{
							background:#1abc9c;
							padding:10px 35px 10px 35px;
							border-radius:30px;
							color:#fff;
							text-decoration:none;
							}
							.btn a{
							color:#fff;
							}
              .btn a:visited{
							color:#fff;
							}

							</style>
             						</head>
             						<body>
             							<h2>terima kasih telah bergabung bersama kami.</h2>
             							<p>info akun anda :</p>
                          <p>nama: " . $nama . "</p>
             							<p>email: " . $email . "</p>
             							<p>silahkan Klik tombol di bawah ini untuk mengaktifkan akun anda.</p>
             							<a class='btn' href='" . base_url() . "daftar/activate/" . $id_user . "/" . $code . "'>aktifkan akun saya</a>
             						</body>
             						</html>
             						";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('signup verification email');
			$this->email->message($message);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('sukses', 'Akun Anda telah berhasil di daftarkan! Silahkan Cek Email untuk Aktivasi Akun anda');
				redirect(base_url('daftar/sukses'), 'refresh');
			} else {
				$this->session->set_flashdata('message', $this->email->print_debugger());
			}
		}
		//End Masuk Database


	}

	public function sukses()
	{
		$data = array(
			'title'             => 'Daftar',
			'deskripsi'         => 'Desk',
			'keywords'          => 'key',

			'isi'               => 'daftar/sukses'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}



	public function activate()
	{
		$id_user =  $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		$user = $this->user_model->getUser($id_user);

		//if code matches
		if ($user['code'] == $code) {
			//update user active status
			$data['active'] = true;
			$query = $this->user_model->activate($data, $id_user);

			if ($query) {
				$this->session->set_flashdata('message', '<i class="fe fe-check-circle"></i>Selamat Akun Anda sudah aktif, Silahkan Login');
			} else {
				$this->session->set_flashdata('message', 'Ada yang salah dalam mengaktifkan akun');
			}
		} else {
			$this->session->set_flashdata('message', 'Akun Tidak dapat di aktifkan karena Kode tidak cocok');
		}

		redirect('login');
	}


	public function lostpassword()
	{

		$data = array(
			'title'         => 'Register Member',
			'deskripsi'     => 'Register Member',
			'keywords'       => 'Daftar Memeber',
			'isi'           => 'daftar/listdaftar'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
/* end of file Pendaftaran.php */
/* Location /application/controller/admin/Pendaftaran.php */
