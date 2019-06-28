<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata($id_seksi)
    {   
        $this->db->select("tb_kategori.id_kategori, tb_kategori.id_seksi, tb_kategori.nama_kategori, tb_kategori.keterangan,tb_seksi.seksi, tb_kategori.kunci");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_kategori.id_seksi","left");
        $this->db->where("tb_kategori.id_seksi",$id_seksi);
        return $this->db->get('tb_kategori');
    }
    function lihatdatasatu($id_kategori)
    {
        $this->db->where("id_kategori",$id_kategori);
        return $this->db->get('tb_kategori');
    }
    function cekdata($id_kategori)
    {
        $this->db->where("id_kategori",$id_kategori);
        return $this->db->get('tb_kategori')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_kategori',$array);
    }

    function editdata($id_kategori,$array)
    {
        $this->db->where("id_kategori",$id_kategori);
        return $this->db->update('tb_kategori',$array);
    }
    function hapus($id_kategori)
    {
        $this->db->where("id_kategori",$id_kategori);
        return $this->db->delete('tb_kategori');
    }
  
}
