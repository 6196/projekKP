<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_berita extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "berita";
	}
	public function get_all_berita(){
		//$query = $this->db->get('tb_pengguna ');
		$query = $this->db->get('v_berita');
		//$query = $this->db->get('user');
		return $query->result();
	}			
}

?>