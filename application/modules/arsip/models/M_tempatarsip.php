<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tempatarsip extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {   
        $this->db->select("tb_tempatarsip.id_tempatarsip, tb_tempatarsip.tempatarsip, tb_tempatarsip.id_rak, tb_tempatarsip.keterangan, tb_rak.nama_rak,tb_rak.id_lemari,tb_lemari.nama_lemari,tb_lemari.id_ruangan,tb_ruangan.nama_ruangan");
        $this->db->join("tb_rak","tb_rak.id_rak=tb_tempatarsip.id_rak","left");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        return $this->db->get('tb_tempatarsip');
    }
    function lihatdatasatu($id_tempatarsip)
    {
        $this->db->select("tb_tempatarsip.id_tempatarsip, tb_tempatarsip.tempatarsip, tb_tempatarsip.id_rak, tb_tempatarsip.keterangan, tb_rak.nama_rak,tb_rak.id_lemari,tb_lemari.nama_lemari,tb_lemari.id_ruangan,tb_ruangan.nama_ruangan");
        $this->db->join("tb_rak","tb_rak.id_rak=tb_tempatarsip.id_rak","left");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        $this->db->where("tb_tempatarsip.id_tempatarsip",$id_tempatarsip);
        return $this->db->get('tb_tempatarsip');
    }
    function cekdata($id_tempatarsip)
    {
        $this->db->where("id_tempatarsip",$id_tempatarsip);
        return $this->db->get('tb_tempatarsip')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_tempatarsip',$array);
    }

    function editdata($id_tempatarsip,$array)
    {
        $this->db->where("id_tempatarsip",$id_tempatarsip);
        return $this->db->update('tb_tempatarsip',$array);
    }
    function hapus($id_tempatarsip)
    {
        $this->db->where("id_tempatarsip",$id_tempatarsip);
        return $this->db->delete('tb_tempatarsip');
    }
  
}
