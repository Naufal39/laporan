<table class="table table-hover table table-bordered">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama Pemasukan</th>
			<th>Jumlah Pemasukan</th>
			<th>Keterangan</th>
			<th><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1; 
			foreach ($data_pemasukan->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $tampil['tanggal_pemasukan']?></td>
				<td><?php echo $tampil['nama_pemasukan']?></td>
				<td><?php echo $tampil['jumlah_pemasukan']?></td>
				<td><?php echo $tampil['keterangan']?></td>
				<td width="20%"><div align="center">
					<button  id="edit" nama_pemasukan="<?php echo $tampil['nama_pemasukan'];?>" jumlah_pemasukan="<?php echo $tampil['jumlah_pemasukan'];?>" tanggal_pemasukan="<?php echo $tampil['tanggal_pemasukan'];?>" keterangan="<?php echo $tampil['keterangan'];?>" id_pemasukan="<?php echo $tampil['id_pemasukan'];?>" class="btn">Edit</button>
					<button  id="delete" id_pemasukan="<?php echo $tampil['id_pemasukan']?>" nama_pemasukan="<?php echo $tampil['nama_pemasukan']?>" class="btn btn-warning" >Delete</button>

						
				</div>
				</td>
			</tr>
		<?php
		$no++;
			}
		?>
	</tbody>
</table>
