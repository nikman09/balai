<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cabang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('co_cabang');
    }
    function lihatdatasatu($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('co_cabang');
    }
    function cekdata($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('co_cabang')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('co_cabang',$array);
    }

    function editdata($id,$array)
    {
        $this->db->where("id",$id);
        return $this->db->update('co_cabang',$array);
    }
    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('co_cabang');
    }
  
}
