<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
    $this->load->model('rekening_model');
    $this->load->model('header_transaksi_model');
  }
  //Ambil Semua Data Transaksi
  public function index()
  {
    $header_transaksi    = $this->header_transaksi_model->get_all();
    $data = array(
                  'title'       => 'Data Transaksi',
                  'header_transaksi'   => $header_transaksi,
                  'isi'         => 'member/transaksi/listtransaksi'
                  );
    $this->load->view('member/layout/wrapper', $data, FALSE);
  }
  //detail Transaksi
  public function detail($kode_transaksi)
  {
    $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    $transaksi        = $this->transaksi_model->kode_transaksi($kode_transaksi);

    $data = array(
                    'title'             => 'Detail Order',
                    'keywords'          => 'Detail Order',
                    'header_transaksi'  => $header_transaksi,
                    'transaksi'         => $transaksi,
                    'isi'               => 'member/transaksi/detail'
   );
   $this->load->view('member/layout/wrapper', $data, FALSE);
  }

  //Update Status Transaksi
  public function status($kode_transaksi)
  {
    $id_user            = $this->session->userdata('id_user');
    $header_transaksi   = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    $rekening           = $this->rekening_model->get_all();

    //Validasi
   $valid = $this->form_validation;

   $valid->set_rules('status_bayar','Nama Bank','required',
                       array( 'required'      => '%s harus diisi'));


   if($valid->run() === FALSE){

     //End Validasi

    $data = array(
                  'title'             => 'Konfirmasi Pembayaran' ,
                  'keywords'          => 'Halaman Konfirmasi Pembayaran',
                  'id_user'           => $id_user,
                  'header_transaksi'  => $header_transaksi,
                  'rekening'          => $rekening,
                  'isi'               => 'member/transaksi/status'
                 );
   $this->load->view('layout/wrapper', $data, FALSE);


   //Masuk Database

  }else{
  //Update Produk Tanpa Ganti Gambar
  $i     = $this->input;

  $data  = array(   'id_header_transaksi'      => $header_transaksi->id_header_transaksi,
                    'status_bayar'             => 'Lunas'
                );
  $this->header_transaksi_model->edit($data);
  $this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
  redirect(base_url('member/transaksi'), 'refresh');

  }
  //End Masuk Database
  $data = array(
               'title'             => 'Konfirmasi Pembayaran' ,
               'keywords'          => 'Halaman Konfirmasi Pembayaran',
               'id_user'           => $id_user,
               'header_transaksi'  => $header_transaksi,
               'rekening'          => $rekening,
               'isi'               => 'member/transaksi/status'
              );
  $this->load->view('layout/wrapper', $data, FALSE);



  }














}
