<?php
	class laporan_model extends Ci_Model{
		function laporan_pemasukan($bulan,$tahun){
			// return $this->db->query("select a.*,b.* from pemasukan a join akun b on a.kode_akun=b.kode_akun where month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'");
			return $this->db->query("select * from pemasukan where month(tanggal_pemasukan)='$bulan' and year(tanggal_pemasukan)='$tahun'");
		}

		function laporan_pemasukan_besar($bulan,$tahun){
			return $this->db->query("select a.*,b.*,b.nama_akun as akun1,c.*,c.nama_akun as akun2 from pemasukan_besar a left join akun_besar b on a.kode_akun=b.kode_akun 
				left join akun c on a.kode_akun = c.kode_akun

				where month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'");
		}

		function laporan_pemasukan_rekening($bulan,$tahun){
			return $this->db->query("select a.*,b.*,b.nama_akun as akun1,c.*,c.nama_akun as akun2 from pemasukan_rekening a left join akun_besar b on a.kode_akun=b.kode_akun 
				left join akun c on a.kode_akun = c.kode_akun

				where month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'");
		}

		function laporan_pemasukan_umum($tanggal,$bulan,$tahun){
			return $this->db->query("select a.*,b.* from pemasukan a join akun b on a.kode_akun=b.kode_akun where day(a.tanggal_pemasukan)='$tanggal' and month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'");
		}

		function laporan_pemasukan_umum_besar($tanggal,$bulan,$tahun){
			return $this->db->query("select a.*,b.*,b.nama_akun as akun1,c.*,c.nama_akun as akun2 from pemasukan_besar a left join akun_besar b on a.kode_akun=b.kode_akun left join akun c on a.kode_akun=c.kode_akun where day(a.tanggal_pemasukan)='$tanggal' and month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'");
		}

		function jumlah_pemasukan($bulan,$tahun){
			return $this->db->query("select sum(jumlah_pemasukan) as jumlah_pemasukan from pemasukan where  month(tanggal_pemasukan)='$bulan' and year(tanggal_pemasukan)='$tahun' ");
		}

		function jumlah_pemasukan_besar($bulan,$tahun){
			return $this->db->query("select sum(jumlah_pemasukan) as jumlah_pemasukan from pemasukan_besar where  month(tanggal_pemasukan)='$bulan' and year(tanggal_pemasukan)='$tahun' ");
		}

		function jumlah_pemasukan_rekening($bulan,$tahun){
			return $this->db->query("select sum(jumlah_pemasukan) as jumlah_pemasukan from pemasukan_rekening where  month(tanggal_pemasukan)='$bulan' and year(tanggal_pemasukan)='$tahun' ");
		}

		function laporan_pengeluaran($bulan,$tahun){
			return $this->db->query("select a.*,b.* from pengeluaran a join akun b on a.kode_akun=b.kode_akun where month(a.tanggal_pengeluaran)='$bulan' and year(a.tanggal_pengeluaran)='$tahun'");
		}

		function laporan_pengeluaran_besar($bulan,$tahun){
			return $this->db->query("select a.*,b.*,b.nama_akun as akun1,c.*,c.nama_akun as akun2 from pengeluaran_besar a left join akun_besar b on a.kode_akun=b.kode_akun left join akun c on a.kode_akun=c.kode_akun");
		}

		function jumlah_pengeluaran($bulan,$tahun){
			return $this->db->query("select sum(jumlah_pengeluaran) as jumlah_pengeluaran from pengeluaran where month(tanggal_pengeluaran)='$bulan' and year(tanggal_pengeluaran)='$tahun' ");
		}

		function jumlah_pengeluaran_besar($bulan,$tahun){
			return $this->db->query("select sum(jumlah_pengeluaran) as jumlah_pengeluaran from pengeluaran_besar where month(tanggal_pengeluaran)='$bulan' and year(tanggal_pengeluaran)='$tahun' ");
		}

		function laporan_pengeluaran_umum($tanggal,$bulan,$tahun){
			return $this->db->query("select a.*,b.* from pengeluaran a join akun b on a.kode_akun=b.kode_akun where day(a.tanggal_pengeluaran)='$tanggal' and month(a.tanggal_pengeluaran)='$bulan' and year(a.tanggal_pengeluaran)='$tahun'");
		}

		function laporan_pengeluaran_umum_besar($tanggal,$bulan,$tahun){
			return $this->db->query("select a.*,b.*,b.nama_akun as akuna,c.*,c.nama_akun as akunb from pengeluaran_besar a left join akun_besar b on a.kode_akun=b.kode_akun left join akun c on a.kode_akun = c.kode_akun where day(a.tanggal_pengeluaran)='$tanggal' and month(a.tanggal_pengeluaran)='$bulan' and year(a.tanggal_pengeluaran)='$tahun'");
		}


		function laporan_saldo(){
			return $this->db->query("select * from saldo");
		}

		function laporan_saldo_besar(){
			return $this->db->query("select * from saldo_besar");
		}
	}
?>