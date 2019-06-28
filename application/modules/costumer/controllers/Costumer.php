<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Costumer extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_cabang");
        $this->load->model("m_jabatan");
        $this->load->model("m_user");
        $this->load->model("m_costumer");
		$this->load->model("m_dashboard");
    }

    // Dashboard
    public function index()
    {   

        $variabel['csrf'] = csrf();
        $rule = $this->session->userdata("rule");
        $cabang = $this->session->userdata("cabang");
        $username = $this->session->userdata("username");
        $tahun  = date('Y');
        $variabel['tahun']=  $tahun;
        $variabel['cabang']=  $cabang;
        $variabel['username']=  $username;
        $bulan = date('m');
        $hari = date("Y-m-d");
        if ($rule=="Audit") {
            $variabel['jumlahcostumer'] = $this->m_dashboard->jumlahcostumer();
            $variabel['jumlahcabang'] = $this->m_dashboard->jumlahcabang();
            $variabel['jumlahuser'] = $this->m_dashboard->jumlahuser();
            $variabel['jumlahaudit'] = $this->m_dashboard->jumlahuseraudit();
            $variabel['jumlahhelper'] = $this->m_dashboard->jumlahuserhelper();
            $variabel['jumlahmanager'] = $this->m_dashboard->jumlahusermanager();
            $variabel['jumlahcostumerunique'] = $this->m_dashboard->jumlahcostumerunique();
 
            
            $variabel['januari'] = $this->m_dashboard->jumlahcostumerbulan($tahun,1);
            $variabel['februari'] = $this->m_dashboard->jumlahcostumerbulan($tahun,2);
            $variabel['maret'] = $this->m_dashboard->jumlahcostumerbulan($tahun,3);
            $variabel['april'] = $this->m_dashboard->jumlahcostumerbulan($tahun,4);
            $variabel['mei'] = $this->m_dashboard->jumlahcostumerbulan($tahun,5);
            $variabel['juni'] = $this->m_dashboard->jumlahcostumerbulan($tahun,6);
            $variabel['juli'] = $this->m_dashboard->jumlahcostumerbulan($tahun,7);
            $variabel['agustus'] = $this->m_dashboard->jumlahcostumerbulan($tahun,8);
            $variabel['september'] = $this->m_dashboard->jumlahcostumerbulan($tahun,9);
            $variabel['oktober'] = $this->m_dashboard->jumlahcostumerbulan($tahun,10);
            $variabel['november'] = $this->m_dashboard->jumlahcostumerbulan($tahun,11);
            $variabel['desember'] = $this->m_dashboard->jumlahcostumerbulan($tahun,12);

            $jumlahcostumertahun = $this->m_dashboard->jumlahcostumertahun();
            $variabel['jumlahcostumertahun'] = array_reverse($jumlahcostumertahun->result_array());
            
            $variabel['top10custumer'] =  $this->m_dashboard->top10custumer();
            $variabel['top10helper'] =  $this->m_dashboard->top10helper();
            $variabel['top10helpertahun'] =  $this->m_dashboard->top10helpertahun($tahun);
            $variabel['top10helperbulan'] =  $this->m_dashboard->top10helperbulan($tahun,$bulan);

            $variabel['cabangtop'] =  $this->m_dashboard->cabang();
            $variabel['cabangtoptahun'] =  $this->m_dashboard->cabangtahun($tahun);
            $variabel['cabangtopbulan'] =  $this->m_dashboard->cabangbulan($tahun,$bulan);
            $this->load->view('dashboard/v_home',$variabel);
        } else if ($rule=="Manager") {
            $variabel['jumlahcostumermanager'] = $this->m_dashboard->jumlahcostumermanager($cabang);
            $variabel['jumlahcostumer'] = $this->m_dashboard->jumlahcostumermanager($cabang);
            $variabel['jumlahcostumermanagertahun'] = $this->m_dashboard->jumlahcostumermanagertahun($cabang,$tahun);
            $variabel['jumlahcostumermanagerbulan'] = $this->m_dashboard->jumlahcostumermanagerbulan($cabang,$tahun,$bulan);
            $variabel['jumlahcostumermanagerhari'] = $this->m_dashboard->jumlahcostumermanagerhari($cabang,$hari);
            $variabel['jumlahcostumerunique'] = $this->m_dashboard->jumlahcostumermanagerunique($cabang);
 
            
            $variabel['januari'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,1,$cabang);
            $variabel['februari'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,2,$cabang);
            $variabel['maret'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,3,$cabang);
            $variabel['april'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,4,$cabang);
            $variabel['mei'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,5,$cabang);
            $variabel['juni'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,6,$cabang);
            $variabel['juli'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,7,$cabang);
            $variabel['agustus'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,8,$cabang);
            $variabel['september'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,9,$cabang);
            $variabel['oktober'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,10,$cabang);
            $variabel['november'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,11,$cabang);
            $variabel['desember'] = $this->m_dashboard->jumlahcostumerbulanmanager($tahun,12,$cabang);

            $jumlahcostumertahun = $this->m_dashboard->jumlahcostumertahunmanager($cabang);
            $variabel['jumlahcostumertahun'] = array_reverse($jumlahcostumertahun->result_array());
            
            $variabel['top10custumer'] =  $this->m_dashboard->top10custumer();
            $variabel['top10helper'] =  $this->m_dashboard->top10helpermanager($cabang);
            $variabel['top10helpertahun'] =  $this->m_dashboard->top10helpertahunmanager($tahun,$cabang);
            $variabel['top10helperbulan'] =  $this->m_dashboard->top10helperbulanmanager($tahun,$bulan,$cabang);

            $variabel['cabangtop'] =  $this->m_dashboard->cabang();
            $variabel['cabangtoptahun'] =  $this->m_dashboard->cabangtahun($tahun);
            $variabel['cabangtopbulan'] =  $this->m_dashboard->cabangbulan($tahun,$bulan);
            $this->load->view('dashboard/v_homemanager',$variabel);
        } else if ($rule=="Helper"){
            $variabel['jumlahcostumerhelper'] = $this->m_dashboard->jumlahcostumerhelper($username);
            $variabel['jumlahcostumer'] = $this->m_dashboard->jumlahcostumerhelper($username);
            $variabel['jumlahcostumerhelpertahun'] = $this->m_dashboard->jumlahcostumerhelpertahun($username,$tahun);
            $variabel['jumlahcostumerhelperbulan'] = $this->m_dashboard->jumlahcostumerhelperbulan($username,$tahun,$bulan);
            $variabel['jumlahcostumerhelperhari'] = $this->m_dashboard->jumlahcostumerhelperhari($username,$hari);
            $variabel['jumlahcostumerunique'] = $this->m_dashboard->jumlahcostumerhelperunique($username);
 
            
            $variabel['januari'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,1,$username);
            $variabel['februari'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,2,$username);
            $variabel['maret'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,3,$username);
            $variabel['april'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,4,$username);
            $variabel['mei'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,5,$username);
            $variabel['juni'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,6,$username);
            $variabel['juli'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,7,$username);
            $variabel['agustus'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,8,$username);
            $variabel['september'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,9,$username);
            $variabel['oktober'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,10,$username);
            $variabel['november'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,11,$username);
            $variabel['desember'] = $this->m_dashboard->jumlahcostumerbulanhelper($tahun,12,$username);

            $jumlahcostumertahun = $this->m_dashboard->jumlahcostumertahunhelper($username);
            $variabel['jumlahcostumertahun'] = array_reverse($jumlahcostumertahun->result_array());
            
            $variabel['top10custumer'] =  $this->m_dashboard->top10custumer();
            $variabel['top10helper'] =  $this->m_dashboard->top10helpermanager($cabang);
            $variabel['top10helpertahun'] =  $this->m_dashboard->top10helpertahunmanager($tahun,$cabang);
            $variabel['top10helperbulan'] =  $this->m_dashboard->top10helperbulanmanager($tahun,$bulan,$cabang);

            $variabel['cabangtop'] =  $this->m_dashboard->cabang();
            $variabel['cabangtoptahun'] =  $this->m_dashboard->cabangtahun($tahun);
            $variabel['cabangtopbulan'] =  $this->m_dashboard->cabangbulan($tahun,$bulan);
            $this->load->view('dashboard/v_homehelper',$variabel);
        }
    }
    // End Dashboard

    // User
    function datauser()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_user->lihatdata();
        $this->layout->render('user/v_user',$variabel,'user/v_user_js');
    }

    function usertambah()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
                $array=array(
                    'username'=> $this->input->post('username'),
                    'password'=> md5($this->input->post('password')),
                    'nama'=> $this->input->post('nama'),
                    'email'=> $this->input->post('email'),
                    'nohp'=>$this->input->post('nohp',FALSE),
                    'alamat'=>$this->input->post('alamat',FALSE),
                    'jk'=>$this->input->post('jk'),
                    'jabatan'=>$this->input->post('jabatan'),
                    'cabang'=>$this->input->post('cabang'),
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
                if ($exec) redirect(base_url("costumer/usertambah?msg=1"));
                else redirect(base_url("costumer/usertambah?msg=0"));
            } else {
                $variabel['username'] =$this->input->post('username');
                $variabel['cabang'] = $this->m_cabang->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('user/v_user_tambah',$variabel,'user/v_user_js');
            }
        } else {
            $variabel['cabang'] = $this->m_cabang->lihatdata();
            $variabel['jabatan'] = $this->m_jabatan->lihatdata();
            $this->layout->render('user/v_user_tambah',$variabel,'user/v_user_js');
        }
    }

    function useredit()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'username'=> $this->input->post('username'),
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'nohp'=>$this->input->post('nohp',FALSE),
                'alamat'=>$this->input->post('alamat',FALSE),
                'jk'=>$this->input->post('jk'),
                'jabatan'=>$this->input->post('jabatan'),
                'cabang'=>$this->input->post('cabang'),
                'rule'=>$this->input->post('rule'),
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
                 redirect(base_url("costumer/useredit?username=".$username."&msg=1"));
                }
            }
      } else {
            $username = $this->input->get("username");
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['cabang'] = $this->m_cabang->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('user/v_user_edit',$variabel,'user/v_user_edit_js');
            } else {
                redirect(base_url("costumer/user"));
            }
      }

    }

    function userlihat()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        $username = $this->input->get("username");
        $exec = $this->m_user->lihatdatasatu($username);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('user/v_user_lihat',$variabel,'user/v_user_js');
        } else {
            redirect(base_url("costumer/user"));
        }
    

    }

    function userhapus()
    {
        hakakses('Audit');
        $username = $this->input->get("username");
        $query2 = $this->m_user->lihatdatasatu($username);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/foto/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }

        $exec = $this->m_user->hapus($username);
        redirect(base_url()."costumer/datauser?msg=1");
    }

    function datausermanager()
    {
        hakakses('Manager');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_user->lihatdatacabang($this->session->userdata("cabang"));
        $this->layout->render('usermanager/v_user',$variabel,'usermanager/v_user_js');
    }

    function usertambahmanager()
    {
        hakakses('Manager');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
                $array=array(
                    'username'=> $this->input->post('username'),
                    'password'=> md5($this->input->post('password')),
                    'nama'=> $this->input->post('nama'),
                    'email'=> $this->input->post('email'),
                    'nohp'=>$this->input->post('nohp',FALSE),
                    'alamat'=>$this->input->post('alamat',FALSE),
                    'jk'=>$this->input->post('jk'),
                    'jabatan'=>$this->input->post('jabatan'),
                    'cabang'=>$this->input->post('cabang'),
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
                if ($exec) redirect(base_url("costumer/usertambahmanager?msg=1"));
                else redirect(base_url("costumer/usertambahmanager?msg=0"));
            } else {
                $variabel['username'] =$this->input->post('username');
                $variabel['cabang'] = $this->m_cabang->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('usermanager/v_user_tambah',$variabel,'usermanager/v_user_js');
            }
        } else {
            $variabel['cabang'] = $this->m_cabang->lihatdata();
            $variabel['jabatan'] = $this->m_jabatan->lihatdata();
            $this->layout->render('usermanager/v_user_tambah',$variabel,'usermanager/v_user_js');
        }
    }

    function usereditmanager()
    {
        hakakses('Manager');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'username'=> $this->input->post('username'),
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'nohp'=>$this->input->post('nohp',FALSE),
                'alamat'=>$this->input->post('alamat',FALSE),
                'jk'=>$this->input->post('jk'),
                'jabatan'=>$this->input->post('jabatan'),
                'cabang'=>$this->input->post('cabang'),
                'rule'=>$this->input->post('rule'),
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
                $this->layout->render('usermanager/v_user_edit',$variabel,'usermanager/v_user_edit_js');
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
                 redirect(base_url("costumer/usereditmanager?username=".$username."&msg=1"));
                }
            }
      } else {
            $username = $this->input->get("username");
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['cabang'] = $this->m_cabang->lihatdata();
                $variabel['jabatan'] = $this->m_jabatan->lihatdata();
                $this->layout->render('usermanager/v_user_edit',$variabel,'usermanager/v_user_edit_js');
            } else {
                redirect(base_url("costumer/usermanager"));
            }
      }

    }

    function userlihatmanager()
    {
        hakakses('Manager');
        $variabel['csrf'] = csrf();
        $username = $this->input->get("username");
        $exec = $this->m_user->lihatdatasatu($username);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('usermanager/v_user_lihat',$variabel,'usermanager/v_user_js');
        } else {
            redirect(base_url("costumer/usermanager"));
        }
    }

    function userhapusmanager()
    {
        hakakses('Manager');
        $username = $this->input->get("username");
        $query2 = $this->m_user->lihatdatasatu($username);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/foto/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }

        $exec = $this->m_user->hapus($username);
        redirect(base_url()."costumer/datausermanager?msg=1");
    }
    // End User

    // Cabang
    function datacabang()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_cabang->lihatdata();
        $this->layout->render('cabang/v_cabang',$variabel,'cabang/v_cabang_js');
    }

    function cabangtambah()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $array=array(
                'cabang'=> $this->input->post('cabang')
                );
            $exec = $this->m_cabang->tambahdata($array);
            if ($exec) redirect(base_url("costumer/cabangtambah?msg=1"));
            else redirect(base_url("costumer/cabangtambah?msg=0"));
    
        } else {
            $this->layout->render('cabang/v_cabang_tambah',$variabel,'cabang/v_cabang_js');
        }
    }

    function cabangedit()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'cabang'=> $this->input->post('cabang')
                );
            $idcabang = $this->input->post("idcabang");
            $exec = $this->m_cabang->editdata($idcabang,$array);
            if ($exec){
                redirect(base_url("costumer/cabangedit?id=".$idcabang."&msg=1"));
            }
            
      } else {
            $idcabang = $this->input->get("id");
            $exec = $this->m_cabang->lihatdatasatu($idcabang);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('cabang/v_cabang_edit',$variabel,'cabang/v_cabang_js');
            } else {
                redirect(base_url("costumer/datacabang"));
            }
      }

    }

    function cabanghapus()
    {
        hakakses('Audit');
        $idcabang = $this->input->get("id");
        $exec = $this->m_cabang->hapus($idcabang);
        redirect(base_url()."costumer/datacabang?msg=1");
    }

    // End Cabang

    // Jabatan
    function datajabatan()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_jabatan->lihatdata();
        $this->layout->render('jabatan/v_jabatan',$variabel,'jabatan/v_jabatan_js');
    }

    function jabatantambah()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $array=array(
                'jabatan'=> $this->input->post('jabatan')
                );
            $exec = $this->m_jabatan->tambahdata($array);
            if ($exec) redirect(base_url("costumer/jabatantambah?msg=1"));
            else redirect(base_url("costumer/jabatantambah?msg=0"));
    
        } else {
            $this->layout->render('jabatan/v_jabatan_tambah',$variabel,'jabatan/v_jabatan_js');
        }
    }

    function jabatanedit()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'jabatan'=> $this->input->post('jabatan')
                );
            $idjabatan = $this->input->post("idjabatan");
            $exec = $this->m_jabatan->editdata($idjabatan,$array);
            if ($exec){
                redirect(base_url("costumer/jabatanedit?id=".$idjabatan."&msg=1"));
            }
            
      } else {
            $idjabatan = $this->input->get("id");
            $exec = $this->m_jabatan->lihatdatasatu($idjabatan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('jabatan/v_jabatan_edit',$variabel,'jabatan/v_jabatan_js');
            } else {
                redirect(base_url("costumer/datajabatan"));
            }
      }

    }

    function jabatanhapus()
    {
        hakakses('Audit');
        $idjabatan = $this->input->get("id");
        $exec = $this->m_jabatan->hapus($idjabatan);
        redirect(base_url()."costumer/datajabatan?msg=1");
    }

    function inputcostumer()
    {
        hakakses('Helper');
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
                $array=array(
                    'username'=>$this->session->userdata("username"),
                    'namahelper'=>$this->session->userdata("nama"),
                    'jabatan'=>$this->session->userdata("jabatan"),
                    'cabang'=>$this->session->userdata("cabang"),
                    'tanggalinput'=>date('Y-m-d'),
                    'tanggaltransaksi'=>tanggalawal($this->input->post('tanggaltransaksi',FALSE)),
                    'noinvoice'=>$this->input->post('noinvoice'),
                    'namacostumer'=>$this->input->post('namacostumer'),
                    'alamat'=>$this->input->post('alamat'),
                    'nohp'=>$this->input->post('nohp'),
                    'noktp'=>$this->input->post('noktp'),
                    'email'=>$this->input->post('email'),
                    'merek'=>$this->input->post('merek'),
                    'type'=>$this->input->post('type'),
                    'warna'=>$this->input->post('warna'),
                    'imei'=>$this->input->post('imei'),
                    'namakasir'=>$this->input->post('namakasir')
                    );
        $exec = $this->m_costumer->tambahdata($array);
        if ($exec) redirect(base_url("costumer/inputcostumer?msg=1"));
        else redirect(base_url("costumer/inputcostumer?msg=0"));
         
        } else {
            $this->layout->render('costumerhelper/v_costumer_tambah',$variabel,'costumerhelper/v_costumer_js');
        }
    }

    function datacostumer()
    {
        hakakses('Audit');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_costumer->lihatdata();
        if ($this->input->post()){
            $tanggal = $this->input->post('tanggaltransaksi');
            if ($tanggal=="") {
                $awal  = "null";
                $akhir = "null";
            } else {
                $awal  = "'".tanggalawal(substr($tanggal,0,10))."'";
                $akhir = "'".tanggalawal(substr($tanggal,13,10))."'";
            }
            $this->input->post('nik')==""? $username = "null":$username = "'".$this->input->post('nik')."'";
            $this->input->post('area')==""? $cabang = "null":$cabang = "'".$this->input->post('area')."'";
            $variabel['tanggaltransaksi'] = $this->input->post('tanggaltransaksi');
            $variabel['username'] = $this->input->post('nik');
            $variabel['cabang'] = $this->input->post('area');
            $variabel['link'] = "".base_url()."costumer/listcostumerajax?awal=".$awal."&akhir=".$akhir."&username=".$username."&cabang=".$cabang."";
            $variabel['exporttxt'] = "".base_url()."costumer/exporttxt?awal=".$awal."&akhir=".$akhir."&username=".$username."&cabang=".$cabang."";
            $variabel['exportxls'] = "".base_url()."costumer/exportxls?awal=".$awal."&akhir=".$akhir."&username=".$username."&cabang=".$cabang."";
        } else {
             $variabel['tanggaltransaksi'] = '';
             $variabel['username'] = '';
             $variabel['cabang'] = '';
             $variabel['link'] = "".base_url()."costumer/listcostumerajax/";
             $variabel['exporttxt'] = "".base_url()."costumer/exporttxt/";
             $variabel['exportxls'] = "".base_url()."costumer/exportxls/";
             
        }

        $variabel['area'] = $this->m_cabang->lihatdata();
        $variabel['user'] = $this->m_user->lihatdatahelper();
        $this->layout->render('costumeraudit/v_costumer',$variabel,'costumeraudit/v_costumer_js');
    }

    public function listcostumerajax()
    {	
        $this->input->get('awal')? $awal  = $this->input->get('awal'): $awal  = "null";
        $this->input->get('akhir')? $akhir  = $this->input->get('akhir'): $akhir  = "null";
        $this->input->get('username')? $username  = $this->input->get('username'): $username  = "null";
        $this->input->get('cabang')? $cabang  = $this->input->get('cabang'): $cabang  = "null";
        $this->m_costumer->listcostumerajax($awal,$akhir,$username,$cabang);
       
    }

    function datacostumerhelper()
    {
        hakakses('Helper');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_costumer->lihatdata();
        
        if ($this->input->post('tanggaltransaksi')){
            $tanggal = $this->input->post('tanggaltransaksi');
            if ($tanggal=="") {
                $awal  = "null";
                $akhir = "null";
            } else {
                $awal  = "'".tanggalawal(substr($tanggal,0,10))."'";
                $akhir = "'".tanggalawal(substr($tanggal,13,10))."'";
            }
            $variabel['tanggaltransaksi'] = $this->input->post('tanggaltransaksi');
            $variabel['link'] = "".base_url()."costumer/listcostumerajax?awal=".$awal."&akhir=".$akhir."";
        } else {
             $variabel['tanggaltransaksi'] = '';
             $variabel['link'] = "".base_url()."costumer/listcostumerajaxhelper/";
        }
        $this->layout->render('costumerhelper/v_costumer',$variabel,'costumerhelper/v_costumer_js');
    }

    public function listcostumerajaxhelper()
    {	
        $this->input->get('awal')? $awal  = $this->input->get('awal'): $awal  = "null";
        $this->input->get('akhir')? $akhir  = $this->input->get('akhir'): $akhir  = "null";
        $username = "'".$this->session->userdata('username')."'";
        $this->m_costumer->listcostumerajax($awal,$akhir,$username);
    }
    
    public function exporttxt()
    {	
        $this->input->get('awal')? $awal  = $this->input->get('awal'): $awal  = "null";
        $this->input->get('akhir')? $akhir  = $this->input->get('akhir'): $akhir  = "null";
        $this->input->get('username')? $username  = $this->input->get('username'): $username  = "null";
        $this->input->get('cabang')? $cabang  = $this->input->get('cabang'): $cabang  = "null";
        $awal=="null"?$variabel['awal'] ="":$variabel['awal']= str_replace("'","",$awal); 
        $akhir=="null"?$variabel['akhir'] ="":$variabel['akhir']= " s.d ".str_replace("'","",$akhir)." ";; 
        $username=="null"?$variabel['username'] ="":$variabel['username']= str_replace("'","",$username)." "; 
        $cabang=="null"?$variabel['cabang'] ="":$variabel['cabang']= str_replace("'","",$cabang)." "; 
        $variabel['data']=$this->m_costumer->datafilter($awal,$akhir,$username,$cabang);
        $this->load->view('costumeraudit/v_costumer_txt',$variabel);
    }

    public function exportxls()
    {	
        $this->input->get('awal')? $awal  = $this->input->get('awal'): $awal  = "null";
        $this->input->get('akhir')? $akhir  = $this->input->get('akhir'): $akhir  = "null";
        $this->input->get('username')? $username  = $this->input->get('username'): $username  = "null";
        $this->input->get('cabang')? $cabang  = $this->input->get('cabang'): $cabang  = "null";
        $awal=="null"?$variabel['awal'] ="":$variabel['awal']= str_replace("'","",$awal); 
        $akhir=="null"?$variabel['akhir'] ="":$variabel['akhir']= " s.d ".str_replace("'","",$akhir)." ";; 
        $username=="null"?$variabel['username'] ="":$variabel['username']= str_replace("'","",$username)." "; 
        $cabang=="null"?$variabel['cabang'] ="":$variabel['cabang']= str_replace("'","",$cabang)." "; 
        $variabel['data']=$this->m_costumer->datafilter($awal,$akhir,$username,$cabang);
        $this->load->view('costumeraudit/v_costumer_xls',$variabel);
    }

    function costumerhapus()
    {
        hakakses('Audit','Manager');
        $id = $this->input->get("id");
        $exec = $this->m_costumer->hapus($id);
        redirect(base_url()."costumer/datacostumer?msg=1");
    }

    function costumeredit()
    {
        hakakses('Audit','Manager');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                    'tanggaltransaksi'=>tanggalawal($this->input->post('tanggaltransaksi',FALSE)),
                    'noinvoice'=>$this->input->post('noinvoice'),
                    'namacostumer'=>$this->input->post('namacostumer'),
                    'alamat'=>$this->input->post('alamat'),
                    'nohp'=>$this->input->post('nohp'),
                    'noktp'=>$this->input->post('noktp'),
                    'email'=>$this->input->post('email'),
                    'merek'=>$this->input->post('merek'),
                    'type'=>$this->input->post('type'),
                    'warna'=>$this->input->post('warna'),
                    'imei'=>$this->input->post('imei'),
                    'namakasir'=>$this->input->post('namakasir')
                );
            $id = $this->input->post("id");
            $exec = $this->m_costumer->editdata($id,$array);
            if ($exec){
                redirect(base_url("costumer/costumeredit?id=".$id."&msg=1"));
            }
            
      } else {
            $id = $this->input->get("id");
            $exec = $this->m_costumer->lihatdatasatu($id);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec->row_array();
                $this->layout->render('costumeraudit/v_costumer_edit',$variabel,'costumeraudit/v_costumer_js');
            } else {
                redirect(base_url("costumer/datacostumer"));
            }
      }

    }

    function costumerlihat()
    {
        hakakses('Audit','Manager','Helper');
        $variabel['csrf'] = csrf();
        $id = $this->input->get("id");
        $exec = $this->m_costumer->lihatdatasatu($id);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec->row_array();
            $this->layout->render('costumeraudit/v_costumer_lihat',$variabel,'costumeraudit/v_costumer_js');
        } else {
            redirect(base_url("costumer/datacostumer"));
        }

    }

    function datacostumermanager()
    {
        hakakses('Manager');
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_costumer->lihatdata();
        if ($this->input->post()){
            $tanggal = $this->input->post('tanggaltransaksi');
            if ($tanggal=="") {
                $awal  = "null";
                $akhir = "null";
            } else {
                $awal  = "'".tanggalawal(substr($tanggal,0,10))."'";
                $akhir = "'".tanggalawal(substr($tanggal,13,10))."'";
            }
            $this->input->post('nik')==""? $username = "null":$username = "'".$this->input->post('nik')."'";
            $cabang = "'".$this->session->userdata("cabang")."'";
            $variabel['tanggaltransaksi'] = $this->input->post('tanggaltransaksi');
            $variabel['username'] = $this->input->post('nik');
            $variabel['cabang'] = $this->session->userdata("cabang");
            $variabel['link'] = "".base_url()."costumer/listcostumerajax?awal=".$awal."&akhir=".$akhir."&username=".$username."&cabang=".$cabang."";
            $variabel['exporttxt'] = "".base_url()."costumer/exporttxt?awal=".$awal."&akhir=".$akhir."&username=".$username."&cabang=".$cabang."";
            $variabel['exportxls'] = "".base_url()."costumer/exportxls?awal=".$awal."&akhir=".$akhir."&username=".$username."&cabang=".$cabang."";
        } else {
             $variabel['tanggaltransaksi'] = '';
             $variabel['username'] = '';
             $variabel['cabang'] = $this->session->userdata("cabang");
             $cabang = "'".$this->session->userdata("cabang")."'";
             $variabel['link'] = "".base_url()."costumer/listcostumerajax?cabang=".$cabang."";
             $variabel['exporttxt'] = "".base_url()."costumer/exporttxt?cabang=".$cabang."";
             $variabel['exportxls'] = "".base_url()."costumer/exportxls?cabang=".$cabang."";
             
        }

        $variabel['area'] = $this->m_cabang->lihatdata();
        $variabel['user'] = $this->m_user->lihatdatamanager($this->session->userdata("cabang"));
        $this->layout->render('costumermanager/v_costumer',$variabel,'costumermanager/v_costumer_js');
    }

    function costumerhapusmanager()
    {
        hakakses('Manager');
        $id = $this->input->get("id");
        $exec = $this->m_costumer->hapus($id);
        redirect(base_url()."costumer/datacostumermanager?msg=1");
    }

    function profil()
    {
        hakakses('Audit','Manager','Helper');
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'nohp'=>$this->input->post('nohp',FALSE),
                'alamat'=>$this->input->post('alamat',FALSE),
                'jk'=>$this->input->post('jk')
                );
            if ($this->input->post('password')) {
                $array['password'] = md5($this->input->post('password'));
            }
            $data_session = array(
                'nama'=> $this->input->post('nama')
                );
            $username = $this->input->post("username");
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("foto"))
                {
                    $upload = $this->upload->data();
                    $foto = $upload["raw_name"].$upload["file_ext"];
                    $array['foto']=$foto;
                    $data_session['foto']=$foto;
                    $query2 = $this->m_user->lihatdatasatu($username);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->foto;
                    $path1 ='./assets/images/foto/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_user->editdata($username,$array);
                $this->session->set_userdata($data_session);
                if ($exec){
                 redirect(base_url("costumer/profil?msg=1"));
                }
            
      } else {
            $username =$this->session->userdata("username");
            $exec = $this->m_user->lihatdatasatu($username);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('profile/v_profil',$variabel,'profile/v_profil_js');
            } else {
                redirect(base_url("costumer/index"));
            }
      }

    }

    public function akses()
    { 
		$this->layout->render("keamanan/v_keamanan");
    }

}