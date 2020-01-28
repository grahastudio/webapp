<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
        $this->load->model('user_model');
    }
    //get_all data user
    public function index()
    {
        $member = $this->user_model->member();
        $data = array(
            'title' => 'Member (' . count($member) . ')',
            'member'  => $member,
            'isi'   => 'auth/member/listmember'
        );
        $this->load->view('auth/layout/wrapper', $data, FALSE);
    }
}


/* end of file User.php */
/* Location /application/controller/auth/Member.php */
