<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	function __construct(){
			parent::__construct();
			//$this->tbl = "tb_pengguna";
			$this->tbl = "user";
	}
	public function get_all_user(){
		//$query = $this->db->get('tb_pengguna ');
		$query = $this->db->get('v_user');
		//$query = $this->db->get('user');
		return $query->result();
	}
		
	public function insert_user($data){
		//return $this->db->insert('tb_pengguna', $data);
		return $this->db->insert('user', $data);

	}
	//public function getById($id_user){
	public function getById($iduser){
		//$query = $this->db->get_where('tb_pengguna',array('id'=>$id_user));
		$query = $this->db->get_where('user',array('id'=>$iduser));
		return $query->row_array();
	}

	//public function update_user($data,$id_user){
	public function update_user($data,$iduser){
		//$this->db->where('tb_pengguna.id_user',$id_user);
		//return $this->db->update('tb_pengguna', $data);
		$this->db->where('user.iduser',$iduser);
		return $this->db->update('user', $data);
	}
	
	//public function delete_user($id_user){
	public function delete_user($iduser){
		// $this->db->where('tb_pengguna.id_user',$id_user);
		// return $this->db->delete('tb_pengguna');
		$this->db->where('user.iduser',$iduser);
		return $this->db->delete('user');
	}

	public function getUser($iduser){
		$this->db->where('iduser',$iduser);
		$query= $this->db->get('user');
		return $query->row_array();
	}
}

?>