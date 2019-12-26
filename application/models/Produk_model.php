<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Produk
  public function get_all()
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama',
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->order_by('id_produk','DESC');

    $query = $this->db->get();
    return $query->result();
  }

  //listing Produk Home
  public function home()
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.foto_user,
                       user.nama'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'     =>  'publish',
                          ));
    $this->db->order_by('id_produk','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  public function popularpost()
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'     =>  'publish',
                            ));
    $this->db->order_by('id_produk','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Produk Main Page
  public function produk($limit,$start)
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama,
                       user.foto_user'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'     =>  'publish'));
    $this->db->order_by('id_produk','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Produk Main Page
  public function total()
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'     =>  'publish'));
    $this->db->order_by('id_produk','DESC');
    $query = $this->db->get();
    return $query->result();
  }



  //listing Kategori Produk
  public function produk_kategori($id_kategori,$limit,$start)
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'           =>  'publish',
                            'produk.id_kategori'      =>  $id_kategori));
    $this->db->order_by('id_produk','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Kategori Produk
  public function total_kategori($id_kategori)
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'           =>  'publish',
                            'produk.id_kategori'      =>  $id_kategori));
    $this->db->order_by('id_produk','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Read Produk
  public function read($slug_produk)
  {
    $this->db->select('produk.*,
                       kategori.nama_kategori,
                       kategori.slug_kategori,
                       user.nama,
                       user.foto_user'
                     );
    $this->db->from('produk');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = produk.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_produk'           =>  'publish',
                            'produk.slug_produk'      =>  $slug_produk));
    $this->db->order_by('id_produk','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  //Detail Produk
  public function detail($id_produk)
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->where('id_produk',$id_produk);
    $this->db->order_by('id_produk','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('produk', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_produk',$data['id_produk']);
      $this->db->update('produk',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_produk',$data['id_produk']);
      $this->db->delete('produk',$data);
    }

}

/* end of file Produk_model.php */
/* Location /application/controller/admin/Produk_model.php */
