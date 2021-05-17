<table class="table table-hover table table-bordered">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<!-- <th>Kode Akun</th> -->
			<th>Jenis Muatan</th>
			<th><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1; 
			foreach ($data_muatan->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no;?></td>
				<!-- <td><?php echo $tampil['kode_akun']?></td> -->
				<td><?php echo $tampil['jenis_muatan']?></td>
				<td width="20%"><div align="center">
					<button jenis_muatan="<?php echo $tampil['jenis_muatan']?>" id_muatan="<?php echo $tampil['id_muatan']?>" id="edit" class="btn">Edit</button>
					<button id_muatan="<?php echo $tampil['id_muatan']?>" jenis_muatan="<?php echo $tampil['jenis_muatan']?>"   id="delete" class="btn btn-warning" >Delete</button>

						
				</div>
				</td>
			</tr>
		<?php
		$no++;
			}
		?>
	</tbody>
</table>
