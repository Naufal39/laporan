<script type="text/javascript">
$(document).ready(function(){

	$("#update").hide();
	$("#batal").hide();

	function tampil() {
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>pemasukan/tampil_pemasukan",
			success : function(data) {
				$("#tampil").html(data);
			}
		});
	}

	tampil();

	function kosong() {
		$("#kode_akun").val("");
		$("#nama_pemasukan").val("");
		$("#jumlah_pemasukan").val("");
		$("#tanggal").val("<?php echo date ('Y-m-d');?>");
		$("#keterangan").val("");
		$("#kode_akun").val("").trigger("liszt:updated");

	}
	kosong();

	$("#simpan").click(function(){
		var kode_akun = $("#kode_akun").val();
		var nama_pemasukan = $("#nama_pemasukan").val();
		var jumlah_pemasukan = $("#jumlah_pemasukan").val();
		var tanggal = $("#tanggal").val();
		var keterangan = $("#keterangan").val();

		if (kode_akun=="") {
			alert('Kode Akun Tidak Boleh Kosong');
			$("#kode_akun").focus();
		}
		else if (nama_pemasukan=="") {
			alert('Nama Pemasukan Tidak Boleh Kosong');
			$("#nama_pemasukan").focus();
		}
		else if (jumlah_pemasukan=="") {
			alert('Jumlah Pemasukan Tidak Boleh Kosong');
			$("#jumlah_pemasukan").focus();
		}
		else if (tanggal=="") {
			alert('Tanggal Pemasukan Tidak Boleh Kosong');
			$("#nama_pemasukan").focus();
		}
		/*else if (keterangan=="") {
			alert('Keterangan Tidak Boleh Kosong');
			$("#nama_pemasukan").focus();
		}*/
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>pemasukan/tambah_pemasukan",
			data:"kode_akun="+kode_akun+"&nama_pemasukan="+nama_pemasukan+"&jumlah_pemasukan="+jumlah_pemasukan+"&tanggal_pemasukan="+tanggal+"&keterangan="+keterangan,
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
		var kode_akun = $("#kode_akun").val();
		var nama_pemasukan = $("#nama_pemasukan").val();
		var jumlah_pemasukan = $("#jumlah_pemasukan").val();
		var tanggal = $("#tanggal").val();
		var keterangan = $("#keterangan").val();
		var id_pemasukan=$("#id_pemasukan").val();
		if (kode_akun=="") {
			alert('Kode Akun Tidak Boleh Kosong');
			$("#kode_akun").focus();
		}
		else if (nama_pemasukan=="") {
			alert('Nama Pemasukan Tidak Boleh Kosong');
			$("#nama_pemasukan").focus();
		}
		else if (jumlah_pemasukan=="") {
			alert('Jumlah Pemasukan Tidak Boleh Kosong');
			$("#jumlah_pemasukan").focus();
		}
		else if (tanggal=="") {
			alert('Tanggal Pemasukan Tidak Boleh Kosong');
			$("#nama_pemasukan").focus();
		}
		else if (keterangan=="") {
			alert('Keterangan Tidak Boleh Kosong');
			$("#nama_pemasukan").focus();
		}
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>pemasukan/edit_pemasukan",
			data:"kode_akun="+kode_akun+"&nama_pemasukan="+nama_pemasukan+"&jumlah_pemasukan="+jumlah_pemasukan+"&tanggal_pemasukan="+tanggal+"&keterangan="+keterangan+"&id_pemasukan="+id_pemasukan,
			success : function(data) {

				$("#tampil").fadeOut("slow");
					tampil();
				$("#tampil").fadeIn("slow");

				$("#simpan").show();
				$("#update").hide();
				$("#batal").hide();
				$("#batal2").show();
				kosong();
				alert('Data Berhasil Disimpan');
			}
		});
		}

	});

	$("#edit").live('click',function(){
		var kode_akun=$(this).attr('kode_akun');
		var nama_pemasukan=$(this).attr('nama_pemasukan');
		var jumlah_pemasukan=$(this).attr('jumlah_pemasukan');
		var tanggal_pemasukan=$(this).attr('tanggal_pemasukan');
		var keterangan=$(this).attr('keterangan');
		var id_pemasukan=$(this).attr('id_pemasukan');
		$("#simpan").hide();
		$("#update").show();
		$("#batal").show();
		$("#batal2").hide();
								
		$("#kode_akun").val(kode_akun).trigger("liszt:updated");
		$("#nama_pemasukan").val(nama_pemasukan);
		$("#jumlah_pemasukan").val(jumlah_pemasukan);
		$("#tanggal").val(tanggal_pemasukan);
		$("#keterangan").val(keterangan);
		$("#id_pemasukan").val(id_pemasukan);
	});

	$("#batal").click(function(){
		$("#simpan").show();
		$("#update").hide();
		$("#batal").hide();
		$("#batal2").show();
		kosong();
	});	

	$("#batal2").click(function(){
		kosong();
	});				
	$("#delete").live('click',function(){
		var id_pemasukan=$(this).attr('id_pemasukan');
		var nama_pemasukan=$(this).attr('nama_pemasukan');
		var answer = confirm ("Apakah Anda Ingin Menghapus "+nama_pemasukan+" ?");
			if (answer==true) {
					
				$.ajax({
						type:"POST",
						url:"<?php echo base_url();?>pemasukan/delete_pemasukan",
						data:"id_pemasukan="+id_pemasukan,
						success : function(data) {
									$("#tampil").fadeOut("slow");
									tampil();
									$("#tampil").fadeIn("slow");
									alert('Data Berhasil Dihapus');
								}
						});

			}
			else {
				alert("Anda Tidak Jadi Menghapus "+nama_pemasukan+" ?");
				}
								
								
								
	});



});

