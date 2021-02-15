<?php
class Pengeluaran_besar_model extends CI_Model {


	public function GetPengeluaran() {
		return $this->db->query("select a.*,date_format(a.tanggal_pengeluaran,'%d %b %Y') as tanggal,b.* from pengeluaran_besar a join akun_besar b on a.kode_akun = b.kode_akun order by a.id_pengeluaran desc");
	}

	public function insert($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir_besar,$keterangan){

		return $this->db->query("insert into pengeluaran_besar values ('','$kode_akun','$nama_pengeluaran','$jumlah_pengeluaran','$tanggal_pengeluaran','$saldo_akhir_besar','$keterangan') ");

	}

	function update($insert_pengeluaran,$id_pengeluaran){
			$this->db->where('id_pengeluaran',$id_pengeluaran);
			$this->db->update('pengeluaran_besar',$insert_pengeluaran);
	}

	public function delete($data) {
		return $this->db->query("delete from pengeluaran_besar where id_pengeluaran='$data' ");
	}

	function getjumlah($id_pengeluaran){
			return $this->db->query("select jumlah_pengeluaran,saldo_akhir from pengeluaran_besar where id_pengeluaran='$id_pengeluaran'");
		}
}