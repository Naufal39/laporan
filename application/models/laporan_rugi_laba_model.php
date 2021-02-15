<?php
class Laporan_rugi_laba_model extends CI_Model {

	public function laporan_pemasukan ($tanggal,$bulan,$tahun) {

		return $this->db->query("(select a.kode_akun, sum(a.jumlah_pemasukan) as jumlah,b.* from pemasukan a join akun b on a.kode_akun = b.kode_akun 
where b.rugi_laba='Y'  and day(a.tanggal_pemasukan)='$tanggal' and month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'
			GROUP BY a.kode_akun)
union
(select a.kode_akun, sum(a.jumlah_pemasukan) as jumlah,b.* from pemasukan_besar a join akun_besar b on a.kode_akun = b.kode_akun 
where b.rugi_laba='Y'  and day(a.tanggal_pemasukan)='$tanggal' and month(a.tanggal_pemasukan)='$bulan' and year(a.tanggal_pemasukan)='$tahun'
			GROUP BY a.kode_akun)");
	}

	public function laporan_pengeluaran ($tanggal,$bulan,$tahun) {

		return $this->db->query("(select a.kode_akun, sum(a.jumlah_pengeluaran) as jumlah,b.* from pengeluaran a join akun b on a.kode_akun = b.kode_akun 
where b.rugi_laba='Y'  and day(a.tanggal_pengeluaran)='$tanggal' and month(a.tanggal_pengeluaran)='$bulan' and year(a.tanggal_pengeluaran)='$tahun'
			GROUP BY a.kode_akun)
union
(select a.kode_akun, sum(a.jumlah_pengeluaran) as jumlah,b.* from pengeluaran_besar a join akun_besar b on a.kode_akun = b.kode_akun 
where b.rugi_laba='Y'  and day(a.tanggal_pengeluaran)='$tanggal' and month(a.tanggal_pengeluaran)='$bulan' and year(a.tanggal_pengeluaran)='$tahun'
			GROUP BY a.kode_akun)");
	}

	public function total_pengeluaran($bulan,$tahun) {

		return $this->db->query("select sum(a.jumlah_pengeluaran) as total1 from pengeluaran a join akun b on a.kode_akun = b.kode_akun where b.rugi_laba='Y'   ");


	}

	public function total_pengeluaran_besar($bulan,$tahun) {

		return $this->db->query("select sum(a.jumlah_pengeluaran) as total2 from pengeluaran_besar a join akun_besar b on a.kode_akun = b.kode_akun where b.rugi_laba='Y'   ");


	}

	public function total_pemasukan($bulan,$tahun) {

		return $this->db->query("select sum(a.jumlah_pemasukan) as total1 from pemasukan a join akun b on a.kode_akun = b.kode_akun where b.rugi_laba='Y'   ");


	}

	public function total_pemasukan_besar($bulan,$tahun) {

		return $this->db->query("select sum(a.jumlah_pemasukan) as total2 from pemasukan_besar a join akun_besar b on a.kode_akun = b.kode_akun where b.rugi_laba='Y'   ");


	}


}