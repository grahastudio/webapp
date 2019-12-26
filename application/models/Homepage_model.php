<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //get_all Homepage
  public function get_all()
  {
    $this->db->select('homepage.*,
                        user.nama');
    $this->db->from('homepage');
    // Join
    $this->db->join('user', 'user.id_user = homepage.id_user', 'LEFT');
    //End Join
    $this->db->where('posisi','Welcome');
    $this->db->order_by('id_homepage', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //get_all Homepage Section
  public function section()
  {
    $this->db->select('homepage.*,
                        user.nama');
    $this->db->from('homepage');
    // Join
    $this->db->join('user', 'user.id_user = homepage.id_user', 'LEFT');
    //End Join
    $this->db->where('posisi','Section');
    $this->db->order_by('id_homepage', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  public function top_image()
  {
    $this->db->select('homepage.*,
                        user.nama');
    $this->db->from('homepage');
    // Join
    $this->db->join('user', 'user.id_user = homepage.id_user', 'LEFT');
    //End Join
    $this->db->where('posisi','Homepage');
    $this->db->order_by('id_homepage', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  //get_all Slider
  public function slider()
  {
    $this->db->select('homepage.*,
                        user.nama');
    $this->db->from('homepage');
    // Join
    $this->db->join('user', 'user.id_user = homepage.id_user', 'LEFT');
    //End Join
    $this->db->where('posisi','Homepage');
    $this->db->order_by('id_homepage');
    $this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }

  //Detail Homepage
  public function detail($id_homepage)
  {
    $this->db->select('*');
    $this->db->from('homepage');
    $this->db->where('id_homepage',$id_homepage);
    $this->db->order_by('id_homepage');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('homepage', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_homepage',$data['id_homepage']);
      $this->db->update('homepage',$data);
    }

    //Edit Data
    public function editsection($data)
    {
      $this->db->where('id_homepage',$data['id_homepage']);
      $this->db->update('homepage',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_homepage',$data['id_homepage']);
      $this->db->delete('homepage',$data);
    }


    // Front end

    //Layanan
    public function homepage($limit,$start)
    {
      $this->db->select('homepage.*,user.nama');
      $this->db->from('homepage');
      // Join
      $this->db->join('user', 'user.id_user = homepage.id_user', 'LEFT');
      //End Join
      $this->db->where('homepage.posisi','Homepage');
      $this->db->limit($limit,$start);
      $this->db->order_by('id_homepage', 'DESC');
      $query = $this->db->get();
      return $query->result();
    }

    //Total Homepage
    public function total()
    {
      $this->db->select('homepage.*,user.nama');
      $this->db->from('homepage');
      // Join
      $this->db->join('user', 'user.id_user = homepage.id_user', 'LEFT');
      //End Join
      $this->db->where('homepage.posisi','Homepage');
      $this->db->order_by('id_homepage','DESC');
      $query = $this->db->get();
      return $query->result();
    }

}

/* end of file Homepage_model.php */
/* Location /application/controller/admin/Homepage_model.php */
