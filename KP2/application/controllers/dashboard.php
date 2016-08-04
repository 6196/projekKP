<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->auth->cek_auth(); //ngambil auth dari library
		
	}
	function index()
	{
		$ambil_akun = $this->m_login->ambil_user($this->session->userdata('uname'));
		$data = array(
			'user'	=> $ambil_akun,
			);
		$stat = $this->session->userdata('lvl');
		if($stat==4){//admin
			$this->load->view('dashboard_admin',$data);
		}else{ //user
			$this->load->view('dashboard_user',$data);
		}
		
	}


	function login()
	{
		$session = $this->session->userdata('isLogin');
    	if($session == FALSE)
    	{
      		$this->load->view('login');
    	}else
    	{
      		redirect('dashboard');
    	}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	
}