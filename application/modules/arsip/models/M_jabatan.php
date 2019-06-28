<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('tb_jabatan');
    }
    function lihatdatasatu($id_jabatan)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->get('tb_jabatan');
    }
    function cekdata($id_jabatan)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->get('tb_jabatan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_jabatan',$array);
    }

    function editdata($id_jabatan,$array)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->update('tb_jabatan',$array);
    }
    function hapus($id_jabatan)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->delete('tb_jabatan');
    }
  
}
