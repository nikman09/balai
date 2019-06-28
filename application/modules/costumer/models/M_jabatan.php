<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('co_jabatan');
    }
    function lihatdatasatu($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('co_jabatan');
    }
    function cekdata($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('co_jabatan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('co_jabatan',$array);
    }

    function editdata($id,$array)
    {
        $this->db->where("id",$id);
        return $this->db->update('co_jabatan',$array);
    }
    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('co_jabatan');
    }
  
}
