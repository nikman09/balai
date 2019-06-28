<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        $this->db->select("tb_user.username, tb_user.password, tb_user.nama, tb_user.email, tb_user.alamat, tb_user.jk, tb_user.id_jabatan, tb_jabatan.jabatan, tb_user.nohp, tb_user.id_seksi, tb_seksi.seksi, tb_user.foto, tb_user.rule, tb_user.status ");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_user.id_seksi","left");
        $this->db->join("tb_jabatan","tb_jabatan.id_jabatan=tb_user.id_jabatan","left");
        $this->db->where("tb_user.rule != 'administrator'");
        return $this->db->get('tb_user');
    }
   
    function lihatdatasatu($username)
    {
        $this->db->select("tb_user.username, tb_user.password, tb_user.nama, tb_user.email, tb_user.alamat, tb_user.jk, tb_user.id_jabatan, tb_jabatan.jabatan, tb_user.nohp, tb_user.id_seksi, tb_seksi.seksi, tb_user.foto, tb_user.rule, tb_user.status ");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_user.id_seksi","left");
        $this->db->join("tb_jabatan","tb_jabatan.id_jabatan=tb_user.id_jabatan","left");
        $this->db->where("tb_user.username",$username);
        return $this->db->get('tb_user');
    }
    function cekdata($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('tb_user')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_user',$array);
    }

    function editdata($username,$array)
    {
        $this->db->where("username",$username);
        return $this->db->update('tb_user',$array);
    }
    function hapus($username)
    {
        $this->db->where("username",$username);
        return $this->db->delete('tb_user');
    }
  
}
