<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('fs_admin');
    }

    function ceklogin($username,$password)
    {
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        return $this->db->get('co_user');
    }

  
}
