<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //get_all Menu
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('menu');
    $this->db->order_by('posisi','ASC');
    $query = $this->db->get();
    return $query->result();
  }

  

  //Detail menu
  public function detail($id_menu)
  {
    $this->db->select('*');
    $this->db->from('menu');
    $this->db->where('id_menu',$id_menu);
    $this->db->order_by('id_menu');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('menu', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_menu',$data['id_menu']);
      $this->db->update('menu',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_menu',$data['id_menu']);
      $this->db->delete('menu',$data);
    }

}

/* end of file Menu_model.php */
/* Location /application/controller/admin/Menu_model.php */