</script>
 <script>
$(function(){
window.prettyPrint && prettyPrint();
$('#tanggal_pemasukan').datepicker();
});
</script>



<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	<div class="form-horizontal">
		
		  <div class="control-group">
		  	<legend>Pemasukan Kas Kecil</legend>
			<label class="control-label">Kode Akun</label>
			<div class="controls">
			  <select data-placeholder="Pilih Akun..." id="kode_akun" name="kode_akun" class="chzn-select">
			  	<option value=""></option>
			  	<?php
			  		foreach ($data_akun->result_array() as $tampil) {
			  			?>
			  		<option value="<?php echo $tampil['kode_akun']?>"><?php echo $tampil['nama_akun']?></option>
			  	<?php	}
			  	?>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label">Nama Pemasukan</label>
			<div class="controls">
			  <input type="text" class="span"  name="nama_pemasukan" placeholder="Pemasukan" id="nama_pemasukan">
			</div>
		  </div>
		   <div class="control-group">
			<label class="control-label">Jumlah Pemasukan</label>
			<div class="controls">
			  <input type="text" class="span" name="jumlah_pemasukan" placeholder="Jumlah" id="jumlah_pemasukan">
			</div>
		  </div>
		   <div class="control-group">
			<label class="control-label">Tanggal Pemasukan</label>
			<div class="controls">
			 <!--  <div class="input-append date" id="tanggal_pemasukan" data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd">
				<input name="tanggal_pemasukan" class="span" placeholder="Tanggal Pemasukan" size="20" type="text" id="tanggal" readonly="" value="">
				<span class="add-on">
				<i class="icon-calendar"></i>
				</span>
			  </div> -->
			   <div class="input-append date" id="tanggal_pemasukan" data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd">
				<input class="span" name="tanggal_pemasukan" size="20" type="text"  id="tanggal" readonly="true" value="<?php echo date ('Y-m-d');?>">
				<span class="add-on">
				<i class="icon-calendar"></i>
				</span>
			  </div>
		  </div>
		</div>
		   <div class="control-group">
			<label class="control-label">Keterangan</label>
			<div class="controls">
			  <textarea id="keterangan" nama="keterangan" class="span4" rows="5"></textarea>
			</div>
		  </div>
		  <input type="hidden" id="id_pemasukan" >
		  
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

 



