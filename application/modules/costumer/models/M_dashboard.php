<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function jumlahcostumer()
    {
        return $this->db->get('co_datacostumer')->num_rows();
    }

   
    function jumlahcostumerunique()
    {
        $this->db->select("DISTINCT(nohp)");
        return $this->db->get('co_datacostumer')->num_rows();
    }
  
    function jumlahcabang()
    {
        return $this->db->get('co_cabang')->num_rows();
    }
    function jumlahuser()
    {
        return $this->db->get('co_user')->num_rows();
    }
    function jumlahuseraudit()
    {
        $this->db->where("rule","Audit");
        return $this->db->get('co_user')->num_rows();
    }
    function jumlahuserhelper()
    {
        $this->db->where("rule","Helper");
        return $this->db->get('co_user')->num_rows();
    }
    function jumlahusermanager()
    {
        $this->db->where("rule","Manager");
        return $this->db->get('co_user')->num_rows();
    }
    function jumlahcostumerbulan($tahun,$bulan)
    {
        return $this->db->query("SELECT id FROM co_datacostumer WHERE YEAR(tanggaltransaksi)=$tahun AND MONTH(tanggaltransaksi)=$bulan ")->num_rows();;
    }
    function jumlahcostumertahun()
    {
        return $this->db->query("SELECT YEAR(tanggaltransaksi) as tahun, count(id) as jumlah FROM co_datacostumer GROUP BY YEAR(tanggaltransaksi) ORDER BY  YEAR(tanggaltransaksi) DESC LIMIT 12");
    }
    function top10custumer()
    {
        $this->db->select("namacostumer, nohp, count(*) as jumlah");
        $this->db->group_by("namacostumer,nohp ");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }
    function top10helper()
    {
        $this->db->select("username, namahelper,jabatan, cabang, count(*) as jumlah");
        $this->db->group_by("username");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }
    function top10helpertahun($tahun)
    {
        $this->db->select("username, namahelper,jabatan, cabang, count(*) as jumlah");
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        $this->db->group_by("username");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }
    function top10helperbulan($tahun,$bulan)
    {
        $this->db->select("username, namahelper,jabatan, cabang, count(*) as jumlah");
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        $this->db->where("MONTH(tanggaltransaksi)",$bulan);
        $this->db->group_by("username");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }

    function cabang()
    {
        $this->db->select("co_cabang.cabang, count(co_datacostumer.id) as jumlah");
        $this->db->from("co_cabang");
        $this->db->join("co_datacostumer","co_cabang.cabang=co_datacostumer.cabang","LEFT");
        $this->db->group_by("co_cabang.cabang");
        $this->db->order_by("count(co_datacostumer.id)","desc");
        return $this->db->get();
    }
    function cabangtahun($tahun)
    {
        
        return $this->db->query("SELECT `co_cabang`.`cabang`, COUNT(tabel1.`id`) AS jumlah FROM `co_cabang` LEFT JOIN (SELECT  `id`, `cabang` FROM `co_datacostumer` WHERE YEAR(`tanggaltransaksi`)='$tahun') AS tabel1 on  `co_cabang`.`cabang`=tabel1.`cabang` GROUP BY `co_cabang`.`cabang` ORDER BY COUNT(tabel1.`id`) DESC");
    }
    function cabangbulan($tahun,$bulan)
    {
        return $this->db->query("SELECT `co_cabang`.`cabang`, COUNT(tabel1.`id`) AS jumlah FROM `co_cabang` LEFT JOIN (SELECT  `id`, `cabang` FROM `co_datacostumer` WHERE YEAR(`tanggaltransaksi`)='$tahun' AND MONTH(`tanggaltransaksi`)='$bulan') AS tabel1 on  `co_cabang`.`cabang`=tabel1.`cabang` GROUP BY `co_cabang`.`cabang`  ORDER BY COUNT(tabel1.`id`)  DESC");
    }
    

    ////////////////////// MANAGER /////////////////
    function jumlahcostumermanager($cabang)
    {
        $this->db->where("cabang",$cabang);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumermanagertahun($cabang,$tahun)
    {
        $this->db->where("cabang",$cabang);
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumermanagerbulan($cabang,$tahun,$bulan)
    {
        $this->db->where("cabang",$cabang);
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        $this->db->where("MONTH(tanggaltransaksi)",$bulan);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumermanagerhari($cabang,$tanggal)
    {
        $this->db->where("tanggaltransaksi",$tanggal);
        $this->db->where("cabang",$cabang);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumermanagerunique($cabang)
    {
        $this->db->select("DISTINCT(nohp)");
        $this->db->where("cabang",$cabang);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumerbulanmanager($tahun,$bulan,$cabang)
    {
        return $this->db->query("SELECT id FROM co_datacostumer WHERE YEAR(tanggaltransaksi)=$tahun AND MONTH(tanggaltransaksi)=$bulan AND cabang='$cabang' ")->num_rows();;
    }
    function jumlahcostumertahunmanager($cabang)
    {
        return $this->db->query("SELECT YEAR(tabel1.tanggaltransaksi) as tahun, count(tabel1.id) as jumlah FROM (SELECT id, tanggaltransaksi FROM co_datacostumer WHERE  cabang='$cabang') as tabel1 GROUP BY YEAR(tabel1.tanggaltransaksi) ORDER BY  YEAR(tabel1.tanggaltransaksi) DESC LIMIT 12");
    }
    function top10helpermanager($cabang)
    {
        $this->db->select("username, namahelper,jabatan, cabang, count(*) as jumlah");
        $this->db->where("cabang",$cabang);
        $this->db->group_by("username");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }
    function top10helpertahunmanager($tahun,$cabang)
    {
        $this->db->select("username, namahelper,jabatan, cabang, count(*) as jumlah");
        $this->db->where("cabang",$cabang);
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        $this->db->group_by("username");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }
    function top10helperbulanmanager($tahun,$bulan,$cabang)
    {
        $this->db->select("username, namahelper,jabatan, cabang, count(*) as jumlah");
        $this->db->where("cabang",$cabang);
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        $this->db->where("MONTH(tanggaltransaksi)",$bulan);
        $this->db->group_by("username");
        $this->db->order_by("count(*)","desc");
        $this->db->limit(10,0);
        return $this->db->get('co_datacostumer');
    }


    ///// helper /////
    function jumlahcostumerhelper($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumerhelpertahun($username,$tahun)
    {
        $this->db->where("username",$username);
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumerhelperbulan($username,$tahun,$bulan)
    {
        $this->db->where("username",$username);
        $this->db->where("YEAR(tanggaltransaksi)",$tahun);
        $this->db->where("MONTH(tanggaltransaksi)",$bulan);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumerhelperhari($username,$tanggal)
    {
        $this->db->where("tanggaltransaksi",$tanggal);
        $this->db->where("username",$username);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumerhelperunique($username)
    {
        $this->db->select("DISTINCT(nohp)");
        $this->db->where("username",$username);
        return $this->db->get('co_datacostumer')->num_rows();
    }
    function jumlahcostumerbulanhelper($tahun,$bulan,$username)
    {
        return $this->db->query("SELECT id FROM co_datacostumer WHERE YEAR(tanggaltransaksi)=$tahun AND MONTH(tanggaltransaksi)=$bulan AND username='$username' ")->num_rows();;
    }
    function jumlahcostumertahunhelper($username)
    {
        return $this->db->query("SELECT YEAR(tabel1.tanggaltransaksi) as tahun, count(tabel1.id) as jumlah FROM (SELECT id, tanggaltransaksi FROM co_datacostumer WHERE  username='$username') as tabel1 GROUP BY YEAR(tabel1.tanggaltransaksi) ORDER BY  YEAR(tabel1.tanggaltransaksi) DESC LIMIT 12");
    }


}
