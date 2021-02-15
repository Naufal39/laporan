<table class="table table-hover table table-bordered">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<th>Akun</th>
			<th>Nama Pengeluaran</th>
			<th>Jumlah</th>
			<th>Tanggal Pengeluaran</th>
			<th>Keterangan</th>
			
			<th><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
			foreach ($data_pengeluaran->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $tampil['nama_akun']?></td>
				<td><?php echo $tampil['nama_pengeluaran']?></td>
				<td><?php echo $tampil['jumlah_pengeluaran']?></td>
				<td><?php echo $tampil['tanggal']?></td>
				<td><?php echo $tampil['keterangan']?></td>
				<td width="20%"><div align="center">
					<button kode_akun="<?php echo $tampil['kode_akun']?>" 
						nama_pengeluaran="<?php echo $tampil['nama_pengeluaran']?>" 
						jumlah_pengeluaran="<?php echo $tampil['jumlah_pengeluaran']?>" 
						tanggal_pengeluaran="<?php echo $tampil['tanggal_pengeluaran']?>" 
						keterangan="<?php echo $tampil['keterangan']?>" 
						id_pengeluaran="<?php echo $tampil['id_pengeluaran']?>" 
						id="edit" class="btn">Edit</button>
					<button id_pengeluaran="<?php echo $tampil['id_pengeluaran']?>" jumlah_pengeluaran ="<?php echo $tampil['jumlah_pengeluaran']?>" nama_pengeluaran="<?php echo $tampil['nama_pengeluaran']?>"   id="delete" class="btn btn-warning" >Delete</button>

						
				</div>
				</td>
			</tr>
				
		<?php 
		$no++;
		}
		?>
		
	</tbody>
</table>
