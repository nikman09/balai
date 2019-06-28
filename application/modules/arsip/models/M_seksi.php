<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_seksi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('tb_seksi');
    }
    function lihatdatasatu($id_seksi)
    {
        $this->db->where("id_seksi",$id_seksi);
        return $this->db->get('tb_seksi');
    }
    function cekdata($id_seksi)
    {
        $this->db->where("id_seksi",$id_seksi);
        return $this->db->get('tb_seksi')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_seksi',$array);
    }

    function editdata($id_seksi,$array)
    {
        $this->db->where("id_seksi",$id_seksi);
        return $this->db->update('tb_seksi',$array);
    }
    function hapus($id_seksi)
    {
        $this->db->where("id_seksi",$id_seksi);
        return $this->db->delete('tb_seksi');
    }
  
}
