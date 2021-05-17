<?php
class Muatan_model extends CI_Model {


	public function GetMuatan() {
		return $this->db->get("muatan");
	}

	public function GetAkunByID() {
		return $this->db->get("muatan");
	}

	public function insert($jenis_muatan){

		// return $this->db->query("insert into akun values ('','$kode_akun','$nama_akun','$rugi_laba') ");
		return $this->db->query("insert into muatan values ('','$jenis_muatan') ");

	}

	public function insert2($nama_akun,$rugi_laban){

		// return $this->db->query("insert into akun values ('','$kode_akun','$nama_akun','$rugi_laban') ");
		return $this->db->query("insert into akun values ('','$nama_akun','$rugi_laban') ");


	}

	public function update($id_muatan,$jenis_muatan) {

		// return $this->db->query("update akun set kode_akun='$kode_akun',nama_akun='$nama_akun',rugi_laba='$rugi_laba' where id_akun='$id_akun'  ");
		return $this->db->query("update muatan set jenis_muatan='$jenis_muatan' where id_muatan='$id_muatan'  ");
	}

	public function update2($id_akun,$nama_akun,$rugi_laban) {

		// return $this->db->query("update akun set kode_akun='$kode_akun',nama_akun='$nama_akun',rugi_laba='$rugi_laban' where id_akun='$id_akun'  ");
		return $this->db->query("update akun set nama_akun='$nama_akun',rugi_laba='$rugi_laban' where id_akun='$id_akun'  ");
	}

	public function delete($data) {
		return $this->db->query("delete from muatan where id_muatan='$data' ");
	}

	public function cekakun($kode_akun) {

		return $this->db->query("select * from muatan where BINARY jenis_muatan='$jenis_muatan' ");
	}
}