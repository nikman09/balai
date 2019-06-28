<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_general extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    function datalemariajax($id_ruangan)
      {
        $this->db->where('id_ruangan', $id_ruangan);
        $this->db->order_by("nama_lemari","ASC");
        $hasil = $this->db->get('tb_lemari');
        return $hasil->result();
      }

      function datarakajax($id_lemari)
      {
        $this->db->where('id_lemari', $id_lemari);
        $this->db->order_by("nama_rak","ASC");
        $hasil = $this->db->get('tb_rak');
        return $hasil->result();
      }

      function datatempatarsipajax($id_rak)
      {
        $this->db->where('id_rak', $id_rak);
        $this->db->order_by("tempatarsip","ASC");
        $hasil = $this->db->get('tb_tempatarsip');
        return $hasil->result();
      }

      function datakategoriajax($id_seksi)
      {
        $this->db->where('id_seksi', $id_seksi);
        $this->db->order_by("nama_kategori","ASC");
        $hasil = $this->db->get('tb_kategori');
        return $hasil->result();
      }

      function ambillemari($id_ruangan){
        $this->db->where('id_ruangan', $id_ruangan);
        $this->db->order_by("nama_lemari","ASC");
        return $this->db->get('tb_lemari');
      }

      function ambilrak($id_lemari){
        $this->db->where('id_lemari', $id_lemari);
        $this->db->order_by("nama_rak","ASC");
        return $this->db->get('tb_rak');
      }
      function ambiltempatarsip($id_rak){
        $this->db->where('id_rak', $id_rak);
        $this->db->order_by("tempatarsip","ASC");
        return $this->db->get('tb_tempatarsip');
      }

      function ambilkategori($id_seksi){
        $this->db->where('id_seksi', $id_seksi);
        $this->db->order_by("nama_kategori","ASC");
        return $this->db->get('tb_kategori');
      }
  
}
