<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller{
  //Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo'); //Memanggil Format Harga Singkat
    $this->load->helper('string');//Memanggil Helper String
    $this->load->model('produk_model');
    $this->load->model('kategori_model');
    $this->load->model('header_transaksi_model');
    $this->load->model('transaksi_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('user_model');
  }
  //Halaman Order
  public function index()
  {
    $orderan = $this->cart->contents();
    $id_user = $this->session->userdata('id_user');

    $data   = array(
                    'title'       => 'Order Detail',
                    'keywords'    => 'Keywords',
                    'id_user'     => $id_user,
                    'orderan'     => $orderan,
                    'isi'         => 'order/listorder'
                  );
    $this->load->view('layout/wrapper', $data, FALSE);

  }
  //Halaman Add order
  public function add()
  {

    //Ambil Data dari Form
    $id                 = $this->input->post('id');
    $qty                = $this->input->post('qty');
    $price              = $this->input->post('price');
    $name               = $this->input->post('name');
    $redirect_page      = $this->input->post('redirect_page');
    //Proses Memasukan Ke Keranjang belanja
    $data = array(
                    'id'    => $id ,
                    'qty'   => $qty,
                    'price' => $price,
                    'name'  => $name,
                );
    $this->cart->insert($data);
    //Redirect Page
     redirect(base_url('order'), 'refresh');

  }
  //Fungsi Update cart
  public function update_cart($rowid)
  {
    //Jika Ada data Row Id
    if ($rowid) {
      $data = array(
                      'rowid' => $rowid,
                      'qty'   => $this->input->post('qty')
                     );
      $this->cart->update($data);
      $this->session->set_flashdata('sukses', 'Data Order Berhasil Di Update');
      redirect(base_url('order'), 'refresh');
    }
  }
  //Fungsi Hapus cart
  public function hapus($rowid='')
  {
    if ($rowid) {
      // Hapus Per item
      $this->cart->remove($rowid);
      $this->session->set_flashdata('sukses', 'Data Order Berhasil Di Hapus');
      redirect(base_url('order'), 'refresh');
    }else{
    //Hapus Semua
    $this->cart->destroy();
    $this->session->set_flashdata('sukses', 'Data Order Berhasil Di Hapus');
    redirect(base_url('order'), 'refresh');
    }
  }
  //Fungsi Selesaikan Pesanan
  public function checkout()
  {
    //Cek User Sudah Login belum, Jika Belum redirect to registration
    //Dan Juga sekaligus Login

    //Kondisi Sudah Login
    if ($this->session->userdata('email')) {
        $email        = $this->session->userdata('email');
        $nama         = $this->session->userdata('nama');
        $userlogin    = $this->user_model->sudah_login($email, $nama);

        $orderan  = $this->cart->contents();
        //Validasi
       $this->form_validation->set_rules('alamat','Alamat','required',
                           array( 'required'      => '%s harus diisi'));

       $this->form_validation->set_rules('telp','Nomor HP','required',
                           array( 'required'      => '%s harus diisi'));
        if($this->form_validation->run() === FALSE){
          //End Validasi


        $data = array(
                      'title'     => 'Checkout',
                      'keywords'  =>  'Checkout Order',
                      'orderan'   => $orderan,
                      'userlogin' => $userlogin,
                      'isi'       => 'order/checkout'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
        //Masuk Database
      }else{

        $i     = $this->input;

        $data  = array(   'id_user'           => $userlogin->id_user,
                          'nama'              => $i->post('nama'),
                          'email'             => $i->post('email'),
                          'telp'              => $i->post('telp'),
                          'alamat'            => $i->post('alamat'),
                          'kode_transaksi'    => $i->post('kode_transaksi'),
                          'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                          'jumlah_transaksi'      => $i->post('jumlah_transaksi'),
                          'status_bayar'      => 'Belum',
                          'tanggal_post'      => date('Y-m-d H:i:s')
                      );
      //Proses Masuk Header Transaksi
       $this->header_transaksi_model->tambah($data);
       //Proses Masuk Ke tabel transaksi
         foreach ($orderan as $orderan) {
           $sub_total = $orderan['price'] * $orderan['qty'];
           $data = array(
                          'id_user' => $userlogin->id_user,
                          'kode_transaksi'    => $i->post('kode_transaksi'),
                          'id_produk'         => $orderan['id'],
                          'harga'             => $orderan['price'],
                          'jumlah'            => $orderan['qty'],
                          'total_harga'       => $sub_total,
                          'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                          'tanggal_post'      => date('Y-m-d H:i:s')
                        );
          $this->transaksi_model->tambah($data);
         }
       //End Masuk tabel transaksi
       //Setelah Masuk Tabel Transaksi Kosongkan order
       $this->cart->destroy();
       //end Kosongkan order
       $this->session->set_flashdata('sukses','Checkout Berhasil');
       redirect(base_url('order/sukses'), 'refresh');

        //End Masuk Database
      }
    }else{
      //Kalau Belum Login Maka Harus Register
      $this->session->set_flashdata('sukses', 'Silahkan Login Atau Registrasi terlebih dahulu');
      redirect(base_url('login'), 'refresh');
    }
  }


  //Halaman Order Sukses
  public function sukses()
  {
    $data   = array(
                    'title'       => 'Order Berhasil' ,
                    'keywords'  =>  'Order Berhasil di tambahkan',
                    'isi'         => 'order/sukses'
                  );
    $this->load->view('layout/wrapper', $data, FALSE);

  }

}

 /* End of file order.php */
 /* Location: ./application/controllers/Order.php */
