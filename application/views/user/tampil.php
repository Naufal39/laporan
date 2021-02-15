<table class="table table-hover table table-bordered">
	<thead>
		<tr bgcolor="#c1c1c5">
			<th>No</th>
			<th>Username</th>
			<th>Hak Akses</th>
			<th><div align="center">Aksi</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1; 
			foreach ($data_user->result_array() as $tampil) { ?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $tampil['username']?></td>
				<td><?php echo $tampil['hak_akses']?></td>
				<td width="20%"><div align="center">			
				    <!-- Button to trigger modal -->
				    <a href="#myModal" role="button" data-toggle="modal"><button username="<?php echo $tampil['username']?>" hak_akses="<?php echo $tampil['hak_akses']?>" id_user="<?php echo $tampil['id_user']?>" id="edit" class="btn">Edit</button></a>
				     
				    <!-- Modal -->
				    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				    <h3 id="myModalLabel">Ubah Data User</h3>
				    </div>
				    <div class="modal-body">
				    	<div class="form-horizontal">
								<div class="control-group">
								<label class="control-label">Hak Akses</label>
								<div class="controls">
								  <select id="hak_akses_update">
										<option value="">Silahkan Pilih</option>
								  		<option value="admin">Admin</option>
								  		<option value="operator_kecil">Operator Kas Kecil</option>
								  		<option value="operator_besar">Operator Kas Besar</option>
								  		<option value="user">User</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">User Name</label>
								<div class="controls">
								  <input type="text" class="span" name="username" placeholder="Username" id="username_update">
								  <input type="hidden" class="span" name="username" placeholder="Username" id="id_user">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Password Lama</label>
								<div class="controls">
								  <input type="password" class="span" name="nama_akun" placeholder="Password" id="password_lama">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Password Baru</label>
								<div class="controls">
								  <input type="password" class="span" name="nama_akun" placeholder=" Password" id="password_baru1">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">Ulangi Password Baru</label>
								<div class="controls">
								  <input type="password" class="span" name="nama_akun" placeholder="Ulangi Password" id="password_baru2">
								</div>
							  </div>
							</div>
				    </div>
				    <div class="modal-footer">
				    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
				    <button class="btn btn-primary" data-dismiss="modal" id="update">Simpan</button>
				    </div>
				    </div>

    				<button id_user="<?php echo $tampil['id_user']?>" username="<?php echo $tampil['username']?>"   id="delete" class="btn btn-warning" >Delete</button>
						
				</div>
				</td>
			</tr>
		<?php
		$no++;
			}
		?>
	</tbody>
</table>
