<?php
class Pengeluaran_model extends CI_Model {


	public function GetPengeluaran() {
		return $this->db->query("select a.*,date_format(a.tanggal_pengeluaran,'%d %b %Y') as tanggal,b.* from pengeluaran a join akun b on a.kode_akun = b.kode_akun order by a.id_pengeluaran desc");
	}

	public function insert($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir,$keterangan){

		return $this->db->query("insert into pengeluaran values ('','$kode_akun','$nama_pengeluaran','$jumlah_pengeluaran','$tanggal_pengeluaran','$saldo_akhir','$keterangan') ");

	}

	function update($insert_pengeluaran,$id_pengeluaran){
			$this->db->where('id_pengeluaran',$id_pengeluaran);
			$this->db->update('pengeluaran',$insert_pengeluaran);
	}

	public function delete($data) {
		return $this->db->query("delete from pengeluaran where id_pengeluaran='$data' ");
	}

	function getjumlah($id_pengeluaran){
			return $this->db->query("select jumlah_pengeluaran,saldo_akhir from pengeluaran where id_pengeluaran='$id_pengeluaran'");
		}
}