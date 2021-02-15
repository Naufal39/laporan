<?php
	class pemasukan_besar_model extends Ci_Model{

		function GetPemasukan(){
			return $this->db->query("select a.*,date_format(a.tanggal_pemasukan,'%d %b %Y') as tanggal,b.*,b.nama_akun as akun1,c.*,c.nama_akun as akun2 from pemasukan_besar a left join akun_besar b on a.kode_akun =b.kode_akun left join
				akun c on a.kode_akun = c.kode_akun order by a.id_pemasukan desc
			 ");
		}

		function insert($insert){
			$this->db->insert('pemasukan_besar',$insert);
		}

		 function insert2($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir_besar,$keterangan){

			return $this->db->query("insert into pemasukan_besar values ('','$kode_akun','$nama_pengeluaran','$jumlah_pengeluaran','$tanggal_pengeluaran','$saldo_akhir_besar','$keterangan') ");

		}

		function getjumlah($id_pemasukan){
			return $this->db->query("select jumlah_pemasukan,saldo_akhir from pemasukan_besar where id_pemasukan='$id_pemasukan'");
		}

		function delete($id_pemasukan){
			$this->db->where('id_pemasukan',$id_pemasukan);
			$this->db->delete('pemasukan_besar');
		}
		function update_saldo($insert_pemasukan,$id_pemasukan){
			$this->db->where('id_pemasukan',$id_pemasukan);
			$this->db->update('pemasukan_besar',$insert_pemasukan);
		}
	}
?>