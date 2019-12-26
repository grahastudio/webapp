<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //get_all
  public function get_all()
  {
    $query = $this->db->get('konfigurasi');
    return $query->row();
  }
  //Edit
  public function edit($data)
  {
    $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
    $this->db->update('konfigurasi',$data);
  }
  //Menu Berita
  public function menu_berita()
  {
    $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array ( 'berita.status_berita'   =>  'Publish',
                             'berita.jenis_berita'    =>  'Berita'));
    $this->db->group_by('berita.id_kategori');
    $this->db->order_by('id_berita','DESC');
    $query = $this->db->get();
    return $query->result();
  }




  // Seting Menu Atas

    public function menu_atas()
    {
      $this->db->select('*');
      $this->db->from('menu');
      $this->db->where('menu.posisi','Menu Atas');
      $this->db->order_by('posisi','ASC');
      $query = $this->db->get();
      return $query->result();
    }

  // Seting Menu Bawah 1

    public function menu_bawah1()
    {
      $this->db->select('*');
      $this->db->from('menu');
      $this->db->where('menu.posisi','Menu Bawah 1');
      $this->db->order_by('posisi','ASC');
      $query = $this->db->get();
      return $query->result();
    }

      // Seting Menu Bawah 2

    public function menu_bawah2()
    {
      $this->db->select('*');
      $this->db->from('menu');
      $this->db->where('menu.posisi','Menu Bawah 2');
      $this->db->order_by('id_menu','ASC');
      $query = $this->db->get();
      return $query->result();
    }

  //Menu Layanan
  public function menu_layanan()
  {
    $this->db->select('layanan.*,user.nama');
    $this->db->from('layanan');
    // Join
    $this->db->join('user', 'user.id_user = layanan.id_user', 'LEFT');
    //End Join
    $this->db->where('layanan.status_layanan','Publish');
    $this->db->order_by('id_layanan','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //Menu Profil
  public function menu_profil()
  {
    $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array ( 'berita.status_berita'   =>  'Publish',
                             'berita.jenis_berita'    =>  'Profil'));
    $this->db->order_by('id_berita');
    $query = $this->db->get();
    return $query->result();
  }

  public function menu_page()
  {
    $this->db->select('*');
    $this->db->from('page');
    $this->db->order_by('id_page','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function total_kontak()
  {
    $this->db->select('*');
    $this->db->from('kontak');
    $this->db->where('status_read',0);
    $query = $this->db->get();
    return $query->result();
  }

  //listing Berita Main Page
  public function berita_bottom()
  {
    $this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori, user.nama');
    $this->db->from('berita');
    // Join
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    //End Join
    $this->db->where(array( 'status_berita'     =>  'publish'));
    $this->db->order_by('id_berita','DESC');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }


  //Total Data Pendaftaran dan Pesan Masuk
    public function total_unread()
    {





      // $this->db->select('*');
      // $this->db->from('pendaftaran');
      // $this->db->and('pendaftaran');
      //
      // //$this->db->join('kontak','kontak.status_read = pendaftaran.status_read');
      //  $this->db->where('pendaftaran.status_read',0);
      //  $this->db->where('kontak.status_read',0);
      // $query = $this->db->get();
      // return $query->result();

     //
     // $this->db->where('status_read',0);
     // $this->db->where('status_read',0);
     // $this->db->get();
    }


}


/* end of file Konfigurasi_model.php */
/* Location /application/controller/admina/Konfigurasi_model.php */
