<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller{
  //load data
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
    $this->load->model('produk_model');
    $this->load->model('kategori_model');
  }
  //get_all data produk
  public function index()
  {
    $produk = $this->produk_model->get_all();
    $data = array( 'title'    => 'Data Produk ('.count($produk).')',
                   'produk'   => $produk,
                   'isi'      => 'member/produk/listproduk'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);
  }

  //Tambah Produk
  public function tambah()
  {

  $kategori = $this->kategori_model->get_all();

    //Validasi
   $valid = $this->form_validation;

   $valid->set_rules('nama_produk','Nama Produk','required',
                       array( 'required'      => '%s harus diisi'));

   $valid->set_rules('deskripsi','Deskripsi Produk','required',
                       array( 'required'      => '%s harus diisi'));


   if($valid->run()){

                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //Dalam Kilobyte
                $config['max_width']            = 5000; //Lebar (pixel)
                $config['max_height']           = 5000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('gambar')) {

     //End Validasi
    $data = array( 'title'        => 'Tambah Produk',
                   'kategori'     => $kategori,
                   'error_upload' => $this->upload->display_errors(),
                   'isi'          => 'member/produk/tambah'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);

                 //Masuk Database

               }else{

                 //Proses Manipulasi Gambar
                 $upload_data    = array('uploads'  =>$this->upload->data() );
                 //Gambar Asli disimpan di folder assets/upload/image
                 //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

                  $config['image_library']    = 'gd2';
                  $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name'];
                  //Gambar Versi Kecil dipindahkan
                  $config['new_image']        = './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
                  $config['create_thumb']     = TRUE;
                  $config['maintain_ratio']   = TRUE;
                  $config['width']            = 200;
                  $config['height']           = 200;
                  $config['thumb_marker']     = '';

                  $this->load->library('image_lib', $config);

                  $this->image_lib->resize();


                 $i     = $this->input;

                 $data  = array(   'id_user'        => $this->session->userdata('id_user'),
                                   'id_kategori'    => $i->post('id_kategori'),
                                   'slug_produk'    => url_title($this->input->post('nama_produk'), 'dash', TRUE),
                                   'nama_produk'    => $i->post('nama_produk'),
                                   'kode_produk'    => $i->post('kode_produk'),
                                   'deskripsi'      => $i->post('deskripsi'),
                                   'gambar'         => $upload_data['uploads']['file_name'],
                                   'harga'          => $i->post('harga'),
                                   'status_produk'  => $i->post('status_produk'),
                                   'keywords'       => $i->post('keywords'),
                                   'tanggal_post'   => date('Y-m-d H:i:s')
                               );
                $this->produk_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambahkan');
                redirect(base_url('member/produk'), 'refresh');

              }}
               //End Masuk Database
               $data = array( 'title'        => 'Tambah Produk',
                              'kategori'     => $kategori,
                              'isi'          => 'member/produk/tambah'
                            );
               $this->load->view('member/layout/wrapper', $data, FALSE);

  }

  //Edit Produk
  public function edit($id_produk)
  {
    $produk = $this->produk_model->detail($id_produk);
    //Validasi
    $kategori = $this->kategori_model->get_all();

      //Validasi
     $valid = $this->form_validation;

     $valid->set_rules('judul_produk','Judul Produk','required',
                         array( 'required'      => '%s harus diisi'));

     $valid->set_rules('isi_produk','Isi Produk','required',
                         array( 'required'      => '%s harus diisi'));


     if($valid->run()){
                  //Kalau nggak Ganti gambar
                  if(!empty($_FILES['gambar']['name'])) {

                  $config['upload_path']          = './assets/upload/image/';
                  $config['allowed_types']        = 'gif|jpg|png|jpeg';
                  $config['max_size']             = 5000; //Dalam Kilobyte
                  $config['max_width']            = 5000; //Lebar (pixel)
                  $config['max_height']           = 5000; //tinggi (pixel)
                  $this->load->library('upload', $config);
                  if ( ! $this->upload->do_upload('gambar')) {

       //End Validasi
      $data = array( 'title'        => 'Edit Produk',
                     'kategori'     => $kategori,
                     'produk'       => $produk,
                     'error_upload' => $this->upload->display_errors(),
                     'isi'          => 'member/produk/edit'
                   );
                   $this->load->view('member/layout/wrapper', $data, FALSE);

                   //Masuk Database

                 }else{

                   //Proses Manipulasi Gambar
                   $upload_data    = array('uploads'  =>$this->upload->data() );
                   //Gambar Asli disimpan di folder assets/upload/image
                   //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name'];
                    //Gambar Versi Kecil dipindahkan
                    $config['new_image']        = './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 200;
                    $config['height']           = 200;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();


                   $i     = $this->input;

                   // Hapus Gambar Lama Jika Ada upload gambar baru
                   if($produk->gambar != "")
                   {
                     unlink('./assets/upload/image/'.$produk->gambar);
                     unlink('./assets/upload/image/thumbs/'.$produk->gambar);
                   }
                   //End Hapus Gambar

                   $data  = array(   'id_produk'      => $id_produk,
                                     'id_user'        => $this->session->userdata('id_user'),
                                     'id_kategori'    => $i->post('id_kategori'),
                                     'slug_produk'    => url_title($this->input->post('judul_produk'), 'dash', TRUE),
                                     'judul_produk'   => $i->post('judul_produk'),
                                     'isi_produk'     => $i->post('isi_produk'),
                                     'gambar'         => $upload_data['uploads']['file_name'],
                                     'status_produk'  => $i->post('status_produk'),
                                     'jenis_produk'   => $i->post('jenis_produk'),
                                     'keywords'       => $i->post('keywords')
                                 );
                  $this->produk_model->edit($data);
                  $this->session->set_flashdata('sukses','Data telah Diedit');
                  redirect(base_url('member/produk'), 'refresh');

                }}else{
                  //Update Produk Tanpa Ganti Gambar
                  $i     = $this->input;
                  // Hapus Gambar Lama Jika ada upload gambar baru
                  if($produk->gambar != "")
                  $data  = array(   'id_produk'      => $id_produk,
                                    'id_user'        => $this->session->userdata('id_user'),
                                    'id_kategori'    => $i->post('id_kategori'),
                                    'slug_produk'    => url_title($this->input->post('judul_produk'), 'dash', TRUE),
                                    'judul_produk'   => $i->post('judul_produk'),
                                    'isi_produk'     => $i->post('isi_produk'),
                                    //'gambar'         => $upload_data['uploads']['file_name'],
                                    'status_produk'  => $i->post('status_produk'),
                                    'jenis_produk'   => $i->post('jenis_produk'),
                                    'keywords'       => $i->post('keywords')
                                );
                 $this->produk_model->edit($data);
                 $this->session->set_flashdata('sukses','Data telah Diedit');
                 redirect(base_url('member/produk'), 'refresh');

                }}
                 //End Masuk Database
                 $data = array( 'title'        => 'Edit Produk',
                                'kategori'     => $kategori,
                                'produk'       => $produk,
                                'isi'          => 'member/produk/edit'
                              );
                 $this->load->view('member/layout/wrapper', $data, FALSE);
  }

        //delete
        public function delete($id_produk)
        {
          //Proteksi delete
          $this->check_login->check();

          $produk = $this->produk_model->detail($id_produk);
          //Hapus gambar

          if($produk->gambar != "")
          {
            unlink('./assets/upload/image/'.$produk->gambar);
            unlink('./assets/upload/image/thumbs/'.$produk->gambar);
          }
          //End Hapus Gambar
          $data = array('id_produk'   => $produk->id_produk);
          $this->produk_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('member/produk'), 'refresh');
        }


}


/* end of file Produk.php */
/* Location /application/controller/member/Produk.php */
