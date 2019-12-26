<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('download_model');
    $this->load->model('kategori_model');
  }

  //main page - Download
  public function index()
  {
    $konfigurasi = $this->konfigurasi_model->get_all();
    $get_all        = $this->download_model->home();
    $populardownload    = $this->download_model->populardownload();
    // Listing Download Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('download/index/');
    $config['total_rows']     = count($this->download_model->total());
    $config['per_page']       = 3;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $download                   = $this->download_model->download($limit,$start);
    // End Listing Download dengan paginasi
    $data = array(  'title'       => 'Download - '.$konfigurasi->namaweb,
                    'deskripsi'   => 'Download - '.$konfigurasi->namaweb,
                    'keywords'    => 'Download - '.$konfigurasi->namaweb,
                    'paginasi'    => $this->pagination->create_links(),
                    'download'      => $download,
                    'get_all'     => $get_all,
                    'populardownload' => $populardownload,
                    'isi'         => 'download/listdownload'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }

  // Kategori - Download
  public function kategori($slug_kategori)
  {
    $kategori       = $this->kategori_model->read($slug_kategori);
    $id_kategori    = $kategori->id_kategori;
    $konfigurasi    = $this->konfigurasi_model->get_all();
    $get_all        = $this->download_model->home();
    $populardownload    = $this->download_model->populardownload();
    // Listing Download Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('download/kategori/'.$slug_kategori.'/index/');
    $config['total_rows']     = count($this->download_model->total_kategori($id_kategori));
    $config['per_page']       = 3;
    $config['uri_segment']    = 5;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $download                   = $this->download_model->download_kategori($id_kategori,$limit,$start);
    // End Listing Download
    $data = array(  'title'       => 'Kategori Download - '.$kategori->nama_kategori,
                    'deskripsi'   => 'Kategori Download - '.$kategori->nama_kategori,
                    'keywords'    => 'Kategori Download - '.$kategori->nama_kategori,
                    'paginasi'    => $this->pagination->create_links(),
                    'download'      => $download,
                    'populardownload' => $populardownload,
                    'get_all'     => $get_all,
                    'isi'         => 'download/listkategori'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }

  //main page - detail Download
  public function read($slug_download)
  {

    $download         = $this->download_model->read($slug_download);
    $get_all          = $this->download_model->home();
    $populardownload    = $this->download_model->populardownload();

    $data = array(  'id_user'     => $this->session->userdata('id_user'),
                    'title'       => $download->judul_download,
                    'deskripsi'   => $download->judul_download,
                    'keywords'    => $download->keywords,
                    'download'      => $download,
                    'get_all'     => $get_all,
                    'populardownload' => $populardownload,
                    'tanggal_post'   => date('Y-m-d H:i:s'),
                    'isi'         => 'download/read'
   );


   $this->add_count($slug_download);

   $this->load->view('layout/wrapper', $data, FALSE);
  }

  // This is the counter function..
  function add_count($slug_download)
  {
  // load cookie helper
      $this->load->helper('cookie');
  // this line will return the cookie which has slug name
    $check_visitor = $this->input->cookie(urldecode($slug_download), FALSE);
  // this line will return the visitor ip address
      $ip = $this->input->ip_address();
  // if the visitor visit this article for first time then //
   //set new cookie and update article_views column  ..
  //you might be notice we used slug for cookie name and ip
  //address for value to distinguish between articles  views
      if ($check_visitor == false) {
          $cookie = array(
              "name"   => urldecode($slug_download),
              "value"  => "$ip",
              "expire" =>  time() + 7200,
              "secure" => false
          );
          $this->input->set_cookie($cookie);
          $this->download_model->update_counter(urldecode($slug_download));
      }
  }






}

 /* End of file download.php */
 /* Location: ./application/controllers/Download.php */
