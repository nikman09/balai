<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Arsip extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_ruangan");
        $this->load->model("m_lemari");
        $this->load->model("m_rak");
        $this->load->model("m_tempatarsip");
        $this->load->model("m_general");
        $this->load->model("m_jabatan");
        $this->load->model("m_seksi");
        $this->load->model("m_kategori");
        $this->load->model("m_arsip");
        $this->load->model("m_user");
        $this->load->model("m_pengaturan");
        $this->load->model("m_pegawai");
      
    }

    // Dashboard
    public function index()
    {   
        $variabel['csrf'] = csrf();
        $rule = $this->session->userdata("rule");
        $seksi = $this->session->userdata("seksi");
        $username = $this->session->userdata("username");
        $variabel['tahun']  = date('Y');
        $this->load->view('dashboard/v_home',$variabel);
      
      
    }
    // End Dashboard

    // Ruangan->
    function contoharsip()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $this->layout->render('contoh/v_contoh',$variabel,'contoh/v_contoh_js');
    }


    function ruangan()
    {
        hakakses('administrator','user');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_ruangan->lihatdata();
        $this->layout->render('ruangan/v_ruangan',$variabel,'ruangan/v_ruangan_js');
    }

    function ruangantambah()
    {
        hakakses('administrator','user');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $this->form_validation->set_rules('id_ruangan','ID Ruangan','required|trim|is_unique[tb_ruangan.id_ruangan]');
            if($this->form_validation->run() != false){
                $array=array(
                    'id_ruangan'=> $this->input->post('id_ruangan'),
                    'nama_ruangan'=> $this->input->post('nama_ruangan'),
                    'kondisi'=> $this->input->post('kondisi'),
                    'keterangan'=> $this->input->post('keterangan')
                    );
                $exec = $this->m_ruangan->tambahdata($array);
                if ($exec) redirect(base_url("arsip/ruangantambah?msg=1"));
                else redirect(base_url("arsip/ruangantambah?msg=0"));
            }else{
                $this->layout->render('ruangan/v_ruangan_tambah',$variabel,'ruangan/v_ruangan_js');
            }
           
    
        } else {
            $this->layout->render('ruangan/v_ruangan_tambah',$variabel,'ruangan/v_ruangan_js');
        }
    }

    function ruanganedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'nama_ruangan'=> $this->input->post('nama_ruangan'),
                'kondisi'=> $this->input->post('kondisi'),
                'keterangan'=> $this->input->post('keterangan')
                );
            $id_ruangan = $this->input->post("id_ruangan");
            $exec = $this->m_ruangan->editdata($id_ruangan,$array);
            if ($exec){
                redirect(base_url("arsip/ruanganedit?id=".$id_ruangan."&msg=1"));
            }
            
      } else {
            $id_ruangan = $this->input->get("id");
            $exec = $this->m_ruangan->lihatdatasatu($id_ruangan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('ruangan/v_ruangan_edit',$variabel,'ruangan/v_ruangan_js');
            } else {
                redirect(base_url("arsip/ruangan"));
            }
      }

    }

    function ruanganhapus()
    {
        hakakses('administrator');
        $id_ruangan = $this->input->get("id");
        $exec = $this->m_ruangan->hapus($id_ruangan);
        redirect(base_url()."arsip/ruangan?msg=1");
    }


    function lemari()
    {
        hakakses('administrator','user');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_lemari->lihatdata();
        $this->layout->render('lemari/v_lemari',$variabel,'lemari/v_lemari_js');
    }

    function lemaritambah()
    {
        hakakses('administrator','user');
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $this->form_validation->set_rules('nama_lemari','Nama Lemari','required|trim|is_unique[tb_lemari.nama_lemari]');
            if($this->form_validation->run() != false){
                $array=array(
                    'id_ruangan'=> $this->input->post('id_ruangan'),
                    'nama_lemari'=> $this->input->post('nama_lemari'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'kondisi'=> $this->input->post('kondisi')
                    );
                $exec = $this->m_lemari->tambahdata($array);
                if ($exec) redirect(base_url("arsip/lemaritambah?msg=1"));
                else redirect(base_url("arsip/lemaritambah?msg=0"));
            }else{
              
                $this->layout->render('lemari/v_lemari_tambah',$variabel,'lemari/v_lemari_js');
            }
    
        } else {
           
            $this->layout->render('lemari/v_lemari_tambah',$variabel,'lemari/v_lemari_js');
        }
    }

    function lemariedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        if ($this->input->post()) {
            $nama_lemari = $this->input->post('nama_lemari');
            $nama_lemari2 = $this->input->post('nama_lemari2');
            if ( $nama_lemari!= $nama_lemari2) {
                $is_unique =  '|is_unique[tb_lemari.nama_lemari]';
             } else {
                $is_unique =  '';
             }
             
            $this->form_validation->set_rules('nama_lemari','Nama Lemari','required|trim'. $is_unique.'');
            if($this->form_validation->run() != false){
                $array=array(
                'id_ruangan'=> $this->input->post('id_ruangan'),
                'nama_lemari'=> $this->input->post('nama_lemari'),
                'keterangan'=> $this->input->post('keterangan'),
                'kondisi'=> $this->input->post('kondisi')
                );
                $id_lemari = $this->input->post("id_lemari");
                $exec = $this->m_lemari->editdata($id_lemari,$array);
                if ($exec){
                    redirect(base_url("arsip/lemariedit?id=".$id_lemari."&msg=1"));
                }
            }else{
                $id_lemari = $this->input->get("id");
                $exec = $this->m_lemari->lihatdatasatu($id_lemari);
                if ($exec->num_rows()>0){
                    $variabel['data'] = $exec->row_array();
                    $this->layout->render('lemari/v_lemari_edit',$variabel,'lemari/v_lemari_js');
                } else {
                    redirect(base_url("arsip/lemari"));
                }
            }
            
      } else {
            $id_lemari = $this->input->get("id");
            $exec = $this->m_lemari->lihatdatasatu($id_lemari);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('lemari/v_lemari_edit',$variabel,'lemari/v_lemari_js');
            } else {
                redirect(base_url("arsip/lemari"));
            }
      }

    }

    function lemarihapus()
    {
        hakakses('administrator');
        $id_lemari = $this->input->get("id");
        $exec = $this->m_lemari->hapus($id_lemari);
        redirect(base_url()."arsip/lemari?msg=1");
    }


    function rak()
    {
        hakakses('administrator','user');
        $variabel['csrf'] = csrf();
        $id_lemari = $this->input->get("id");
        $exec = $this->m_lemari->lihatdatasatu($id_lemari);
        if ($exec->num_rows()>0){
            $variabel['lemari'] = $exec->row_array();
            $variabel['data'] =$this->m_rak->lihatdata($id_lemari);
            $this->layout->render('rak/v_rak',$variabel,'rak/v_rak_js');
        } else {
            redirect(base_url("arsip/lemari"));
        }
      
    }


    function raktambah()
    {
        hakakses('administrator','user');
        $variabel['csrf'] = csrf();
        $id_lemari = $this->input->get("id");
        $exec = $this->m_lemari->lihatdatasatu($id_lemari);
        if ($exec->num_rows()>0){
            $variabel['lemari'] = $exec->row_array();
            if ($this->input->post()){
                $array=array(
                    'id_lemari'=> $this->input->post('id_lemari'),
                    'nama_rak'=> $this->input->post('nama_rak'),
                    'keterangan'=> $this->input->post('keterangan')
                    );
                    $id_lemari =  $this->input->post('id_lemari');
                $exec = $this->m_rak->tambahdata($array);
                if ($exec) redirect(base_url("arsip/raktambah?msg=1&id=$id_lemari"));
                else redirect(base_url("arsip/raktambah?msg=0"));   
            } else {
                $this->layout->render('rak/v_rak_tambah',$variabel,'rak/v_rak_js');
            }
        } else {
            redirect(base_url("arsip/rak"));
        }
       
    }

    function rakedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $id_lemari = $this->input->get("id");
        $exec = $this->m_lemari->lihatdatasatu($id_lemari);
        if ($exec->num_rows()>0){
            $variabel['lemari'] = $exec->row_array();
            if ($this->input->post()){
                $array=array(
                    'nama_rak'=> $this->input->post('nama_rak'),
                    'keterangan'=> $this->input->post('keterangan')
                    );
                $id_lemari =  $this->input->post('id_lemari');
                $id_rak =  $this->input->post('id_rak');
                $exec = $this->m_rak->editdata($id_rak,$array);
                if ($exec) redirect(base_url("arsip/rakedit?msg=1&id=$id_lemari&idrak=$id_rak"));
                else redirect(base_url("arsip/raktambah?msg=0"));   
            } else {
                $id_rak = $this->input->get("idrak");
                $exec = $this->m_rak->lihatdatasatu($id_rak);
                if ($exec->num_rows()>0){
                    $variabel['data'] = $exec->row_array();
                    $this->layout->render('rak/v_rak_edit',$variabel,'rak/v_rak_js');
                } else {
                    redirect(base_url("arsip/rak?id=$id_lemari"));
                }
            }
        } else {
            redirect(base_url("arsip/rak?id=$id_lemari"));
        }

    }

    function rakhapus()
    {
        hakakses('administrator');
        $id_rak = $this->input->get("idrak");
        $id_lemari = $this->input->get("id");
        $exec = $this->m_rak->hapus($id_rak);
        redirect(base_url()."arsip/rak?id=".$id_lemari."&msg=1");
    }


    function tempatarsip()
    {
        hakakses('administrator','user');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_tempatarsip->lihatdata();
        $this->layout->render('tempatarsip/v_tempatarsip',$variabel,'tempatarsip/v_tempatarsip_js');
      
    }
    
    function tempatarsiptambah()
    {
        hakakses('administrator','user');
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $this->form_validation->set_rules('tempatarsip','Tempat Arsip','required|trim|is_unique[tb_tempatarsip.tempatarsip]');
            if($this->form_validation->run() != false){
                $array=array(
                    'tempatarsip'=> $this->input->post('tempatarsip'),
                    'id_rak'=> $this->input->post('id_rak'),
                    'keterangan'=> $this->input->post('keterangan')
                    );
                $exec = $this->m_tempatarsip->tambahdata($array);
                if ($exec) redirect(base_url("arsip/tempatarsiptambah?msg=1"));
                else redirect(base_url("arsip/tempatarsiptambah?msg=0"));
            }else{  
                $variabel['datalemari']=$this->m_general->ambillemari($this->input->post('id_ruangan'));
                $variabel['datarak']=$this->m_general->ambilrak($this->input->post('id_lemari'));
                $this->layout->render('tempatarsip/v_tempatarsip_tambah',$variabel,'tempatarsip/v_tempatarsip_js');
            }
    
        } else {
            $variabel['datalemari']=$this->m_general->ambillemari("");
            $variabel['datarak']=$this->m_general->ambilrak("");
            $this->layout->render('tempatarsip/v_tempatarsip_tambah',$variabel,'tempatarsip/v_tempatarsip_js');
        }
    }

    function tempatarsipedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        if ($this->input->post()) {
            $tempatarsip = $this->input->post('tempatarsip');
            $tempatarsip2 = $this->input->post('tempatarsip2');
            if ( $tempatarsip!= $tempatarsip2) {
                $is_unique =  '|is_unique[tb_tempatarsip.tempatarsip]';
             } else {
                $is_unique =  '';
             }
             
            $this->form_validation->set_rules('tempatarsip','Tempat Arsip','required|trim'. $is_unique.'');
            if($this->form_validation->run() != false){
                $array=array(
                    'tempatarsip'=> $this->input->post('tempatarsip'),
                    'id_rak'=> $this->input->post('id_rak'),
                    'keterangan'=> $this->input->post('keterangan')
                );
                $id_tempatarsip = $this->input->post("id_tempatarsip");
                $exec = $this->m_tempatarsip->editdata($id_tempatarsip,$array);
                if ($exec){
                    redirect(base_url("arsip/tempatarsipedit?id=".$id_tempatarsip."&msg=1"));
                }
            }else{
                $id_tempatarsip = $this->input->get("id");
                $exec = $this->m_tempatarsip->lihatdatasatu($id_tempatarsip);
                if ($exec->num_rows()>0){
                    $variabel['data'] = $exec->row_array();
                    $variabel['datalemari']=$this->m_general->ambillemari($this->input->post('id_ruangan'));
                    $variabel['datarak']=$this->m_general->ambilrak($this->input->post('id_lemari'));
                    $this->layout->render('tempatarsip/v_tempatarsip_edit',$variabel,'tempatarsip/v_tempatarsip_js');
                } else {
                    redirect(base_url("arsip/tempatarsip"));
                }
            }
            
      } else {
            $id_tempatarsip = $this->input->get("id");
            $exec = $this->m_tempatarsip->lihatdatasatu($id_tempatarsip);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $variabel['datalemari']=$this->m_general->ambillemari($variabel['data']['id_ruangan']);
                $variabel['datarak']=$this->m_general->ambilrak($variabel['data']['id_lemari']);
                $this->layout->render('tempatarsip/v_tempatarsip_edit',$variabel,'tempatarsip/v_tempatarsip_js');
            } else {
                redirect(base_url("arsip/tempatarsip"));
            }
      }

    }

    function tempatarsiphapus()
    {
        hakakses('administrator');
        $id_tempatarsip = $this->input->get("id");
        $exec = $this->m_tempatarsip->hapus($id_tempatarsip);
        redirect(base_url()."arsip/tempatarsip?msg=1");
    }

    /////////////////////////////// Api Ruangan Lemari Rak ///////////////////////////////////////
    function ruanganlemari()
    {
      $id=$this->input->post('id_ruangan');
      $data=$this->m_general->datalemariajax($id);
      echo json_encode($data);
    }

    function lemarirak()
    {
      $id=$this->input->post('id_lemari');
      $data=$this->m_general->datarakajax($id);
      echo json_encode($data);
    }

    function raktempatarsip()
    {
      $id=$this->input->post('id_rak');
      $data=$this->m_general->datatempatarsipajax($id);
      echo json_encode($data);
    }

    function seksikategori()
    {
      $id=$this->input->post('id_seksi');
      $data=$this->m_general->datakategoriajax($id);
      echo json_encode($data);
    }


    // Jabatan ///////////////////////////////////////////////////////////////////////////////////////////
    function jabatan()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_jabatan->lihatdata();
        $this->layout->render('jabatan/v_jabatan',$variabel,'jabatan/v_jabatan_js');
    }

    function jabatantambah()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $array=array(
                'jabatan'=> $this->input->post('jabatan')
                );
            $exec = $this->m_jabatan->tambahdata($array);
            if ($exec) redirect(base_url("arsip/jabatantambah?msg=1"));
            else redirect(base_url("arsip/jabatantambah?msg=0"));

        } else {
            $this->layout->render('jabatan/v_jabatan_tambah',$variabel,'jabatan/v_jabatan_js');
        }
    }

    function jabatanedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'jabatan'=> $this->input->post('jabatan')
                );
            $id_jabatan = $this->input->post("id_jabatan");
            $exec = $this->m_jabatan->editdata($id_jabatan,$array);
            if ($exec){
                redirect(base_url("arsip/jabatanedit?id=".$id_jabatan."&msg=1"));
            }
            
      } else {
            $id_jabatan = $this->input->get("id");
            $exec = $this->m_jabatan->lihatdatasatu($id_jabatan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('jabatan/v_jabatan_edit',$variabel,'jabatan/v_jabatan_js');
            } else {
                redirect(base_url("arsip/jabatan"));
            }
      }

    }

    function jabatanhapus()
    {
        hakakses('administrator');
        $id_jabatan = $this->input->get("id");
        $exec = $this->m_jabatan->hapus($id_jabatan);
        redirect(base_url()."arsip/jabatan?msg=1");
    }

    // Seksi ///////////////////////////////////////////////////////////////////////////////////////////////////
    function seksi()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_seksi->lihatdata();
        $this->layout->render('seksi/v_seksi',$variabel,'seksi/v_seksi_js');
    }

    function seksitambah()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $array=array(
                'seksi'=> $this->input->post('seksi')
                );
            $exec = $this->m_seksi->tambahdata($array);
            if ($exec) redirect(base_url("arsip/seksitambah?msg=1"));
            else redirect(base_url("arsip/seksitambah?msg=0"));

        } else {
            $this->layout->render('seksi/v_seksi_tambah',$variabel,'seksi/v_seksi_js');
        }
    }

    function seksiedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'seksi'=> $this->input->post('seksi')
                );
            $id_seksi = $this->input->post("id_seksi");
            $exec = $this->m_seksi->editdata($id_seksi,$array);
            if ($exec){
                redirect(base_url("arsip/seksiedit?id=".$id_seksi."&msg=1"));
            }
            
      } else {
            $id_seksi = $this->input->get("id");
            $exec = $this->m_seksi->lihatdatasatu($id_seksi);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('seksi/v_seksi_edit',$variabel,'seksi/v_seksi_js');
            } else {
                redirect(base_url("arsip/seksi"));
            }
      }

    }

    function seksihapus()
    {
        hakakses('administrator');
        $id_seksi = $this->input->get("id");
        $exec = $this->m_seksi->hapus($id_seksi);
        redirect(base_url()."arsip/seksi?msg=1");
    }

    /// Kategori
    function kategori()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $id_seksi = $this->input->get("id");
        $exec = $this->m_seksi->lihatdatasatu($id_seksi);
        if ($exec->num_rows()>0){
            $variabel['seksi'] = $exec->row_array();
            $variabel['data'] =$this->m_kategori->lihatdata($id_seksi);
            $this->layout->render('kategori/v_kategori',$variabel,'kategori/v_kategori_js');
        } else {
            redirect(base_url("arsip/seksi"));
        }
      
    }


    function kategoritambah()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $id_seksi = $this->input->get("id");
        $exec = $this->m_seksi->lihatdatasatu($id_seksi);
        $username = $this->session->userdata("username");
        if ($exec->num_rows()>0){
            $variabel['seksi'] = $exec->row_array();
            if ($this->input->post()){
                $array=array(
                    'id_seksi'=> $this->input->post('id_seksi'),
                    'nama_kategori'=> $this->input->post('nama_kategori'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'kunci'=> $this->input->post('kunci'),
                    'user_create'=>$username,
                    'user_update'=>$username
                    );
                    
                    $id_seksi =  $this->input->post('id_seksi');
                $exec = $this->m_kategori->tambahdata($array);
                if ($exec) redirect(base_url("arsip/kategoritambah?msg=1&id=$id_seksi"));
                else redirect(base_url("arsip/kategoritambah?msg=0"));   
            } else {
                $this->layout->render('kategori/v_kategori_tambah',$variabel,'kategori/v_kategori_js');
            }
        } else {
            redirect(base_url("arsip/kategori"));
        }
       
    }

    function kategoriedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $id_seksi = $this->input->get("id");
        $username = $this->session->userdata("username");
        $exec = $this->m_seksi->lihatdatasatu($id_seksi);
        if ($exec->num_rows()>0){
            $variabel['seksi'] = $exec->row_array();
            if ($this->input->post()){
                $array=array(
                    'nama_kategori'=> $this->input->post('nama_kategori'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'kunci'=> $this->input->post('kunci'),
                    'user_update'=>$username
                    );
                $id_seksi =  $this->input->post('id_seksi');
                $id_kategori =  $this->input->post('id_kategori');
                $exec = $this->m_kategori->editdata($id_kategori,$array);
                if ($exec) redirect(base_url("arsip/kategoriedit?msg=1&id=$id_seksi&idkategori=$id_kategori"));
                else redirect(base_url("arsip/kategoritambah?msg=0"));   
            } else {
                $id_kategori = $this->input->get("idkategori");
                $exec = $this->m_kategori->lihatdatasatu($id_kategori);
                if ($exec->num_rows()>0){
                    $variabel['data'] = $exec->row_array();
                    $this->layout->render('kategori/v_kategori_edit',$variabel,'kategori/v_kategori_js');
                } else {
                    redirect(base_url("arsip/kategori?id=$id_seksi"));
                }
            }
        } else {
            redirect(base_url("arsip/kategori?id=$id_seksi"));
        }

    }

    function kategorihapus()
    {
        hakakses('administrator');
        $id_kategori = $this->input->get("idkategori");
        $id_seksi = $this->input->get("id");
        $exec = $this->m_kategori->hapus($id_kategori);
        redirect(base_url()."arsip/kategori?id=".$id_seksi."&msg=1");
    }

    ////////////////Arsip
    function berkas()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['seksi'] = $this->m_seksi->lihatdata();
        if ($this->input->post()){
            $variabel['datakategori']=$this->m_general->ambilkategori($this->input->post('id_seksi'));
            $this->input->post('id_seksi')==""? $id_seksi = "null":$id_seksi = "'".$this->input->post('id_seksi')."'";
            $this->input->post('id_kategori')==""? $id_kategori = "null":$id_kategori = "'".$this->input->post('id_kategori')."'";
            $this->input->post('jenis_arsip')==""? $jenis_arsip = "null":$jenis_arsip = "'".$this->input->post('jenis_arsip')."'";
            $variabel['data'] = $this->m_arsip->lihatdatafilter($id_seksi,$id_kategori,$jenis_arsip);
            
            $this->layout->render('berkas/v_berkas',$variabel,'berkas/v_berkas_js');
        } else {
            $variabel['datakategori']=$this->m_general->ambilkategori("");
            $variabel['data'] = $this->m_arsip->lihatdata();
            $this->layout->render('berkas/v_berkas',$variabel,'berkas/v_berkas_js');
        }
       
      
    }

    function berkastambah()
    {
        hakakses('administrator');
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        $variabel['seksi'] = $this->m_seksi->lihatdata();
        $variabel['pegawai'] = $this->m_pegawai->lihatdata();
        $username = $this->session->userdata("username");
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $this->form_validation->set_rules('nama_arsip','nama Arsip','required');
            if($this->form_validation->run() != false){
                $array=array(
                    'id_kategori'=> $this->input->post('id_kategori'),
                    'nama_arsip'=> $this->input->post('nama_arsip'),
                    'no_arsip'=> $this->input->post('no_arsip'),
                    'deskripsi'=> $this->input->post('deskripsi'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'media'=> $this->input->post('media'),
                    'jumlah'=> $this->input->post('jumlah'),
                    'tanggal_arsip'=> tanggalawal($this->input->post('tanggal_arsip')),
                    'tanggal_aktif'=> tanggalawal($this->input->post('tanggal_aktif')),
                    'jenis_arsip'=> $this->input->post('jenis_arsip'),
                    'asli'=> $this->input->post('asli'),
                    'id_tempatarsip'=> $this->input->post('id_tempatarsip'),
                    'user_create'=>  $username,
                    'user_update'=>  $username,
                    'id_pegawai'=> $this->input->post('id_pegawai'),
                    );

                    $config['upload_path'] = './assets/arsip';
                    $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx|xls|xlsx|ppt|pptx|zip|rar';
                    $this->load->library('upload', $config);
                    $this->upload->do_upload("fileberkas");
                    $upload = $this->upload->data();
                    $file = $upload["raw_name"].$upload["file_ext"];
                    $array['file']=$file;
                    $exec = $this->m_arsip->tambahdata($array);
                    if ($exec) redirect(base_url("arsip/berkastambah?msg=1"));
                    else redirect(base_url("arsip/berkastambah?msg=0"));

            }else{  
                $variabel['datalemari']=$this->m_general->ambillemari($this->input->post('id_ruangan'));
                $variabel['datarak']=$this->m_general->ambilrak($this->input->post('id_lemari'));
                $variabel['datakategori']=$this->m_general->ambilkategori($this->input->post('id_seksi'));
                $variabel['datatempatarsip']=$this->m_general->ambiltempatarsip($this->input->post('id_rak'));
                $this->layout->render('tempatarsip/v_tempatarsip_tambah',$variabel,'tempatarsip/v_tempatarsip_js');
            }
    
        } else {
            $variabel['datalemari']=$this->m_general->ambillemari("");
            $variabel['datarak']=$this->m_general->ambilrak("");
            $variabel['datakategori']=$this->m_general->ambilkategori("");
            $variabel['datatempatarsip']=$this->m_general->ambiltempatarsip("");
            $this->layout->render('berkas/v_berkas_tambah',$variabel,'berkas/v_berkas_js');
        }
    }

    function berkasedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        $variabel['seksi'] = $this->m_seksi->lihatdata();
        $variabel['pegawai'] = $this->m_pegawai->lihatdata();
        $username = $this->session->userdata("username");
        if ($this->input->post()) {
            $array=array(
                'id_kategori'=> $this->input->post('id_kategori'),
                'nama_arsip'=> $this->input->post('nama_arsip'),
                'no_arsip'=> $this->input->post('no_arsip'),
                'deskripsi'=> $this->input->post('deskripsi'),
                'keterangan'=> $this->input->post('keterangan'),
                'media'=> $this->input->post('media'),
                'jumlah'=> $this->input->post('jumlah'),
                'tanggal_arsip'=> tanggalawal($this->input->post('tanggal_arsip')),
                'tanggal_aktif'=> tanggalawal($this->input->post('tanggal_aktif')),
                'jenis_arsip'=> $this->input->post('jenis_arsip'),
                'asli'=> $this->input->post('asli'),
                'id_tempatarsip'=> $this->input->post('id_tempatarsip'),
                'user_update'=>  $username,
                'id_pegawai'=> $this->input->post('id_pegawai')
            );
            $id_arsip = $this->input->post("id_arsip");
            $config['upload_path'] = './assets/arsip';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx|xls|xlsx|ppt|pptx';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("fileberkas"))
            {
                $upload = $this->upload->data();
                $file  = $upload["raw_name"].$upload["file_ext"];
                $array['file']=$file;

                $query2 = $this->m_arsip->lihatdatasatu($id_arsip);
                $row2 = $query2->row();
                $berkas1temp = $row2->file;
                $path1 ='./assets/arsip/'.$berkas1temp.'';
                echo "$path1";
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder produk
                }
            }
            $exec = $this->m_arsip->editdata($id_arsip,$array);
            if ($exec){
               redirect(base_url("arsip/berkasedit?id=".$id_arsip."&msg=1"));
            }
            
      } else {
            $id_arsip = $this->input->get("id");
            $exec = $this->m_arsip->lihatdatasatu($id_arsip);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $variabel['datalemari']=$this->m_general->ambillemari($variabel['data']['id_ruangan']);
                $variabel['datarak']=$this->m_general->ambilrak($variabel['data']['id_lemari']);
                $variabel['datatempatarsip']=$this->m_general->ambiltempatarsip($variabel['data']['id_rak']);
                $variabel['datakategori']=$this->m_general->ambilkategori($variabel['data']['id_seksi']);
                $this->layout->render('berkas/v_berkas_edit',$variabel,'berkas/v_berkas_js');
            } else {
                redirect(base_url("arsip/berkas"));
            }
      }

    }

    function berkashapus()
    {
        hakakses('administrator');
        $id = $this->input->get("id");
        $query2 = $this->m_arsip->lihatdatasatu($id);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/arsip/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_arsip->hapus($id);
        redirect(base_url()."arsip/berkas?msg=1");
    }

    function berkasuser()
    {
        hakakses('user');
        $variabel['csrf'] = csrf();
        $variabel['seksi'] = $this->m_seksi->lihatdata();
        $variabel['id_seksi'] =  $this->session->userdata("id_seksi");;
        $id_seksi = $this->session->userdata("id_seksi");
        if ($this->input->post()){
            $variabel['datakategori']=$this->m_general->ambilkategori($id_seksi);
            $id_seksi = "'".$id_seksi."'";
            $this->input->post('id_kategori')==""? $id_kategori = "null":$id_kategori = "'".$this->input->post('id_kategori')."'";
            $this->input->post('jenis_arsip')==""? $jenis_arsip = "null":$jenis_arsip = "'".$this->input->post('jenis_arsip')."'";
            $variabel['data'] = $this->m_arsip->lihatdatafilter($id_seksi,$id_kategori,$jenis_arsip);
            
            $this->layout->render('berkasuser/v_berkas',$variabel,'berkasuser/v_berkas_js');
        } else {
            $variabel['datakategori']=$this->m_general->ambilkategori($id_seksi);
            $variabel['data'] = $this->m_arsip->lihatdatauser($id_seksi);
            $this->layout->render('berkasuser/v_berkas',$variabel,'berkasuser/v_berkas_js');
        }
      
    }

    function berkasusertambah()
    {
        hakakses('user');
        $variabel['ruangan'] = $this->m_ruangan->lihatdata();
        $variabel['seksi'] = $this->m_seksi->lihatdata();
        $variabel['pegawai'] = $this->m_pegawai->lihatdata();
        $username = $this->session->userdata("username");
        $variabel['id_seksi'] =  $this->session->userdata("id_seksi");;
        $id_seksi = $this->session->userdata("id_seksi");
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $this->form_validation->set_rules('nama_arsip','nama Arsip','required');
            if($this->form_validation->run() != false){
                $array=array(
                    'id_kategori'=> $this->input->post('id_kategori'),
                    'nama_arsip'=> $this->input->post('nama_arsip'),
                    'no_arsip'=> $this->input->post('no_arsip'),
                    'deskripsi'=> $this->input->post('deskripsi'),
                    'keterangan'=> $this->input->post('keterangan'),
                    'media'=> $this->input->post('media'),
                    'jumlah'=> $this->input->post('jumlah'),
                    'tanggal_arsip'=> tanggalawal($this->input->post('tanggal_arsip')),
                    'tanggal_aktif'=> tanggalawal($this->input->post('tanggal_aktif')),
                    'jenis_arsip'=> $this->input->post('jenis_arsip'),
                    'asli'=> $this->input->post('asli'),
                    'id_tempatarsip'=> $this->input->post('id_tempatarsip'),
                    'user_create'=>  $username,
                    'user_update'=>  $username,
                    'id_pegawai'=> $this->input->post('id_pegawai'),
                    );

                    $config['upload_path'] = './assets/arsip';
                    $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx|xls|xlsx|ppt|pptx';
                    $this->load->library('upload', $config);
                    $this->upload->do_upload("fileberkas");
                    $upload = $this->upload->data();
                    $file = $upload["raw_name"].$upload["file_ext"];
                    $array['file']=$file;
                    $exec = $this->m_arsip->tambahdata($array);
                    if ($exec) redirect(base_url("arsip/berkasusertambah?msg=1"));
                    else redirect(base_url("arsip/berkasusertambah?msg=0"));

            }else{  
                $variabel['datalemari']=$this->m_general->ambillemari($this->input->post('id_ruangan'));
                $variabel['datarak']=$this->m_general->ambilrak($this->input->post('id_lemari'));
                $variabel['datakategori']=$this->m_general->ambilkategori($id_seksi);
                $variabel['datatempatarsip']=$this->m_general->ambiltempatarsip($this->input->post('id_rak'));
                $this->layout->render('tempatarsip/v_tempatarsip_tambah',$variabel,'tempatarsip/v_tempatarsip_js');
            }
    
        } else {
            $variabel['datalemari']=$this->m_general->ambillemari("");
            $variabel['datarak']=$this->m_general->ambilrak("");
            $variabel['datakategori']=$this->m_general->ambilkategori($id_seksi);
            $variabel['datatempatarsip']=$this->m_general->ambiltempatarsip("");
            $this->layout->render('berkasuser/v_berkas_tambah',$variabel,'berkasuser/v_berkas_js');
        }
    }


    function arsiplihat()
    {
        $id_arsip = $this->input->post("id_arsip");
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_arsip->lihatdatasatu($id_arsip)->row_array();
        $this->load->view("berkas/v_berkas_lihat",$variabel);
    }



    function user()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_user->lihatdata();
        $this->layout->render('user/v_user',$variabel,'user/v_user_js');
    }

    

    function usertambah()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
                $array=array(
                    'username'=> $this->input->post('username'),
                    'password'=> md5($this->input->post('password')),
                    'nama'=> $this->input->post('nama'),
                    'email'=> $this->input->post('email'),
                    'alamat'=>$this->input->post('alamat',FALSE),
                    'jk'=>$this->input->post('jk'),
                    'nohp'=>$this->input->post('nohp',FALSE),
                    'id_jabatan'=>$this->input->post('id_jabatan'),
                    'nohp'=>$this->input->post('nohp'),
                    'id_seksi'=>$this->input->post('id_seksi'),
                    'rule'=>$this->input->post('rule'),
                    'status'=>$this->input->post('status')
                    );
                
            if ($this->m_user->cekdata($this->input->post('username'))==0) {
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;
                $exec = $this->m_user->tambahdata($array);
                if ($exec) redirect(base_url("arsip/usertambah?msg=1"));
                else redirect(base_url("arsip/usertambah?msg=0"));
            } else {
                $variabel['username'] =$this->input->post('username');
                $variabel['seksi'] = $this->m_seksi->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('user/v_user_tambah',$variabel,'user/v_user_js');
            }
        } else {
            $variabel['seksi'] = $this->m_seksi->lihatdata();
            $variabel['jabatan'] = $this->m_jabatan->lihatdata();
            $this->layout->render('user/v_user_tambah',$variabel,'user/v_user_js');
        }
    }

    function userlihat()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $username = $this->input->get("username");
        $exec = $this->m_user->lihatdatasatu($username);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('user/v_user_lihat',$variabel,'user/v_user_js');
        } else {
            redirect(base_url("arsip/user"));
        }
    }

    function userhapus()
    {
        hakakses('administrator');
        $username = $this->input->get("username");
        $query2 = $this->m_user->lihatdatasatu($username);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/foto/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_user->hapus($username);
        redirect(base_url()."arsip/user?msg=1");
    }

    function useredit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'username'=> $this->input->post('username'),
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'nohp'=>$this->input->post('nohp',FALSE),
                'alamat'=>$this->input->post('alamat',FALSE),
                'jk'=>$this->input->post('jk'),
                'id_jabatan'=>$this->input->post('id_jabatan'),
                'id_seksi'=>$this->input->post('id_seksi'),
                'status'=>$this->input->post('status')
                );
            if ($this->input->post('password')) {
                $array['password'] = md5($this->input->post('password'));
            }
            $username = $this->input->post("username");
            $username2 = $this->input->post("username2");
            if (($this->m_user->cekdata($username)>0) && ($username2!=$username)) {
                $variabel['username'] =$this->input->post('username');
                $variabel['username2'] =$this->input->post('username2');
                $variabel['cabang'] = $this->m_cabang->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $variabel['data'] = $array;
                $this->layout->render('user/v_user_edit',$variabel,'user/v_user_edit_js');
            } else {
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("foto"))
                {
                    $upload = $this->upload->data();
                    $foto = $upload["raw_name"].$upload["file_ext"];
                    $array['foto']=$foto;

                    $query2 = $this->m_user->lihatdatasatu($username2);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->foto;
                    $path1 ='./assets/images/foto/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_user->editdata($username2,$array);
                if ($exec){
                 redirect(base_url("arsip/useredit?username=".$username."&msg=1"));
                }
            }
      } else {
            $username = $this->input->get("username");
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['seksi'] = $this->m_seksi->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('user/v_user_edit',$variabel,'user/v_user_edit_js');
            } else {
                redirect(base_url("arsip/user"));
            }
      }

    }


    function pengaturan()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'instansi'=> $this->input->post('instansi'),
                'alamat'=> $this->input->post('alamat'),
                'telepon'=> $this->input->post('telepon'),
                'keterangan'=> $this->input->post('keterangan')
                );
            $id =1;
            $exec = $this->m_pengaturan->editdata($id,$array);
            if ($exec){
                redirect(base_url("arsip/pengaturan?id=".$id."&msg=1"));
            }
            
      } else {
            $id = 1;
            $exec = $this->m_pengaturan->lihatdatasatu($id);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('pengaturan/v_pengaturan',$variabel);
            } else {
                redirect(base_url("arsip/pengaturan"));
            }
      }

    }

    function pegawai()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_pegawai->lihatdata();
        $this->layout->render('pegawai/v_pegawai',$variabel,'pegawai/v_pegawai_js');
    }

    function pegawaitambah()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
                $array=array(
                    'nama'=> $this->input->post('nama'),
                    'nip'=> $this->input->post('nip'),
                    'email'=> $this->input->post('email'),
                    'alamat'=>$this->input->post('alamat',FALSE),
                    'jk'=>$this->input->post('jk'),
                    'nohp'=>$this->input->post('nohp',FALSE),
                    'id_jabatan'=>$this->input->post('id_jabatan'),
                    'nohp'=>$this->input->post('nohp'),
                    'id_seksi'=>$this->input->post('id_seksi'),
                    'tempat_lahir'=>$this->input->post('tempat_lahir'),
                    'tanggal_lahir'=>tanggalawal($this->input->post('tanggal_lahir'))
                    );
                
         
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;
                $exec = $this->m_pegawai->tambahdata($array);
                if ($exec) redirect(base_url("arsip/pegawaitambah?msg=1"));
                else redirect(base_url("arsip/pegawaitambah?msg=0"));

        } else {
            $variabel['seksi'] = $this->m_seksi->lihatdata();
            $variabel['jabatan'] = $this->m_jabatan->lihatdata();
            $this->layout->render('pegawai/v_pegawai_tambah',$variabel,'pegawai/v_pegawai_js');
        }
    }

    function pegawaihapus()
    {
        hakakses('administrator');
        $id_pegawai = $this->input->get("id");
        $query2 = $this->m_pegawai->lihatdatasatu($id_pegawai);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/foto/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_pegawai->hapus($id_pegawai);
        redirect(base_url()."arsip/pegawai?msg=1");
    }

    function pegawailihat()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        $id_pegawai = $this->input->get("id");
        $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('pegawai/v_pegawai_lihat',$variabel,'pegawai/v_pegawai_js');
        } else {
            redirect(base_url("arsip/pegawai"));
        }
    }

    function pegawaiedit()
    {
        hakakses('administrator');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'nama'=> $this->input->post('nama'),
                'nip'=> $this->input->post('nip'),
                'email'=> $this->input->post('email'),
                'alamat'=>$this->input->post('alamat',FALSE),
                'jk'=>$this->input->post('jk'),
                'nohp'=>$this->input->post('nohp',FALSE),
                'id_jabatan'=>$this->input->post('id_jabatan'),
                'nohp'=>$this->input->post('nohp'),
                'id_seksi'=>$this->input->post('id_seksi'),
                'tempat_lahir'=>$this->input->post('tempat_lahir'),
                'tanggal_lahir'=>tanggalawal($this->input->post('tanggal_lahir'))
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("foto"))
                {
                    $upload = $this->upload->data();
                    $foto = $upload["raw_name"].$upload["file_ext"];
                    $array['foto']=$foto;

                    $query2 = $this->m_pegawai->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->foto;
                    $path1 ='./assets/images/foto/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_pegawai->editdata($id_pegawai,$array);
                if ($exec){
                 redirect(base_url("arsip/pegawaiedit?id=".$id_pegawai."&msg=1"));
                }
          
      } else {
            $id_pegawai = $this->input->get("id");
            $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['seksi'] = $this->m_seksi->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('pegawai/v_pegawai_edit',$variabel,'pegawai/v_pegawai_edit_js');
            } else {
                redirect(base_url("arsip/pegawai"));
            }
      }

    }

    
    public function akses()
    { 
		$this->layout->render("keamanan/v_keamanan");
    }


}