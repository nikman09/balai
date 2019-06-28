<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_costumer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('co_datacostumer');
    }
    function lihatdatasatu($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('co_datacostumer');
    }
    function cekdata($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('co_datacostumer')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('co_datacostumer',$array);
    }

    function editdata($id,$array)
    {
        $this->db->where("id",$id);
        return $this->db->update('co_datacostumer',$array);
    }
    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('co_datacostumer');
    }

    public function listcostumerajax($awal = 'null',$akhir = 'null',$username = 'null',$cabang = 'null')
    {
        $requestData= $_REQUEST;
        $columns = array( 
			// datatable column index  => database column name
				0=>'co_datacostumer.id', 
                1=>'co_datacostumer.tanggaltransaksi', 
                2=> 'co_datacostumer.username',
				3=> 'co_datacostumer.namahelper',
				4=> 'co_datacostumer.jabatan',
				5=> 'co_datacostumer.cabang',
                6=> 'co_datacostumer.noinvoice',
                7=> 'co_datacostumer.namakasir',
                8=> 'co_datacostumer.namacostumer',
                9=> 'co_datacostumer.nohp',
                10=> 'co_datacostumer.merek',
                11=> 'co_datacostumer.type'
        );
        $sql = "SELECT * ";
        $sql.=" FROM co_datacostumer WHERE 1=1 and (co_datacostumer.tanggaltransaksi >= IFNULL(".$awal.",co_datacostumer.tanggaltransaksi) and  co_datacostumer.tanggaltransaksi <= IFNULL(".$akhir.",co_datacostumer.tanggaltransaksi)) and co_datacostumer.username = IFNULL(".$username.",co_datacostumer.username) and co_datacostumer.cabang = IFNULL(".$cabang.",co_datacostumer.cabang)";
        $query=$this->db->query($sql);
        $totalData = $query->num_rows();
        $totalFiltered = $totalData; 
        if( !empty($requestData['search']['value']) ) {
            $sql.= " AND ( co_datacostumer.tanggaltransaksi LIKE '%".tanggalawal($requestData['search']['value'])."%' "; 
            $sql.=" OR co_datacostumer.username LIKE '%".$requestData['search']['value']."%'  "; 	
			$sql.=" OR co_datacostumer.namahelper LIKE '%".$requestData['search']['value']."%'  "; 	
			$sql.=" OR co_datacostumer.jabatan LIKE '%".$requestData['search']['value']."%'  ";
            $sql.=" OR co_datacostumer.noinvoice LIKE '%".$requestData['search']['value']."%'  ";
            $sql.=" OR co_datacostumer.namakasir LIKE '%".$requestData['search']['value']."%'  ";
            $sql.=" OR co_datacostumer.namacostumer LIKE '%".$requestData['search']['value']."%'  ";
            $sql.=" OR co_datacostumer.nohp LIKE '%".$requestData['search']['value']."%'  ";
            $sql.=" OR co_datacostumer.merek LIKE '%".$requestData['search']['value']."%'  ";
			$sql.=" OR co_datacostumer.type LIKE '%".$requestData['search']['value']."%' )  ";				
        }
        $query=$this->db->query($sql);
        $totalFiltered = $query->num_rows();
     	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        $query=$this->db->query($sql);
        $data = array();
		$no=1;
        foreach($query->result_array() as $row) {  // preparing an array
            $nestedData=array(); 
            switch ($this->session->userdata('rule')) {
                case "Audit" :
                    $akd = "
                            <p style='width:80px'>
                                <a href='".base_url('costumer/costumerlihat?id='.$row['id'].'')."' class='btn btn-default btn-xs' title='Lihat'><i class='fa fa-eye'></i></a>
                                <a href='".base_url('costumer/costumeredit?id='.$row['id'].'')."' class='btn btn-default btn-xs' title='Edit'><i class='fa fa-edit'></i></a>
                                <a href='#' class='btn btn-default btn-xs hapus' title='Hapus' id='".$row['id']."'><i class='fa fa-trash-o'></i> </a>
                            </p>";
                     break;
                case "Manager" :
                     $akd = "
                            <p style='width:80px'>
                                <a href='".base_url('costumer/costumerlihat?id='.$row['id'].'')."' class='btn btn-default btn-xs' title='Lihat'><i class='fa fa-eye'></i></a>
                                <a href='".base_url('costumer/costumeredit?id='.$row['id'].'')."' class='btn btn-default btn-xs' title='Edit'><i class='fa fa-edit'></i></a>
                                <a href='#' class='btn btn-default btn-xs hapus' title='Hapus' id='".$row['id']."'><i class='fa fa-trash-o'></i> </a>
                            </p>";
                     break;
                case "Helper" :
                      $akd = "
                            <a href='".base_url('costumer/costumerlihat?id='.$row['id'].'')."' class='btn btn-default btn-xs' title='Lihat'><i class='fa fa-eye'></i></a>";
                break;
            }
             $nestedData[] = $akd;
            $nestedData[] = tgl_indo($row['tanggaltransaksi']);
            $nestedData[] = $row["username"];
			$nestedData[] = $row["namahelper"];
			$nestedData[] = $row["jabatan"];
			$nestedData[] = $row["cabang"];
            $nestedData[] = $row["noinvoice"];
            $nestedData[] = $row["namakasir"];
            $nestedData[] = $row["namacostumer"];
            $nestedData[] = $row["nohp"];
            $nestedData[] = $row["merek"];
            $nestedData[] = $row["type"];
            $data[] = $nestedData;
			$no++;
        }
        $json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ), 
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data 
			);

        echo json_encode($json_data); 
    }

    public function datafilter($awal = 'null',$akhir = 'null',$username = 'null',$cabang = 'null')
    {
        $sql ="SELECT *  FROM co_datacostumer WHERE 1=1 and (co_datacostumer.tanggaltransaksi >= IFNULL(".$awal.",co_datacostumer.tanggaltransaksi) and  co_datacostumer.tanggaltransaksi <= IFNULL(".$akhir.",co_datacostumer.tanggaltransaksi)) and co_datacostumer.username = IFNULL(".$username.",co_datacostumer.username) and co_datacostumer.cabang = IFNULL(".$cabang.",co_datacostumer.cabang)";
        return $this->db->query($sql);
    }
  
}
