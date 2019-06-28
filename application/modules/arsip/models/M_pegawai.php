<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        $this->db->select("tb_pegawai.id_pegawai, tb_pegawai.nip, tb_pegawai.tempat_lahir,  tb_pegawai.tanggal_lahir ,tb_pegawai.nama, tb_pegawai.email, tb_pegawai.alamat, tb_pegawai.jk, tb_pegawai.id_jabatan, tb_jabatan.jabatan, tb_pegawai.nohp, tb_pegawai.id_seksi, tb_seksi.seksi, tb_pegawai.foto");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_pegawai.id_seksi","left");
        $this->db->join("tb_jabatan","tb_jabatan.id_jabatan=tb_pegawai.id_jabatan","left");
        return $this->db->get('tb_pegawai');
    }
   
    function lihatdatasatu($id_pegawai)
    {
        $this->db->select("tb_pegawai.id_pegawai, tb_pegawai.nip, tb_pegawai.tempat_lahir,  tb_pegawai.tanggal_lahir ,tb_pegawai.nama, tb_pegawai.email, tb_pegawai.alamat, tb_pegawai.jk, tb_pegawai.id_jabatan, tb_jabatan.jabatan, tb_pegawai.nohp, tb_pegawai.id_seksi, tb_seksi.seksi, tb_pegawai.foto");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_pegawai.id_seksi","left");
        $this->db->join("tb_jabatan","tb_jabatan.id_jabatan=tb_pegawai.id_jabatan","left");
        $this->db->where("tb_pegawai.id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai');
    }
    function cekdata($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_pegawai',$array);
    }

    function editdata($id_pegawai,$array)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->update('tb_pegawai',$array);
    }
    function hapus($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->delete('tb_pegawai');
    }
  
}
