<script type="text/javascript">
$(document).ready(function(){

	function tampil() {
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>user/tampil",
			success : function(data) {
				$("#tampil").html(data);
			}
		});
	}

	tampil();

	function kosong() {
		$("#hak_akses").val("");
		$("#username").val("");
		$("#password1").val("");
		$("#password2").val("");

	}
	kosong();

	$("#simpan").click(function(){
		var hak_akses = $("#hak_akses").val();
		var username = $("#username").val();
		var password1 = $("#password1").val();
		var password2 = $("#password2").val();

		if (hak_akses=="") {
			alert('Hak Akses Tidak Boleh Kosong');
			$("#hak_akses").focus();
		}
		else if (username=="") {
			alert('Username Tidak Boleh Kosong');
			$("#username").focus();
		}
		else if (password1=="") {
			alert('Password Tidak Boleh Kosong');
			$("#password1").focus();
		}
		else if (password2=="") {
			alert('Ulangi Password Tidak Boleh Kosong');
			$("#password2").focus();
		}
		else if (password1!=password2) {
			alert('Password dan Ulangi Password Harus Sama');
		}
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>user/tambah_user",
			data:"hak_akses="+hak_akses+"&username="+username+"&password="+password1,
			success : function(data) {

				$("#tampil").fadeOut("slow");
					tampil();
				$("#tampil").fadeIn("slow");

				kosong();
				alert('Data Berhasil Disimpan');

			}


		});
		}

		

	});

	$("#update").live("click",function(){

		var hak_akses=$("#hak_akses_update").val();
		var username=$("#username_update").val();
		var id_user=$("#id_user").val();
		var password_baru1=$("#password_baru1").val();
		var password_baru2=$("#password_baru2").val();
		var password_lama=$("#password_lama").val();
		if (hak_akses=="") {
			alert('Hak Akses Tidak Boleh Kosong');
			$("#hak_akses").focus();
		}
		else if (username=="") {
			alert('Username Tidak Boleh Kosong');
			$("#username").focus();
		}
		else if (password_lama=="") {
			alert('Password Lama Tidak Boleh Kosong');
			$("#password_lama").focus();
		}
		else if (password_baru1=="") {
			alert('Password Baru Tidak Boleh Kosong');
			$("#password_lama").focus();
		}
		else if (password_baru2=="") {
			alert('ulangi Password Baru Tidak Boleh Kosong');
			$("#password_lama").focus();
		}
		else if (password_baru1!=password_baru2) {
			alert('Password dan Ulangi Password Baru Harus Sama');
		}
		else{
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>user/update_user",
			data:"id_user="+id_user+"&username="+username+"&password="+password_lama+"&password_baru="+ password_baru1+"&hak_akses="+hak_akses,
			success : function(data) {

				$("#tampil").fadeOut("slow");
					tampil();
				$("#tampil").fadeIn("slow");
				alert(data);
				kosong();
			}


		});
		}



	});

	$("#edit").live('click',function(){
		var id_user=$(this).attr('id_user');
		var username=$(this).attr('username');
		var hak_akses=$(this).attr('hak_akses');
		$("#hak_akses_update").val(hak_akses);
		$("#username_update").val(username);
		$("#id_user").val(id_user);
	});

	$("#batal2").click(function(){
		kosong();
	});

							
	$("#delete").live('click',function(){
		var id_user=$(this).attr('id_user');
		var answer = confirm ("Apakah Anda Ingin Menghapus?");
			if (answer==true) {
					
				$.ajax({
						type:"POST",
						url:"<?php echo base_url();?>user/delete_user",
						data:"id_user="+id_user,
						success : function(data) {
									$("#tampil").fadeOut("slow");
									tampil();
									$("#tampil").fadeIn("slow");
									alert('Data Berhasil Dihapus');
								}
						});
			}
			else {
				alert('Anda Tidak Jadi Menghapus');
				}									
	});

	$("#nama_akun").live('click',function(){
		var kode_akun = $("#kode_akun").val();

		$.ajax({

			type:"POST",
			url : "<?php echo base_url();?>akun/cek_kode_akun",
			data : "kode_akun="+kode_akun,
			success : function (data) {
				var hasil = data;
				if (hasil!="") {
					alert('Kode akun Sudah Dipakai');
					 $("#kode_akun").val(hasil);
					 $("#kode_akun").focus();
				}

			}

		});


	});



});

</script>
	<div class="form-horizontal">
			<div class="control-group">
		  	<legend>Tambah User </legend>
			<label class="control-label">Hak Akses</label>
			<div class="controls">
			  <select id="hak_akses">
			  		<option value="">Silahkan Pilih</option>
			  		<option value="admin">Admin</option>
			  		<option value="operator_kecil">Operator Kas Kecil</option>
			  		<option value="operator_besar">Operator Kas Besar</option>>
			  		<option value="user">User</option>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label">User Name</label>
			<div class="controls">
			  <input type="text" class="span" name="username" placeholder="Username" id="username">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label">Password</label>
			<div class="controls">
			  <input type="password" class="span" name="nama_akun" placeholder="Password" id="password1">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label">Ulangi Password</label>
			<div class="controls">
			  <input type="password" class="span" name="nama_akun" placeholder="Ulangi Password" id="password2">
			</div>
		  </div>
		  <div class="control-group">
			<div class="controls">
			 <?php echo form_button(array('type'=>'button','content'=>'Simpan','value'=>'Simpan','class'=>'btn btn-primary','id'=>'simpan'));?> 
			 <?php echo form_button(array('type'=>'button','content'=>'Batal','value'=>'Batal','class'=>'btn btn-primary','id'=>'batal2'));?>            
			</div>
		  </div>
		</div>

<div id="tampil">
</div>

 



