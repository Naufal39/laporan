<table class="table table-striped" border="1">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<th>Akun</th>
			<th>Nama Pengeluaran</th>
			<th>Jumlah Pengeluaran</th>
			<th>Tanggal Pengeluaran</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1; 
			foreach ($laporan_pengeluaran->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $tampil['nama_akun']?></td>
				<td><?php echo $tampil['nama_pengeluaran']?></td>
				<td><?php echo buatrp($tampil['jumlah_pengeluaran']);?></td>
				<td><?php echo $tampil['tanggal_pengeluaran']?></td>
				<td><?php echo $tampil['keterangan']?></td>
			</tr>
		<?php
		$no++;
			}
		?>
	</tbody>
</table>
<?php
	if($no==1){
		echo "Data tidak ada!!!";
	}
	else{
		foreach ($jumlah_pengeluaran->result_array() as $hasil) {
		?>	<br>
			<table class="table table-striped" style="width:400px; float:right;">
				<tr>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Jumlah pengeluaran</td><td><?php echo buatrp($hasil['jumlah_pengeluaran']);?></td>
				</tr>
			</table>
		<?php
		}
		?>	<br><br><br>
			<a href="<?php echo base_url()?>laporan/laporan_pengeluaran_excel/<?php echo $tahun;?>/<?php echo $bulan;?>"><button class="btn" style="float:right;"><i class="icon icon-file"></i> Export</button></a>
		<?php
	}
?>

