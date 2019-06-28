<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ruangan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('tb_ruangan');
    }
    function lihatdatasatu($id_ruangan)
    {
        $this->db->where("id_ruangan",$id_ruangan);
        return $this->db->get('tb_ruangan');
    }
    function cekdata($id_ruangan)
    {
        $this->db->where("id_ruangan",$id_ruangan);
        return $this->db->get('tb_ruangan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_ruangan',$array);
    }

    function editdata($id_ruangan,$array)
    {
        $this->db->where("id_ruangan",$id_ruangan);
        return $this->db->update('tb_ruangan',$array);
    }
    function hapus($id_ruangan)
    {
        $this->db->where("id_ruangan",$id_ruangan);
        return $this->db->delete('tb_ruangan');
    }
  
}
