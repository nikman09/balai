<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('co_user');
    }
    function lihatdatamanager($cabang)
    {
        $this->db->where("rule","Helper");
        $this->db->where("cabang",$cabang);
        return $this->db->get('co_user');
    }
    function lihatdatacabang($cabang)
    {
        $this->db->where("cabang",$cabang);
        $this->db->where("rule","Helper");
        return $this->db->get('co_user');
    }
    function lihatdatahelper()
    {
        $this->db->where("rule","Helper");
        return $this->db->get('co_user');
    }
    function lihatdatasatu($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('co_user');
    }
    function cekdata($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('co_user')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('co_user',$array);
    }

    function editdata($username,$array)
    {
        $this->db->where("username",$username);
        return $this->db->update('co_user',$array);
    }
    function hapus($username)
    {
        $this->db->where("username",$username);
        return $this->db->delete('co_user');
    }
  
}
