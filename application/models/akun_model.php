<?php
class Akun_model extends CI_Model {


	public function GetAkun() {
		return $this->db->get("akun");
	}

	public function GetAkunByID() {
		return $this->db->get("akun");
	}

	public function insert($nama_akun,$rugi_laba){

		// return $this->db->query("insert into akun values ('','$kode_akun','$nama_akun','$rugi_laba') ");
		return $this->db->query("insert into akun values ('','$nama_akun','$rugi_laba') ");

	}

	public function insert2($nama_akun,$rugi_laban){

		// return $this->db->query("insert into akun values ('','$kode_akun','$nama_akun','$rugi_laban') ");
		return $this->db->query("insert into akun values ('','$nama_akun','$rugi_laban') ");


	}

	public function update($id_akun,$nama_akun,$rugi_laba) {

		// return $this->db->query("update akun set kode_akun='$kode_akun',nama_akun='$nama_akun',rugi_laba='$rugi_laba' where id_akun='$id_akun'  ");
		return $this->db->query("update akun set nama_akun='$nama_akun',rugi_laba='$rugi_laba' where id_akun='$id_akun'  ");
	}

	public function update2($id_akun,$nama_akun,$rugi_laban) {

		// return $this->db->query("update akun set kode_akun='$kode_akun',nama_akun='$nama_akun',rugi_laba='$rugi_laban' where id_akun='$id_akun'  ");
		return $this->db->query("update akun set nama_akun='$nama_akun',rugi_laba='$rugi_laban' where id_akun='$id_akun'  ");
	}

	public function delete($data) {
		return $this->db->query("delete from akun where id_akun='$data' ");
	}

	public function cekakun($kode_akun) {

		return $this->db->query("select * from akun where BINARY kode_akun='$kode_akun' ");
	}
}