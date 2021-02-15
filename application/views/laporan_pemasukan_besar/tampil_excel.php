<table class="table table-striped" border="1">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<th>Akun</th>
			<th>Nama Pemasukan</th>
			<th>Jumlah Pemasukan</th>
			<th>Tanggal Pemasukan</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1; 
			foreach ($laporan_pemasukan_besar->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $tampil['akun1']?><?php echo $tampil['akun2']?></td>
				<td><?php echo $tampil['nama_pemasukan']?></td>
				<td><?php echo buatrp($tampil['jumlah_pemasukan']);?></td>
				<td><?php echo $tampil['tanggal_pemasukan']?></td>
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
		foreach ($jumlah_pemasukan_besar->result_array() as $hasil) {
		?>	<br>
			<table class="table table-striped" style="width:400px; float:right;">
				<tr>
					<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Jumlah Pemasukan</td><td><?php echo buatrp($hasil['jumlah_pemasukan']);?></td>
				</tr>
			</table>
		<?php
		}
		?>	<br><br><br>
			<a href="<?php echo base_url()?>laporan/laporan_pemasukan_besar_excel/<?php echo $tahun;?>/<?php echo $bulan;?>"><button class="btn" style="float:right;"><i class="icon icon-file"></i> Export</button></a>
		<?php
	}
?>

