<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


// Pendaftaran Member

    public function getAllUsers(){
      $query = $this->db->get('user');
      return $query->result();
    }

    public function insert($user){
      $this->db->insert('user', $user);
      return $this->db->insert_id();
    }

    public function getUser($id_user){
      $query = $this->db->get_where('user',array('id_user'=>$id_user));
      return $query->row_array();
    }

    public function activate($data, $id_user){
    		$this->db->where('user.id_user', $id_user);
    		return $this->db->update('user', $data);
    	}


    }
