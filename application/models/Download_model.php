<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Download
  public function get_all()
  {
    $this->db->select('download.*,
                       kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->order_by('id_download','ASC');

    $query = $this->db->get();
    return $query->result();
  }

  //listing Download Home
  public function home()
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.foto_user, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'     =>  'publish'));
    $this->db->order_by('id_download','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  public function populardownload()
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'     =>  'publish'));
    $this->db->order_by('download_views','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Download Main Page
  public function download($limit,$start)
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'     =>  'publish'));
    $this->db->order_by('id_download','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Download Main Page
  public function total()
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'     =>  'publish'));
    $this->db->order_by('id_download','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function totalviews()
  {
    $this->db->select('download_views');
    $this->db->from('download');
    $query = $this->db->get();
    return $query->result();
  }

  //listing Kategori Download
  public function download_kategori($id_kategori,$limit,$start)
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'           =>  'publish',
                            'download.id_kategori'      =>  $id_kategori));
    $this->db->order_by('id_download','DESC');
    $this->db->limit($limit,$start);
    $query = $this->db->get();
    return $query->result();
  }

  //Total Kategori Download
  public function total_kategori($id_kategori)
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'           =>  'publish',
                            'download.id_kategori'      =>  $id_kategori));
    $this->db->order_by('id_download','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Read Download
  public function read($slug_download)
  {
    $this->db->select('download.*,kategori.nama_kategori, kategori.slug_kategori, user.nama, user.foto_user');
    $this->db->from('download');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = download.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = download.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_download'           =>  'publish',
                            'download.slug_download'      =>  $slug_download));
    $this->db->order_by('id_download','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  //Detail Download
  public function detail($id_download)
  {
    $this->db->select('*');
    $this->db->from('download');
    $this->db->where('id_download',$id_download);
    $this->db->order_by('id_download','DESC');
    $query = $this->db->get();
    return $query->row();
  }

  //tambah / Insert Data
  public function tambah($data)
  {
    $this->db->insert('download', $data);
  }

    //Edit Data
    public function edit($data)
    {
      $this->db->where('id_download',$data['id_download']);
      $this->db->update('download',$data);
    }

    //Delete Data
    public function delete($data)
    {
      $this->db->where('id_download',$data['id_download']);
      $this->db->delete('download',$data);
    }




    function update_counter($slug_download) {
    // return current Download views
        $this->db->where('slug_download', urldecode($slug_download));
        $this->db->select('download_views');
        $count = $this->db->get('download')->row();
    // then increase by one
        $this->db->where('slug_download', urldecode($slug_download));
        $this->db->set('download_views', ($count->download_views + 1));
        $this->db->update('download');
    }



}

/* end of file Download_model.php */
/* Location /application/controller/admin/Download_model.php */
