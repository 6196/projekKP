<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model(array('m_user'));
        $this->load->model('m_berita');
        $this->load->model('m_login');  
        if ($this->session->userdata('username')) {
            redirect('dashboard');
    }
 
    function index()
    {
    	
    	$this->load->view('login');
    }

    function main()
    {

        $this->load->view('main');
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = md5(mysql_real_escape_string($psw));
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }


     function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    }



    public function list_berita(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        
            $data['page']="list_berita";
            $data['berita_list'] = $this->m_berita->get_all_berita();
            $this->load->view("dashboard_user",$data);
        
        }   

public function add_berita(){

        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');

        if($stat==1||$stat==2){//redaktur-wartawan
            $data['page']="add_berita";
            $this->load->view('dashboard_user',$data);
        }else{ //admin writer
            $data['page']="denied_add_berita";
            $this->load->view('dashboard_user',$data);
        }   
    }

    function add_data_berita(){
            $udata['Nama'] = $this->input->post('Nama');
            $udata['username'] = $this->input->post('username');
            $udata['password'] = md5($this->input->post('password'));
            $udata['kategori_idkategori'] = $this->input->post('kategori_idkategori');
            $udata['level_idlevel'] = $this->input->post('level_idlevel');
            //$udata['status'] = $this->input->post('status');
            if ($this->m_user->insert_user($udata)) {
                redirect('admin/list_user');
            }
            
    }

     public function kirim_berita(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
            $data['page']="kirim_berita";
            $this->load->view('dashboard_user',$data);
    }

    public function lihat_berita(){

        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
            $data['page']="lihat_berita";
            $this->load->view('dashboard_user',$data);
        
        }

        public function lihat_notifikasi(){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
        $data = array(
            'user'  => $ambil_akun,
            );
        $stat = $this->session->userdata('lvl');
        
            $data['page']="notifikasi";
           // $data['user_list'] = $this->m_user->get_all_user();
            $this->load->view("dashboard_user",$data);
        }   
    }

   