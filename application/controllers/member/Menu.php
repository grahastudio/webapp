<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    //Proteksi
    if($this->session->userdata('akses_level') != "Superadmin")
    {
      $this->session->set_flashdata('sukses', 'Opps Sayangnya halaman yang anda cari tidak ada');
      redirect(base_url('404'),'refresh');
    }
    //End Proteksi
    $this->load->model('menu_model');
  }
  //Main Page Menu
  public function index()
  {
    $menu = $this->menu_model->get_all();

    //Validasi
    $this->form_validation->set_rules('nama_menu','Nama_Menu','required|is_unique[menu.nama_menu]',
            array ('required'         => '%s Harus Diisi',
                   'is_unque'         => '%s <strong>' .$this->input->post('nama_menu').
                                         '</strong>Nama Menu Sudah Ada. Buat Nama yang lain!'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Data menu ('.count($menu).')',
                  'menu'              => $menu,
                  'isi'               => 'member/menu/listmenu'
     );
     $this->load->view('member/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $data  = array(
                       'nama_menu'    => $i->post('nama_menu'),
                       'url'          => $i->post('url'),
                       'posisi'       => $i->post('posisi')
                   );
    $this->menu_model->tambah($data);
    $this->session->set_flashdata('sukses','Data telah ditambahkan');
    redirect(base_url('member/menu'), 'refresh');
   }
    //End Masuk Database
  }


  //Edit Menu
  public function edit($id_menu)
  {
    $menu = $this->menu_model->detail($id_menu);
    //Validasi
    $this->form_validation->set_rules('nama_menu','Nama_Menu','required',
            array ('required'         => '%s Harus Diisi'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Edit menu',
                  'menu'              => $menu,
                  'isi'               => 'member/menu/edit'
     );
     $this->load->view('member/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;

     $data  = array(    'id_menu'     => $id_menu,
                        'nama_menu'   => $i->post('nama_menu'),
                        'url'         => $i->post('url'),
                        'posisi'      => $i->post('posisi')
                   );
    $this->menu_model->edit($data);
    $this->session->set_flashdata('sukses','Data telah di Update');
    redirect(base_url('member/menu'), 'refresh');
   }
    //End Masuk Database
  }



  //delete
  public function delete($id_menu)
  {
    //Proteksi delete
    $this->check_login->check();

    $menu = $this->menu_model->detail($id_menu);
    $data = array('id_menu'   => $menu->id_menu);

    $this->menu_model->delete($data);
    $this->session->set_flashdata('sukses','Data telah di Hapus');
    redirect(base_url('member/menu'), 'refresh');
  }

}

/* end of file Menu.php */
/* Location /application/controller/member/Menu.php */
