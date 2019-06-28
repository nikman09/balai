<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_login");
    }
    public function index()
    { 
		$this->login();
    }

    public function login()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
        $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $exec = $this->m_login->ceklogin($username,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $data_session = array(
                    'username' => $data['username'],
                    'statuslogin' => "login",
                    'nama'=> $data['nama'],
                    'jabatan'=> $data['jabatan'],
                    'foto'=> $data['foto'],
                    'seksi'=> $data['seksi'],
                    'id_seksi'=> $data['id_seksi'],
                    'rule'=> $data['rule'],
                    'status'=> $data['status']
                    );
                $this->session->set_userdata($data_session);
                if (isset($_GET['m'])) {
                    redirect(base_url("arsip/".$_GET['m'].""));
                } else {
                    redirect(base_url("arsip"));
                }
            } else {
                $variabel['gagal'] = '0';
                $this->load->view("login/v_login",$variabel);
            }
        } else {
            $this->load->view("login/v_login",$variabel);
        }
    }

    function logout() {
        $this->session->sess_destroy();
         redirect(base_url('arsip/login'));
     }
}