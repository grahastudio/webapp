<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //get_all Rekening
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('rekening');
    $this->db->order_by('id_rekening','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //Detail rekening
  public function detail($id_rekening)
  {
    $this->db->select('*');
    $this->db->from('rekening');
    $this->db->where('id_rekening',$id_rekening);
    $this->db->order_by('id_rekening');
    $query = $this->db->get();
    return $query->row();
  }

  //Read rekening
  public function read($slug_rekening)
  {
    $this->db->select('*');
    $this->db->from('rekening');
    $this->db->where('slug_rekening',$slug_rekening);
    $this->db->order_by('id_rekening');
    $query = $this->db->get();
    return $query->row();
  }


  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('rekening', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_rekening',$data['id_rekening']);
      $this->db->update('rekening',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_rekening',$data['id_rekening']);
      $this->db->delete('rekening',$data);
    }

}

/* end of file Rekening_model.php */
/* Location /application/controller/admin/Rekening_model.php */
