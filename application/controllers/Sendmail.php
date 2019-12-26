<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller{

  public function index()
  {
    $config = array(

 					'protocol' => 'smtp',
 		  		'smtp_host' => 'ssl://smtp.googlemail.com',
 		  		'smtp_port' => 465,
 		  		'smtp_user' => 'aktivasigrahastudio@gmail.com', // change it to yours
 		  		'smtp_pass' => '0123456789/*', // change it to yours
 		  		'mailtype' => 'html',
 		  		'charset' => 'iso-8859-1'
         );

         $this->load->library('email', $config);
 		    $this->email->set_newline("\r\n");
 		    $this->email->from('aktivasigrahastudio@gmail.com');
 		    //$this->email->to($email);
 				$this->email->to('atransrentalmobil@gmail.com');
 		    $this->email->subject('Signup Verification Email');
 		    $this->email->message('Test Kirim Email');

         $this->email->send();
         echo $this->email->print_debugger();


// $this->load->library('email');
// $config['protocol'] = 'sendmail';
// $config['mailpath'] = '/usr/sbin/sendmail';
// $config['smtp_host']='smtp.googlemail.com';
// $config['smtp_port']='587';
// //$config['smtp_timeout']='30';
// $config['smtp_user']='aktivasigrahastudio@gmail.com';
// $config['smtp_pass']='0123456789/*';
// $config['charset']='utf-8';
// $config['newline']="\r\n";
// $config['wordwrap'] = TRUE;
// $config['mailtype'] = 'html';
// $this->email->initialize($config);
// $this->email->from('aktivasigrahastudio@gmail.com', 'Site name');
// $this->email->to('atransrentalmobil@gmail.com');
// $this->email->subject('Notification Mail');
// $this->email->message('Your message');
// $this->email->send();
// echo $this->email->print_debugger();






  }
}
