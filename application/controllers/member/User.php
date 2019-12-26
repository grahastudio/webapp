<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
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
    $this->load->model('user_model');
  }
  //get_all data user
  public function index()
  {
    $user = $this->user_model->get_all();
    $data = array( 'title' => 'Data User member ('.count($user).')',
                   'user'  => $user,
                   'isi'   => 'member/user/listuser'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);
  }


  //Tambah User
  public function tambah()
  {

    //Validasi
   $valid = $this->form_validation;

   $valid->set_rules('nama','Nama','required',
                       array( 'required'      => '%s harus diisi'));

   $valid->set_rules('email','Email','required|valid_email|trim|is_unique[user.email]',
                       array( 'required'      => '%s harus diisi',
                       'is_unique'     => '%s <strong>'.$this->input->post('username').
                                           '</strong> sudah digunakan. Gunakan Username yang lain!',
                       'valid_email'   => 'Format %s Tidak Valid'));



   $valid->set_rules('password','Password','required',
                       array( 'required'      => '%s harus diisi'));


   if($valid->run()){

                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //Dalam Kilobyte
                $config['max_width']            = 5000; //Lebar (pixel)
                $config['max_height']           = 5000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('foto_user')) {

     //End Validasi
    $data = array( 'title'        => 'Tambah User',
                   'error_upload' => $this->upload->display_errors(),
                   'isi'          => 'member/user/tambah'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);

                 //Masuk Database

               }else{

                 //Proses Manipulasi Gambar
                 $upload_data    = array('uploads'  =>$this->upload->data() );
                 //Gambar Asli disimpan di folder assets/upload/image
                 //lalu fotoa Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

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

                 $data  = array(
                                   'nama'           => $i->post('nama'),
                                   'foto_user'      => $upload_data['uploads']['file_name'],
                                   'email'          => $i->post('email'),
                                   'username'       => $i->post('username'),
                                   'password'       => sha1($i->post('password')),
                                   'akses_level'    => $i->post('akses_level'),
                                   'code'           => md5(rand(0, 1000)),
                                   'active'         => 1,
                                   'tanggal'        => date('Y-m-d H:i:s')

                               );
                $this->user_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambahkan');
                redirect(base_url('member/user'), 'refresh');

              }}
               //End Masuk Database
               $data = array( 'title'        => 'Tambah User',
                              'isi'          => 'member/user/tambah'
                            );
               $this->load->view('member/layout/wrapper', $data, FALSE);

  }




  //Edit User
  public function edit($id_user)
  {
    $user = $this->user_model->detail($id_user);
    //Validasi
   $valid = $this->form_validation;

   $valid->set_rules('nama','Nama','required',
                       array( 'required'      => '%s harus diisi'));

   $valid->set_rules('email','Email','required|valid_email',
                       array( 'required'      => '%s harus diisi',
                              'valid_email'   => 'Format %s Tidak Valid'));
                              
  $valid->set_rules('password','Anda','required',
                        array( 'required'      => '%s Tidak dapat mengubah data member'));


   if($valid->run()){

     //Kalau nggak Ganti foto
     if(!empty($_FILES['foto_user']['name'])) {

     $config['upload_path']          = './assets/upload/image/';
     $config['allowed_types']        = 'gif|jpg|png|jpeg';
     $config['max_size']             = 5000; //Dalam Kilobyte
     $config['max_width']            = 5000; //Lebar (pixel)
     $config['max_height']           = 5000; //tinggi (pixel)
     $this->load->library('upload', $config);
     if ( ! $this->upload->do_upload('foto_user')) {

     //End Validasi
    $data = array( 'title'  => 'Edit User memberistrator: ' .$user->nama,
                   'user'   => $user,
                   'error_upload' => $this->upload->display_errors(),
                   'isi'    => 'member/user/edit'
                 );
                 $this->load->view('member/layout/wrapper', $data, FALSE);

                 //Masuk Database

               }else{

                 //Proses Manipulasi Gambar
                 $upload_data    = array('uploads'  =>$this->upload->data() );
                 //Gambar Asli disimpan di folder assets/upload/image
                 //lalu foto Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

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

                 // Hapus Gambar Lama Jika Ada upload foto baru
                 if($user->foto_user != "")
                 {
                   unlink('./assets/upload/image/'.$user->foto_user);
                   unlink('./assets/upload/image/thumbs/'.$user->foto_user);
                 }
                 //End Hapus Gambar


                 $data  = array(   'id_user'       => $id_user,
                                   'nama'           => $i->post('nama'),
                                   'telp'           => $i->post('telp'),
                                   'email'          => $i->post('email'),
                                   'username'       => $i->post('username'),
                                   'password'       => sha1($i->post('password')),
                                   'akses_level'    => $i->post('akses_level'),
                                   'active'         => $i->post('status'),
                                   'foto_user'         => $upload_data['uploads']['file_name'],
                                   'tanggal'   => date('Y-m-d H:i:s')
                               );
                $this->user_model->edit($data);
                $this->session->set_flashdata('sukses','Data telah di Update');
                redirect(base_url('member/user'), 'refresh');

               }}else{
                 //Update Siswa Tanpa Ganti Gambar
                 $i     = $this->input;
                 // Hapus Gambar Lama Jika ada upload foto baru
                 if($user->foto_user != "")
                 $data  = array(   'id_user'       => $id_user,
                                   'nama'           => $i->post('nama'),
                                   'telp'           => $i->post('telp'),
                                   'email'          => $i->post('email'),
                                   'username'       => $i->post('username'),
                                   'password'       => sha1($i->post('password')),
                                   'akses_level'    => $i->post('akses_level'),
                                   'active'         => $i->post('status'),
                                   //'foto_user'         => $upload_data['uploads']['file_name'],
                                   'tanggal'   => date('Y-m-d H:i:s')
                               );
                $this->user_model->edit($data);
                $this->session->set_flashdata('sukses','Data telah Diedit');
                redirect(base_url('member/user'), 'refresh');

               }}
               //End Masuk Database
               $data = array( 'title'        => 'Edit User',
                              'user'       => $user,
                              'isi'          => 'member/user/edit'
                            );
               $this->load->view('member/layout/wrapper', $data, FALSE);
  }

        //delete
        public function delete($id_user)
        {
          //Proteksi delete
          $this->check_login->check();

          $user = $this->user_model->detail($id_user);
          $data = array('id_user'   => $user->id_user);

          $this->user_model->delete($data);
          $this->session->set_flashdata('sukses','Data telah di Hapus');
          redirect(base_url('member/user'), 'refresh');
        }


}


/* end of file User.php */
/* Location /application/controller/member/User.php */
