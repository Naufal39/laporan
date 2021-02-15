<?php
	class pemasukan_model extends Ci_Model{

		function GetPemasukan(){
			return $this->db->query("select a.*,date_format(a.tanggal_pemasukan,'%d %b %Y') as tanggal,b.* from pemasukan a join akun b on a.kode_akun =b.kode_akun order by a.id_pemasukan desc");
		}

		function insert($insert){
			$this->db->insert('pemasukan',$insert);
		}

		function getjumlah($id_pemasukan){
			return $this->db->query("select jumlah_pemasukan,saldo_akhir from pemasukan where id_pemasukan='$id_pemasukan'");
		}

		function delete($id_pemasukan){
			$this->db->where('id_pemasukan',$id_pemasukan);
			$this->db->delete('pemasukan');
		}
		function update_saldo($insert_pemasukan,$id_pemasukan){
			$this->db->where('id_pemasukan',$id_pemasukan);
			$this->db->update('pemasukan',$insert_pemasukan);
		}
	}
?>