<script type="text/javascript">
$(document).ready(function(){
	$("#update").hide();
	$("#batal").hide();
	function tampil() {
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>pengeluaran_besar/tampil_pengeluaran",
			success : function(data) {
				$("#tampil").html(data);
			}
		});
	}

	tampil();

	function kosong() {
		$("#kode_akun").val("");
		$("#nama_pengeluaran").val("");
		$("#jumlah_pengeluaran").val("");
		$("#tanggal_pengeluaran").val("<?php echo date ('Y-m-d');?>");
		$("#keterangan").val("");
		$("#kode_akun").val("").trigger("liszt:updated");
	}

	kosong();

	$("#simpan").click(function(){
		var kode_akun = $("#kode_akun").val();
		var nama_pengeluaran = $("#nama_pengeluaran").val();
		var jumlah_pengeluaran = $("#jumlah_pengeluaran").val();
		var tanggal_pengeluaran = $("#tanggal_pengeluaran").val();
		var keterangan = $("#keterangan").val();
		var saldo_total = $("#saldo_total").val();
		var saldo_total_rekening = $("#saldo_total_rekening").val();


		if ($('#cek').is(':checked')) {
			var cek = $("#cek").val();
			
		} else {
			cek="besar";
		}

		if (kode_akun=="") {
			alert('Kode Akun Tidak Boleh Kosong');
			$("#kode_akun").focus();
		}
		else if (nama_pengeluaran=="") {
			alert('Nama pengeluaran Tidak Boleh Kosong');
			$("#nama_pengeluaran").focus();
		}
		else if (jumlah_pengeluaran=="") {
			alert('Jumlah pengeluaran Tidak BOleh Kosong');
			$("#jumlah_pengeluaran").focus();
		}
		else if (tanggal_pengeluaran=="") {
			alert('Tanggal pengeluaran Tidak BOleh Kosong');
			$("#tanggal_pengeluaran").focus();
		}
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>pengeluaran_besar/tambah_pengeluaran",
			data:"kode_akun="+kode_akun+"&nama_pengeluaran="+nama_pengeluaran+"&jumlah_pengeluaran="+jumlah_pengeluaran+"&tanggal_pengeluaran="+tanggal_pengeluaran+"&keterangan="+keterangan+"&saldo_total="+saldo_total+"&cek="+cek+"&saldo_total_rekening="+saldo_total_rekening ,
			success : function(data) {

				$("#tampil").fadeOut("slow");
					tampil();
				$("#tampil").fadeIn("slow");

				kosong();
				alert('Data Berhasil Disimpan');
				window.location.reload();

			}


		});
		}

		

	});

	$("#update").click(function(){

		var kode_akun = $("#kode_akun").val();
		var nama_pengeluaran = $("#nama_pengeluaran").val();
		var jumlah_pengeluaran = $("#jumlah_pengeluaran").val();
		var tanggal_pengeluaran = $("#tanggal_pengeluaran").val();
		var keterangan = $("#keterangan").val();
		var id_pengeluaran = $("#id_pengeluaran").val();

		if (kode_akun=="") {
			alert('Kode Akun Tidak Boleh Kosong');
			$("#kode_akun").focus();
		}
		else if (nama_pengeluaran=="") {
			alert('Nama pengeluaran Tidak Boleh Kosong');
			$("#nama_pengeluaran").focus();
		}
		else if (jumlah_pengeluaran=="") {
			alert('Jumlah pengeluaran Tidak BOleh Kosong');
			$("#jumlah_pengeluaran").focus();
		}
		else if (tanggal_pengeluaran=="") {
			alert('Tanggal pengeluaran Tidak BOleh Kosong');
			$("#tanggal_pengeluaran").focus();
		}
		else {
			$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>pengeluaran_besar/edit_pengeluaran",
			data:"kode_akun="+kode_akun+"&nama_pengeluaran="+nama_pengeluaran+"&jumlah_pengeluaran="+jumlah_pengeluaran+"&tanggal_pengeluaran="+tanggal_pengeluaran+"&keterangan="+keterangan+"&saldo_total="+saldo_total+"&id_pengeluaran="+id_pengeluaran ,
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
		var nama_pengeluaran=$(this).attr('nama_pengeluaran');
		var jumlah_pengeluaran=$(this).attr('jumlah_pengeluaran');
		var tanggal_pengeluaran=$(this).attr('tanggal_pengeluaran');
		var keterangan=$(this).attr('keterangan');
		var id_pengeluaran=$(this).attr('id_pengeluaran');
		$("#simpan").hide();
		$("#update").show();
		$("#batal").show();
		$("#batal2").hide();

		$("#kode_akun").val(kode_akun).trigger("liszt:updated");
		$("#nama_pengeluaran").val(nama_pengeluaran);
		$("#jumlah_pengeluaran").val(jumlah_pengeluaran);
		$("#tanggal_pengeluaran").val(tanggal_pengeluaran);
		$("#keterangan").val(keterangan);
		$("#id_pengeluaran").val(id_pengeluaran);

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
		var id_pengeluaran=$(this).attr('id_pengeluaran');
		var nama_pengeluaran=$(this).attr('nama_pengeluaran');
		var jumlah_pengeluaran=$(this).attr('jumlah_pengeluaran');
		var answer = confirm ("Apakah Anda Ingin Menghapus Pengeluaran "+nama_pengeluaran+" ?");
			if (answer==true) {
					
				$.ajax({
						type:"POST",
						url:"<?php echo base_url();?>pengeluaran_besar/delete_pengeluaran",
						data:"id_pengeluaran="+id_pengeluaran+"&jumlah_pengeluaran="+jumlah_pengeluaran,
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

	$("#jumlah_pengeluaran").live('keyup',function(){


		var jumlah_pengeluaran = $("#jumlah_pengeluaran").val();

		$.ajax({

			type:"POST",
			url : "<?php echo base_url();?>pengeluaran_besar/cek_pengeluaran",

			success : function (data) {

				var hasil = data - jumlah_pengeluaran;

				if (hasil<0) {
					alert('Jumlah Pengeluaran Melebihi Saldo yang ada');
					 $("#jumlah_pengeluaran").val(data);
				}

			}

		});


	});



});

</script>
 <script>
$(function(){
window.prettyPrint && prettyPrint();
$('#awal').datepicker();
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
		  	<legend>Pengeluaran Besar</legend>
			<label class="control-label" for="nama_akun">Nama Akun</label>
			<div class="controls">
			  <select data-placeholder="Pilih Akun..." class="chzn-select"  tabindex="2" name="kode_akun" id="kode_akun">
			  	<option value=""></option>
			  	 	

				<?php
					foreach($data_akun->result_array() as $d)
					{
						
				?>
					
					<option value="<?php echo $d['kode_akun']; ?>"><?php echo $d['nama_akun']; ?></option>
				<?php
						
					}
				?>
			  </select>
			</div>
		  </div>
		   <div class="control-group">
			<label class="control-label">Nama pengeluaran</label>
			<div class="controls">
			  <input type="text" class="span" name="nama_pengeluaran" placeholder="Nama pengeluaran" id="nama_pengeluaran">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label">Jumlah pengeluaran</label>
			<div class="controls">
			  <input type="text" class="span" name="jumlah_pengeluaran" placeholder="Jumlah pengeluaran" id="jumlah_pengeluaran">
			</div>
		  </div>
		  <!--  <div class="control-group">
			<label class="control-label">Tanggal pengeluaran</label>
			<div class="controls">
			  <div class="input-append date" id="awal" data-date="<?php echo date('Y')."-".date('m')."-".date('d')?>" data-date-format="yyyy-mm-dd">
 				<input name="tanggal_pengeluaran" class="span2" placeholder="Tanggal Keluar" size="16" type="text" readonly="" id="tanggal_pengeluaran">
 				<span class="add-on">
 					<i class="icon-calendar"></i>
 				</span>
 			 </div>


			</div>
		  </div> -->
		  <div class="control-group">
			<label class="control-label">Tanggal Pengeluaran</label>
			<div class="controls">
			 <!--  <div class="input-append date" id="tanggal_pemasukan" data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd">
				<input name="tanggal_pemasukan" class="span" placeholder="Tanggal Pemasukan" size="20" type="text" id="tanggal" readonly="" value="">
				<span class="add-on">
				<i class="icon-calendar"></i>
				</span>
			  </div> -->
			   <div class="input-append date" id="awal" data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd">
				<input class="span" name="tanggal_pengeluaran" size="20" type="text"  id="tanggal_pengeluaran" readonly="true" value="<?php echo date ('Y-m-d');?>">
				<!-- <input name="tanggal_pemasukan" class="span" placeholder="Tanggal Pemasukan" size="20" type="text" id="tanggal" readonly="" value="">
				 --><span class="add-on">
				<i class="icon-calendar"></i>
				</span>
			  </div>
		  </div>
		</div>

		  <div class="control-group">
			<label class="control-label">Keterangan</label>
			<div class="controls">
			<textarea rows="3" class="span4" name="keterangan" id="keterangan"></textarea>
			</div>
		  </div>
		   <div class="control-group">
			<div class="controls">
			   <input type="checkbox" name="cek" value="cek" id="cek"> Pilih Checkbox jika ingin dimasukkan ke Rekening
			</div>
		  </div>
		  <div class="control-group">
		  	
			
			<div class="controls">
				<?php 
				foreach ($data_saldo->result_array() as $sal) { ?>
		  		<input type="hidden" name="saldo_total" id="saldo_total" value="<?php echo $sal['saldo_total'] ?>">
		  	<?php
		  	}
		  	?>
			
			</div>
			<div class="controls">
				<?php 
				foreach ($data_saldo_rekening->result_array() as $sal_rekening) { ?>
		  		<input type="hidden" name="saldo_total_rekening" id="saldo_total_rekening" value="<?php echo $sal_rekening['saldo_total'] ?>">
		  	<?php
		  	}
		  	?>
			
			</div>
		  </div>
		  <input type="hidden" id="id_pengeluaran" >
		 <!--  <input type="text" id="kode" > -->
		  
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

 



