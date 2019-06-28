<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lemari extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {   
        $this->db->select("tb_lemari.id_lemari, tb_lemari.id_ruangan, tb_lemari.nama_lemari, tb_lemari.keterangan, tb_lemari.kondisi,tb_ruangan.nama_ruangan");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        return $this->db->get('tb_lemari');
    }
    function lihatdatasatu($id_lemari)
    {
        $this->db->where("id_lemari",$id_lemari);
        return $this->db->get('tb_lemari');
    }
    function cekdata($id_lemari)
    {
        $this->db->where("id_lemari",$id_lemari);
        return $this->db->get('tb_lemari')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_lemari',$array);
    }

    function editdata($id_lemari,$array)
    {
        $this->db->where("id_lemari",$id_lemari);
        return $this->db->update('tb_lemari',$array);
    }
    function hapus($id_lemari)
    {
        $this->db->where("id_lemari",$id_lemari);
        return $this->db->delete('tb_lemari');
    }
  
}
