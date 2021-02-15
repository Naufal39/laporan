<?php
class pemasukan_rekening_model extends CI_Model {




	 function insert2($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir_rekening,$keterangan){

			return $this->db->query("insert into pemasukan_rekening values ('','$kode_akun','$nama_pengeluaran','$jumlah_pengeluaran','$tanggal_pengeluaran','$saldo_akhir_rekening','$keterangan') ");

		}
}