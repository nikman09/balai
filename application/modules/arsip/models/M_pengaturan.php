<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('tb_pengaturan');
    }
    function lihatdatasatu($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('tb_pengaturan');
    }
    function cekdata($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('tb_pengaturan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_pengaturan',$array);
    }

    function editdata($id,$array)
    {
        $this->db->where("id",$id);
        return $this->db->update('tb_pengaturan',$array);
    }
    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('tb_pengaturan');
    }
  
}
