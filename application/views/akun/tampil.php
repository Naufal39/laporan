<table class="table table-hover table table-bordered">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<!-- <th>Kode Akun</th> -->
			<th>Nama Akun</th>
			<th><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1; 
			foreach ($data_akun->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no;?></td>
				<!-- <td><?php echo $tampil['kode_akun']?></td> -->
				<td><?php echo $tampil['nama_akun']?></td>
				<td width="20%"><div align="center">
					<button nama_akun="<?php echo $tampil['nama_akun']?>" id_akun="<?php echo $tampil['id_akun']?>" rugi_laba="<?php echo $tampil['rugi_laba']?>" id="edit" class="btn">Edit</button>
					<button id_akun="<?php echo $tampil['id_akun']?>" nama_akun="<?php echo $tampil['nama_akun']?>"   id="delete" class="btn btn-warning" >Delete</button>

						
				</div>
				</td>
			</tr>
		<?php
		$no++;
			}
		?>
	</tbody>
</table>
