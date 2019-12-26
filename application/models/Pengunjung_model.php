<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //get_all Pengunjung
  public function get_all()
  {
    $this->db->select('id,ip_address,date, COUNT(*) as total');
    $this->db->from('ci_sessions');
    $this->db->group_by('ip_address');
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function pageview()
  {
    $this->db->select('*');
    $this->db->from('ci_sessions');
    $query = $this->db->get();
    return $query->result();
  }

}

/* end of file Pengunjung_model.php */
/* Location /application/controller/admin/Pengunjung_model.php */
