<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_arsip extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {   
        $this->db->select("tb_arsip.id_arsip, tb_arsip.id_kategori, tb_arsip.nama_arsip, tb_arsip.no_arsip, tb_arsip.tanggal_arsip, tb_arsip.media,tb_arsip.deskripsi, tb_arsip.jumlah, tb_arsip.tanggal_aktif, tb_arsip.jenis_arsip, tb_arsip.asli,  tb_arsip.file, tb_arsip.keterangan, tb_kategori.nama_kategori,tb_seksi.seksi,tb_tempatarsip.tempatarsip,tb_ruangan.id_ruangan, tb_rak.nama_rak,tb_rak.id_rak,  tb_lemari.id_lemari, tb_lemari.nama_lemari, tb_ruangan.nama_ruangan,tb_arsip.id_pegawai, tb_pegawai.nama  ");
        $this->db->join("tb_kategori","tb_kategori.id_kategori=tb_arsip.id_kategori");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_kategori.id_seksi");
        $this->db->join("tb_tempatarsip","tb_tempatarsip.id_tempatarsip=tb_arsip.id_tempatarsip","left");
        $this->db->join("tb_rak","tb_rak.id_rak=tb_tempatarsip.id_rak","left");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        $this->db->join("tb_pegawai","tb_pegawai.id_pegawai=tb_arsip.id_pegawai","left");
        return $this->db->get('tb_arsip');
    }
    function lihatdatasatu($id_arsip)
    {    $this->db->select("tb_arsip.id_arsip, tb_arsip.id_kategori, tb_arsip.nama_arsip, tb_arsip.no_arsip, tb_arsip.tanggal_arsip, tb_arsip.media,tb_arsip.deskripsi, tb_arsip.jumlah, tb_arsip.tanggal_aktif, tb_arsip.jenis_arsip, tb_arsip.asli,  tb_arsip.file, tb_arsip.keterangan, tb_kategori.nama_kategori,tb_seksi.seksi,tb_tempatarsip.tempatarsip, tb_rak.nama_rak, tb_lemari.nama_lemari, tb_ruangan.nama_ruangan,tb_arsip.id_pegawai, tb_pegawai.nama, tb_ruangan.id_ruangan, tb_lemari.id_lemari,tb_rak.id_rak, tb_tempatarsip.id_tempatarsip,tb_seksi.id_seksi ");
        $this->db->join("tb_kategori","tb_kategori.id_kategori=tb_arsip.id_kategori");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_kategori.id_seksi");
        $this->db->join("tb_tempatarsip","tb_tempatarsip.id_tempatarsip=tb_arsip.id_tempatarsip","left");
        $this->db->join("tb_rak","tb_rak.id_rak=tb_tempatarsip.id_rak","left");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        $this->db->join("tb_pegawai","tb_pegawai.id_pegawai=tb_arsip.id_pegawai","left");
        $this->db->where("tb_arsip.id_arsip",$id_arsip);
        return $this->db->get('tb_arsip');
    }

    function lihatdatafilter($id_seksi = 'null',$id_kategori = 'null',$jenis_arsip = 'null')
    {   
        $this->db->select("tb_arsip.id_arsip, tb_arsip.id_kategori, tb_arsip.nama_arsip, tb_arsip.no_arsip, tb_arsip.tanggal_arsip, tb_arsip.media,tb_arsip.deskripsi, tb_arsip.jumlah, tb_arsip.tanggal_aktif, tb_arsip.jenis_arsip, tb_arsip.asli,  tb_arsip.file, tb_arsip.keterangan, tb_kategori.nama_kategori,tb_seksi.seksi,tb_tempatarsip.tempatarsip,tb_ruangan.id_ruangan, tb_rak.nama_rak,tb_rak.id_rak,  tb_lemari.id_lemari, tb_lemari.nama_lemari, tb_ruangan.nama_ruangan,tb_arsip.id_pegawai,tb_pegawai.nama");
        $this->db->join("tb_kategori","tb_kategori.id_kategori=tb_arsip.id_kategori");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_kategori.id_seksi");
        $this->db->join("tb_tempatarsip","tb_tempatarsip.id_tempatarsip=tb_arsip.id_tempatarsip","left");
        $this->db->join("tb_rak","tb_rak.id_rak=tb_tempatarsip.id_rak","left");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        $this->db->join("tb_pegawai","tb_pegawai.id_pegawai=tb_arsip.id_pegawai","left");
        $this->db->where("tb_seksi.id_seksi","IFNULL($id_seksi,tb_seksi.id_seksi)",false);
        $this->db->where("tb_kategori.id_kategori","IFNULL($id_kategori,tb_kategori.id_kategori)",false);
        $this->db->where("tb_arsip.jenis_arsip","IFNULL($jenis_arsip,tb_arsip.jenis_arsip)",false);
        return $this->db->get('tb_arsip');
    }
    function cekdata($id_arsip)
    {
        $this->db->where("id_arsip",$id_arsip);
        return $this->db->get('tb_arsip')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_arsip',$array);
    }

    function editdata($id_arsip,$array)
    {
        $this->db->where("id_arsip",$id_arsip);
        return $this->db->update('tb_arsip',$array);
    }
    function hapus($id_arsip)
    {
        $this->db->where("id_arsip",$id_arsip);
        return $this->db->delete('tb_arsip');
    }

    function lihatdatauser($rule)
    {   
        $this->db->select("tb_arsip.id_arsip, tb_arsip.id_kategori, tb_arsip.nama_arsip, tb_arsip.no_arsip, tb_arsip.tanggal_arsip, tb_arsip.media,tb_arsip.deskripsi, tb_arsip.jumlah, tb_arsip.tanggal_aktif, tb_arsip.jenis_arsip, tb_arsip.asli,  tb_arsip.file, tb_arsip.keterangan, tb_kategori.nama_kategori,tb_seksi.seksi,tb_tempatarsip.tempatarsip,tb_ruangan.id_ruangan, tb_rak.nama_rak,tb_rak.id_rak,  tb_lemari.id_lemari, tb_lemari.nama_lemari, tb_ruangan.nama_ruangan,tb_arsip.id_pegawai, tb_pegawai.nama  ");
        $this->db->join("tb_kategori","tb_kategori.id_kategori=tb_arsip.id_kategori");
        $this->db->join("tb_seksi","tb_seksi.id_seksi=tb_kategori.id_seksi");
        $this->db->join("tb_tempatarsip","tb_tempatarsip.id_tempatarsip=tb_arsip.id_tempatarsip","left");
        $this->db->join("tb_rak","tb_rak.id_rak=tb_tempatarsip.id_rak","left");
        $this->db->join("tb_lemari","tb_lemari.id_lemari=tb_rak.id_lemari","left");
        $this->db->join("tb_ruangan","tb_ruangan.id_ruangan=tb_lemari.id_ruangan","left");
        $this->db->join("tb_pegawai","tb_pegawai.id_pegawai=tb_arsip.id_pegawai","left");
        $this->db->where("tb_seksi.id_seksi",$rule);
        return $this->db->get('tb_arsip');
    }

    
  
}
