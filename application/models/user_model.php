<?php
class user_model extends Ci_Model{
	function cek_user($username,$password){
		return $this->db->query("select * from user where username='$username' and password='$password'");
	}

	function GetUser(){
		return $this->db->get("user");
	}

	function insert($tambah){
		$this->db->insert('user',$tambah);
	}
}
?>