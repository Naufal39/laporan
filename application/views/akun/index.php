<script type="text/javascript">
$(document).ready(function(){

	$("#update").hide();
	$("#batal").hide();

	function tampil() {
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>akun/tampil_akun",
			success : function(data) {
				$("#tampil").html(data);
			}
		});
	}

	tampil();

	function kosong() {
		$("#kode_akun").val("");
		$("#nama_akun").val("");
		$("#id_akun").val("");
		$("#cek").prop('checked',false) ;

	}

	$("#simpan").click(function(){
		var kode_akun = $("#kode_akun").val();
		var nama_akun = $("#nama_akun").val();

		if ($('#cek').is(':checked')) {
			var cek = $("#cek").val();
			
		} else {
			cek="rugi_laba";
		}

		if (kode_akun=="") {
			alert('Kode Akun Tidak Boleh Kosong');
			$("#kode_akun").focus();
		}
		else if (nama_akun=="") {
			alert('Nama Akun Tidak BOleh Kosong');
			$("#nama_akun").focus();
		}
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>akun/tambah_akun",
			data:"kode_akun="+kode_akun+"&nama_akun="+nama_akun+"&cek="+cek,
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

	$("#update").click(function(){

		var id_akun = $("#id_akun").val();
		var kode_akun = $("#kode_akun").val();
		var nama_akun = $("#nama_akun").val();

		if ($('#cek').is(':checked')) {
			var cek = $("#cek").val();
			
		} else {
			cek="rugi_laba";
		}

		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>akun/update_akun",
			data:"kode_akun="+kode_akun+"&nama_akun="+nama_akun+"&id_akun="+id_akun+"&cek="+cek,
			success : function(data) {

				$("#tampil").fadeOut("slow");
					tampil();
				$("#tampil").fadeIn("slow");

				kosong();
				alert('Data Berhasil Diupdate');

				$("#simpan").show();
				$("#update").hide();

			}


		});

	});

	$("#edit").live('click',function(){
		var kode_akun=$(this).attr('kode_akun');
		var nama_akun=$(this).attr('nama_akun');
		var id_akun=$(this).attr('id_akun');
		var rugi_laba=$(this).attr('rugi_laba');
		$("#simpan").hide();
		$("#update").show();
		$("#batal").show();
		$("#batal2").hide();

		if(rugi_laba=="N") {
			$("#cek").prop('checked',true) ;
		}
		else {

		}
								
		$("#kode_akun").val(kode_akun);
		$("#nama_akun").val(nama_akun);
		$("#id_akun").val(id_akun);
		$("#rugi_laba").val(rugi_laba);
	});

	$("#batal").click(function(){
		$("#update").hide();
		$("#batal").hide();
		$("#batal2").show();
		$("#simpan").show();
		kosong();
	});

	$("#batal2").click(function(){
		kosong();
	});

							
	$("#delete").live('click',function(){
		var id_akun=$(this).attr('id_akun');
		var answer = confirm ("Apakah Anda Ingin Menghapus?");
			if (answer==true) {
					
				$.ajax({
						type:"POST",
						url:"<?php echo base_url();?>akun/delete_akun",
						data:"id_akun="+id_akun,
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
		  	<legend>Data Master Akun Kecil</legend>
			<label class="control-label">Kode Akun</label>
			<div class="controls">
			  <input type="text" class="span" name="kode_akun" placeholder="Kode Akun" id="kode_akun">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label">Nama akun</label>
			<div class="controls">
			  <input type="text" class="span" name="nama_akun" placeholder="Nama Akun" id="nama_akun">
			</div>
		  </div>
		  <div class="control-group">
		  	<div class="controls">
		  		<input type="checkbox" name="cek" value="cek" id="cek"> Pilih Checkbox jika akun tidak termasuk dalam rugi/laba

		  	</div>
		  </div>
		  <input type="hidden" id="id_akun" >
		  <input type="hidden"  id="rugi_laba">
		  
		  <div class="control-group">
			<div class="controls">
			 <?php echo form_button(array('type'=>'button','content'=>'Simpan','value'=>'Simpan','class'=>'btn btn-primary','id'=>'simpan'));?>
			 <?php echo form_button(array('type'=>'button','content'=>'Update','value'=>'Update','class'=>'btn btn-primary','id'=>'update'));?>            
			 <?php echo form_button(array('type'=>'button','content'=>'Batal','value'=>'Batal','class'=>'btn btn-primary','id'=>'batal'));?>            
			 <?php echo form_button(array('type'=>'button','content'=>'Batal','value'=>'Batal','class'=>'btn btn-primary','id'=>'batal2'));?>            
			</div>
		  </div>
		</div>

<div id="tampil">
</div>

 



