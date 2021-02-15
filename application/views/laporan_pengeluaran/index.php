<div class="form-horizontal">
		
		  <div class="control-group">
		  	<legend>Laporan Pengeluaran </legend>
			<label class="control-label">Bulan dan Tahun</label>
			<div class="controls">
			  <select id="bulan" style="width:90px;">
			  	<?php
			  	$bln=date('m');
			  		for ($i=01; $i <=12 ; $i++) {
			  			if($i==1){
			  				$bulan="Januari";
			  			}
			  			else if($i==2){
			  				$bulan="Februari";
			  			}
			  			else if($i==3){
			  				$bulan="Maret";
			  			}
			  			else if($i==4){
			  				$bulan="April";
			  			}
			  			else if($i==5){
			  				$bulan="Mei";
			  			}
			  			else if($i==6){
			  				$bulan="Juni";
			  			}
			  			else if($i==7){
			  				$bulan="Juli";
			  			}
			  			else if($i==8){
			  				$bulan="Agustus";
			  			}
			  			else if($i==9){
			  				$bulan="September";
			  			}
			  			else if($i==10){
			  				$bulan="Oktober";
			  			}
			  			else if($i==11){
			  				$bulan="November";
			  			} 
			  			else{
			  				$bulan="Desember";
			  			}

			  			if($i==$bln){
			  				echo "<option value='$i' selected='selected'>$bulan</option>";
			  			}
			  			else{
			  			echo "<option value='$i'>$bulan</option>";
			  			}
			  		}
			  	?>
			  </select>
			  <select id="tahun" style="width:100px;">
			  	<?php
			  		$tahun=date('Y');
			  		for ($i=$tahun; $i >=2012 ; $i--) { 
			  			echo "<option value='$i'>$i</option>";
			  		}
			  	?>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<div class="controls">
			 <?php echo form_button(array('type'=>'button','content'=>'Tampilkan','value'=>'Tampilkan','class'=>'btn btn-primary','id'=>'tampilkan'));?>
			</div>
		  </div>
		</div>
<hr>
<div id="tampil">
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#tampilkan").click(function(){
		var bulan=$("#bulan").val();
		var tahun=$("#tahun").val();
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>laporan/tampil_laporan_pengeluaran",
			data:"bulan="+bulan+"&tahun="+tahun,
			success : function(data) {
				$("#tampil").html(data);
			}
		});
	});
});
</script>