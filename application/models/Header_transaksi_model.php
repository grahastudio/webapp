<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //get_all header_transaksi
  public function get_all()
  {
    $this->db->select(
                      'header_transaksi.*,
                      user.nama,
                      SUM(transaksi.jumlah) AS total_item');
    $this->db->from('header_transaksi');
    //Join Table
    $this->db->join('transaksi','transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
    $this->db->join('user','user.id_user = header_transaksi.id_user', 'left');
    //end Join table
    $this->db->group_by('header_transaksi.id_header_transaksi');

    $query = $this->db->get();
    return $query->result();
  }

  public function user($id_user)
  {
    $this->db->select('header_transaksi.*,
                      SUM(transaksi.jumlah) AS total_item');
    $this->db->from('header_transaksi');
    $this->db->where('header_transaksi.id_user',$id_user);
    //Join Table
    $this->db->join('transaksi','transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
    //end Join table
    $this->db->group_by('header_transaksi.id_header_transaksi');
    $this->db->order_by('id_header_transaksi');
    $query = $this->db->get();
    return $query->result();
  }


  //Detail header_transaksi
  public function detail($id_header_transaksi)
  {
    $this->db->select('*');
    $this->db->from('header_transaksi');
    $this->db->where('id_header_transaksi',$id_header_transaksi);
    $this->db->order_by('id_header_transaksi');
    $query = $this->db->get();
    return $query->row();
  }
  //Detail header_transaksi
  public function kode_transaksi($kode_transaksi)
  {
    $this->db->select('header_transaksi.*,
                      user.nama,
                      rekening.nama_bank AS bank,
                      rekening.nomor_rekening,
                      rekening.nama_pemilik,
                      SUM(transaksi.jumlah) AS total_item');
    $this->db->from('header_transaksi');
    //Join Table
    $this->db->join('transaksi','transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
    $this->db->join('user','user.id_user = header_transaksi.id_user', 'left');
    $this->db->join('rekening','rekening.id_rekening = header_transaksi.id_rekening', 'left');
    //end Join table
    $this->db->group_by('header_transaksi.id_header_transaksi');
    $this->db->where('transaksi.kode_transaksi',$kode_transaksi);
    $this->db->order_by('id_header_transaksi', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('header_transaksi', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_header_transaksi',$data['id_header_transaksi']);
      $this->db->update('header_transaksi',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_header_transaksi',$data['id_header_transaksi']);
      $this->db->delete('header_transaksi',$data);
    }


}

/* end of file Header_transaksi_model.php */
/* Location /application/controller/admin/Header_transaksi_model.php */
