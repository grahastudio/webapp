<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');

	}

	public function index(){

		$user = $this->user_model->get_all();

		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

          $data = array(
                          'title'         => 'Register Member',
                          'deskripsi'     => 'Register Member',
                          'keywords'       => 'Daftar Memeber',
													'user'					=> $user,
                          'isi'           => 'register/listreg'
                       );
         	 $this->load->view('layout/wrapper', $data, FALSE);
		}
		else{
			//get user inputs
      $nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));

			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['email'] = $email;
			$user['password'] = $password;
			$user['code'] = $code;
			$user['active'] = false;
			$id_user = $this->user_model->insert($user);

			//set up email
			$config = array(
		  		'protocol' => 'smtp',
		  		'smtp_host' => 'ssl://smtp.googlemail.com',
		  		'smtp_port' => 465,
		  		'smtp_user' => 'design.atrans@gmail.com', // change it to yours
		  		'smtp_pass' => 'Atrans88', // change it to yours
		  		'mailtype' => 'html',
		  		'charset' => 'iso-8859-1',
		  		'wordwrap' => TRUE
			);

			$message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>
							<p>Password: ".$password."</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."register/activate/".$id_user."/".$code."'>Activate My Account</a></h4>
						</body>
						</html>
						";

		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($config['smtp_user']);
		    $this->email->to($email);
		    $this->email->subject('Signup Verification Email');
		    $this->email->message($message);

		    //sending email
		    if($this->email->send()){
		    	$this->session->set_flashdata('message','Activation code sent to email');
		    }
		    else{
		    	$this->session->set_flashdata('message', $this->email->print_debugger());

		    }

        redirect(base_url('register/sukses'), 'refresh');
		}

	}

	public function activate(){
		$id_user =  $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		$user = $this->user_model->getUser($id_user);

		//if code matches
		if($user['code'] == $code){
			//update user active status
			$data['active'] = true;
			$query = $this->user_model->activate($data, $id_user);

			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect(base_url('register/aktif'), 'refresh');

	}

  public function aktif(){

    $data = array(
                    'title'         => 'Register Member',
                    'deskripsi'     => 'Register Member Marketing',
                    'keywords'       => 'Daftar Memeber Marketing',
                    'isi'           => 'register/aktif'
                 );
     $this->load->view('layout/wrapper', $data, FALSE);

  }

}
