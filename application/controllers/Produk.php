<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller{

  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->model('produk_model');
    $this->load->model('kategori_model');
  }

  //main page - Produk
  public function index()
  {
    $konfigurasi = $this->konfigurasi_model->get_all();
    $get_all        = $this->produk_model->home();
    $popularpost    = $this->produk_model->popularpost();
    // Listing Produk Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('produk/index/');
    $config['total_rows']     = count($this->produk_model->total());
    $config['per_page']       = 3;
    $config['uri_segment']    = 3;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $produk                   = $this->produk_model->produk($limit,$start);
    // End Listing Produk dengan paginasi
    $data = array(  'title'       => 'Produk - '.$konfigurasi->namaweb,
                    'deskripsi'   => 'Produk - '.$konfigurasi->namaweb,
                    'keywords'    => 'Produk - '.$konfigurasi->namaweb,
                    'paginasi'    => $this->pagination->create_links(),
                    'produk'      => $produk,
                    'get_all'     => $get_all,
                    'popularpost' => $popularpost,
                    'isi'         => 'produk/listproduk'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }

  // Kategori - Produk
  public function kategori($slug_kategori)
  {
    $kategori       = $this->kategori_model->read($slug_kategori);
    $id_kategori    = $kategori->id_kategori;
    $konfigurasi    = $this->konfigurasi_model->get_all();
    $get_all        = $this->produk_model->home();
    $popularpost    = $this->produk_model->popularpost();
    // Listing Produk Dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('produk/kategori/'.$slug_kategori.'/index/');
    $config['total_rows']     = count($this->produk_model->total_kategori($id_kategori));
    $config['per_page']       = 3;
    $config['uri_segment']    = 5;
    //Limit dan Start
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
    //End Limit Start
    $this->pagination->initialize($config);

    $produk                   = $this->produk_model->produk_kategori($id_kategori,$limit,$start);
    // End Listing Produk
    $data = array(  'title'       => 'Kategori Produk - '.$kategori->nama_kategori,
                    'deskripsi'   => 'Kategori Produk - '.$kategori->nama_kategori,
                    'keywords'    => 'Kategori Produk - '.$kategori->nama_kategori,
                    'paginasi'    => $this->pagination->create_links(),
                    'produk'      => $produk,
                    'popularpost' => $popularpost,
                    'get_all'     => $get_all,
                    'isi'         => 'produk/listkategori'
   );
   $this->load->view('layout/wrapper', $data, FALSE);
  }

  //main page - detail Produk
  public function read($slug_produk)
  {
    $produk         = $this->produk_model->read($slug_produk);
    $get_all        = $this->produk_model->home();
    $popularpost    = $this->produk_model->popularpost();

    $data = array(  'id_user'     => $this->session->userdata('id_user'),
                    'title'       => $produk->nama_produk,
                    'deskripsi'   => $produk->nama_produk,
                    'keywords'    => $produk->keywords,
                    'produk'      => $produk,
                    'get_all'     => $get_all,
                    'popularpost' => $popularpost,
                    'tanggal_post'   => date('Y-m-d H:i:s'),
                    'isi'         => 'produk/read'
   );

   $this->load->view('layout/wrapper', $data, FALSE);
  }








}

 /* End of file produk.php */
 /* Location: ./application/controllers/Produk.php */
