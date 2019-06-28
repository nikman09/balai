<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_rak extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata($id_lemari)
    {   
        $this->db->select("tb_rak.id_rak, tb_rak.id_lemari, tb_rak.nama_rak, tb_rak.keterangan,tb_lemari.nama_lemari");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->where("tb_rak.id_lemari",$id_lemari);
        return $this->db->get('tb_rak');
    }
    function lihatdatasatu($id_rak)
    {
        $this->db->where("id_rak",$id_rak);
        return $this->db->get('tb_rak');
    }
    function cekdata($id_rak)
    {
        $this->db->where("id_rak",$id_rak);
        return $this->db->get('tb_rak')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_rak',$array);
    }

    function editdata($id_rak,$array)
    {
        $this->db->where("id_rak",$id_rak);
        return $this->db->update('tb_rak',$array);
    }
    function hapus($id_rak)
    {
        $this->db->where("id_rak",$id_rak);
        return $this->db->delete('tb_rak');
    }
  
}
