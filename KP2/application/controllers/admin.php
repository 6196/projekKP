<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->auth->cek_auth(); //ngambil auth dari library
		$this->load->model('m_user');
		$this->load->model('m_berita');	
	}
	
	
	public function list_user(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin
			$data['page']="list_user";
			$data['user_list'] = $this->m_user->get_all_user();
    		$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}	
    }


    public function add_user(){

		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');

		if($stat==4){//admin
			$data['page']="add_user";
			$this->load->view('dashboard_admin',$data);
		}else{ //user
			$this->load->view('index',$data);
		}	
    }

	function add_data_user(){
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
    public function edit_user(){
    	
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin

    		$iduser=$this->uri->segment(3);
    	$data['result']=$this->m_user->getUser($iduser);
    	$result=$this->m_user->getUser($iduser);
    	$data['iduser']=$result['iduser'];
    	$data['username']=$result['username'];
    	$data['password']=md5($result['password']);
    	$data['kategori_idkategori']=$result['kategori_idkategori'];
    	$data['level_idlevel']=$result['level_idlevel'];
    	$data['Nama']=$result['Nama'];

			$data['page']="edit_user";
    		$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}	
    }

    function edit_data_user(){
    		$udata['iduser'] = $_POST['iduser'];
			$udata['username'] = $_POST['username'];
			$udata['password'] = md5($_POST['password']);
			$udata['kategori_idkategori'] = $_POST['kategori_idkategori'];
			$udata['level_idlevel'] = $_POST['level_idlevel']; 
			$udata['Nama'] = $_POST['Nama'];
			if ($this->m_user->update_user($udata,$_POST['iduser'])) {
				redirect('admin/list_user');
			}  

    }
    public function delete_user($iduser){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin

			$data['page']="list_user";
			$this->m_user->delete_user($iduser);
			//$this->list_user();
    		//$this->load->view("dashboard_admin",$data);
    		redirect('admin/list_user');
		}else{ //user
			$this->load->view('index',$data);
		}	
    }

    public function list_berita(){
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin
			$data['page']="list_berita";
			$data['berita_list'] = $this->m_berita->get_all_berita();
    		$this->load->view("dashboard_admin",$data);
		}else{ //user
			$this->load->view('index',$data);
		}	
    }

}


