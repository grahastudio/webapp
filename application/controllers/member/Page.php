<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

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
    
    $this->load->model('page_model');
  }
  //Main Page Page
  public function index()
  {
    $page = $this->page_model->get_all();

    $data = array( 'title'    => 'Data Halaman ('.count($page).')',
                   'page'   => $page,
                   'isi'      => 'member/page/listpage'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);
  }


  public function tambah(){

    $page = $this->page_model->get_all();

    //Validasi
    $this->form_validation->set_rules('judul_page','Judul Halaman','required|is_unique[page.judul_page]',
            array ('required'         => '%s Harus Diisi',
                                        ));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Tambah Halaman',
                  'page'              => $page,
                  'isi'               => 'member/page/tambah'
     );
     $this->load->view('member/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_page  = url_title($this->input->post('judul_page'), 'dash', TRUE);

     $data  = array(   'slug_page'    => $slug_page,
                       'judul_page'   => $i->post('judul_page'),
                       'isi_page'     => $i->post('isi_page'),
                       'tanggal_post' => date('Y-m-d')
                   );
    $this->page_model->tambah($data);
    $this->session->set_flashdata('sukses','Data Page telah ditambahkan');
    redirect(base_url('member/page'), 'refresh');
   }
    //End Masuk Database

  }


  //Edit Page
  public function edit($id_page)
  {
    $page = $this->page_model->detail($id_page);
    //Validasi
    $this->form_validation->set_rules('judul_page','Judul Halaman','required',
            array ('required'         => '%s Harus Diisi'));
    if($this->form_validation->run() === FALSE){
      //End Validasi

    $data = array('title'             => 'Edit Halaman',
                  'page'              => $page,
                  'isi'               => 'member/page/edit'
     );
     $this->load->view('member/layout/wrapper', $data, FALSE);
     //Masuk Database
   }else {
     $i              = $this->input;
     $slug_page  = url_title($this->input->post('judul_page'), 'dash', TRUE);

     $data  = array(    'id_page'     => $id_page,
                        'slug_page'   => $slug_page,
                        'judul_page'   => $i->post('judul_page'),
                        'isi_page'   => $i->post('isi_page'),
                   );
    $this->page_model->edit($data);
    $this->session->set_flashdata('sukses','Data Page telah di Update');
    redirect(base_url('member/page'), 'refresh');
   }
    //End Masuk Database
  }



  //delete
  public function delete($id_page)
  {
    //Proteksi delete
    $this->check_login->check();

    $page = $this->page_model->detail($id_page);
    $data = array('id_page'   => $page->id_page);

    $this->page_model->delete($data);
    $this->session->set_flashdata('sukses','Data telah di Hapus');
    redirect(base_url('member/page'), 'refresh');
  }

}

/* end of file Page.php */
/* Location /application/controller/member/Page.php */
