<script type="text/javascript">
$(document).ready(function(){

	$("#update").hide();
	$("#batal").hide();

	function tampil() {
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>muatan/tampil_muatan",
			success : function(data) {
				$("#tampil").html(data);
			}
		});
	}

	tampil();

	function kosong() {
		// $("#kode_akun").val("");
		$("#nama_muatan").val("");
		$("#id_muatan").val("");
		$("#cek").prop('checked',false) ;

	}

	$("#simpan").click(function(){
		// var kode_akun = $("#kode_akun").val();
		var jenis_muatan = $("#jenis_muatan").val();

		if ($('#cek').is(':checked')) {
			var cek = $("#cek").val();
			
		} else {
			cek="rugi_laba";
		}

		
		if (jenis_muatan=="") {
			alert('Jenis Muatan Tidak Boleh Kosong');
			$("#jenis_muatan").focus();
		}
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>muatan/tambah_muatan",
			// data:"kode_akun="+kode_akun+"&nama_akun="+nama_akun+"&cek="+cek,
			data:"jenis_muatan="+jenis_muatan+"&cek="+cek,
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

		var id_muatan = $("#id_muatan").val();
		// var kode_akun = $("#kode_akun").val();
		var jenis_muatan = $("#jenis_muatan").val();

		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>muatan/update_muatan",
			//data:"kode_akun="+kode_akun+"&nama_akun="+nama_akun+"&id_akun="+id_akun+"&cek="+cek,
			data:"jenis_muatan="+jenis_muatan+"&id_muatan="+id_muatan,
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
		// var kode_akun=$(this).attr('kode_akun');
		var jenis_muatan=$(this).attr('jenis_muatan');
		$("#simpan").hide();
		$("#update").show();
		$("#batal").show();
		$("#batal2").hide();
								
		// $("#kode_akun").val(kode_akun);
		$("#jenis_muatan").val(jenis_muatan);
		$("#id_muatan").val(id_muatan);
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
		var id_muatan=$(this).attr('id_muatan');
		var answer = confirm ("Apakah Anda Ingin Menghapus?");
			if (answer==true) {
					
				$.ajax({
						type:"POST",
						url:"<?php echo base_url();?>muatan/delete_muatan",
						data:"id_muatan="+id_muatan,
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

	// $("#nama_akun").live('click',function(){
	// 	var kode_akun = $("#kode_akun").val();

	// 	$.ajax({

	// 		type:"POST",
	// 		url : "<?php echo base_url();?>akun/cek_kode_akun",
	// 		data : "kode_akun="+kode_akun,
	// 		success : function (data) {
	// 			var hasil = data;
	// 			if (hasil!="") {
	// 				alert('Kode akun Sudah Dipakai');
	// 				 $("#kode_akun").val(hasil);
	// 				 $("#kode_akun").focus();
	// 			}

	// 		}

	// 	});


	// });



});

</script>
	<div class="form-horizontal">
		
		  <div class="control-group">
		  	<legend>Data Master Jenis Komoditas</legend>
			<!-- <label class="control-label">Kode Akun</label>
			<div class="controls">
			  <input type="text" class="span" name="kode_akun" placeholder="Kode Akun" id="kode_akun">
			</div> -->
		  </div>
		  <div class="control-group">
			<label class="control-label">Jenis Komoditas</label>
			<div class="controls">
			  <input type="text" class="span" name="jenis_muatan" placeholder="Jenis Komoditas" id="jenis_muatan">
			</div>
		  </div>
		  <div class="control-group">
		  	<!-- <div class="controls">
		  		<input type="checkbox" name="cek" value="cek" id="cek"> Pilih Checkbox jika akun tidak termasuk dalam rugi/laba

		  	</div> -->
		  </div>
		  <input type="hidden" id="id_muatan" >
		  
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