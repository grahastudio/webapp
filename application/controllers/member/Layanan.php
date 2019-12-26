<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller{
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
    $this->load->model('layanan_model');
  }
  //get_all data layanan
  public function index()
  {
    $layanan = $this->layanan_model->get_all();
    $data = array( 'title'      => 'Data Layanan ('.count($layanan).')',
                   'layanan'    => $layanan,
                   'isi'        => 'member/layanan/listlayanan'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);
  }

  //Tambah Layanan
  public function tambah()
  {
    //Validasi
   $valid = $this->form_validation;

   $valid->set_rules('judul_layanan','Judul Layanan','required',
                       array( 'required'        => '%s harus diisi'));

   $valid->set_rules('isi_layanan','Isi Layanan','required',
                       array( 'required'        => '%s harus diisi'));


   if($valid->run()){

                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //Dalam Kilobyte
                $config['max_width']            = 5000; //Lebar (pixel)
                $config['max_height']           = 5000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('gambar')) {

     //End Validasi
    $data = array( 'title'                     => 'Tambah Layanan',
                   'error_upload'              => $this->upload->display_errors(),
                   'isi'                       => 'member/layanan/tambah'
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

                 $data  = array(   'id_user'          => $this->session->userdata('id_user'),
                                   'slug_layanan'     => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
                                   'judul_layanan'    => $i->post('judul_layanan'),
                                   'isi_layanan'      => $i->post('isi_layanan'),
                                   'gambar'           => $upload_data['uploads']['file_name'],
                                   'status_layanan'   => $i->post('status_layanan'),
                                   'keywords'         => $i->post('keywords'),
                                   'tanggal_post'     => date('Y-m-d H:i:s')
                               );
                $this->layanan_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambahkan');
                redirect(base_url('member/layanan'), 'refresh');

              }}
               //End Masuk Database
               $data = array( 'title'        => 'Tambah Layanan',
                              'isi'          => 'member/layanan/tambah'
                            );
               $this->load->view('member/layout/wrapper', $data, FALSE);

  }

  //Edit Layanan
  public function edit($id_layanan)
  {
    $layanan = $this->layanan_model->detail($id_layanan);
      //Validasi
     $valid = $this->form_validation;

     $valid->set_rules('judul_layanan','Judul Layanan','required',
                         array( 'required'      => '%s harus diisi'));

     $valid->set_rules('isi_layanan','Isi Layanan','required',
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
      $data = array( 'title'        => 'Edit Layanan',
                     'layanan'       => $layanan,
                     'error_upload' => $this->upload->display_errors(),
                     'isi'          => 'member/layanan/edit'
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
                   if($layanan->gambar != "")
                   {
                     unlink('./assets/upload/image/'.$layanan->gambar);
                     unlink('./assets/upload/image/thumbs/'.$layanan->gambar);
                   }
                   //End Hapus Gambar

                   $data  = array(   'id_layanan'       => $id_layanan,
                                     'id_user'          => $this->session->userdata('id_user'),
                                     'slug_layanan'     => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
                                     'judul_layanan'    => $i->post('judul_layanan'),
                                     'isi_layanan'      => $i->post('isi_layanan'),
                                     'gambar'           => $upload_data['uploads']['file_name'],
                                     'status_layanan'   => $i->post('status_layanan'),
                                     'keywords'         => $i->post('keywords')
                                 );
                  $this->layanan_model->edit($data);
                  $this->session->set_flashdata('sukses','Data telah Diedit');
                  redirect(base_url('member/layanan'), 'refresh');

                }}else{
                  //Update Layanan Tanpa Ganti Gambar
                  $i     = $this->input;
                  // Hapus Gambar Lama Jika ada upload gambar baru
                  if($layanan->gambar != "")
                  $data  = array(   'id_layanan'        => $id_layanan,
                                    'id_user'           => $this->session->userdata('id_user'),
                                    'slug_layanan'      => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
                                    'judul_layanan'     => $i->post('judul_layanan'),
                                    'isi_layanan'       => $i->post('isi_layanan'),
                                    //'gambar'           => $upload_data['uploads']['file_name'],
                                    'status_layanan'    => $i->post('status_layanan'),
                                    'keywords'          => $i->post('keywords')
                                );
                 $this->layanan_model->edit($data);
                 $this->session->set_flashdata('sukses','Data telah Diedit');
                 redirect(base_url('member/layanan'), 'refresh');

                }}
                 //End Masuk Database
                 $data = array( 'title'        => 'Edit Layanan',
                                'layanan'       => $layanan,

                                'isi'          => 'member/layanan/edit'
                              );
                 $this->load->view('member/layout/wrapper', $data, FALSE);
  }

        //delete
        public function delete($id_layanan)
        {
          //Proteksi delete
          $this->check_login->check();

          $layanan = $this->layanan_model->detail($id_layanan);
          //Hapus gambar

          if($layanan->gambar != "")
          {
            unlink('./assets/upload/image/'.$layanan->gambar);
            unlink('./assets/upload/image/thumbs/'.$layanan->gambar);
          }
          //End Hapus Gambar
          $data = array('id_layanan'   => $layanan->id_layanan);
          $this->layanan_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('member/layanan'), 'refresh');
        }


}


/* end of file Layanan.php */
/* Location /application/controller/member/Layanan.php */
