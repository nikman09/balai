<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function ceklogin($username,$password)
    {
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        $this->db->join("tb_jabatan","tb_user.id_jabatan=tb_jabatan.id_jabatan","left");
        $this->db->join("tb_seksi","tb_user.id_seksi=tb_seksi.id_seksi","left");
        return $this->db->get('tb_user');
    }
}
