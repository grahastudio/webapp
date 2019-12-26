<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar extends CI_Controller{

  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('properti_model');
  }

  public function index()
  {
    $sidebar        = $this->properti_model->terbaru();


    $data = array(  'title'     => 'Halaman Dashboard',
                      'sidebar'     => $sidebar,
                    'isi'       => 'layout/sidebar'
   );

    $this->load->view('layout/sidebar', $data, FALSE);
  }
}

/* end of file Dasbor.php */
/* Location /application/controller/admin/Dabor.php */
