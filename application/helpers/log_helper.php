<?php
	function insert_log($aktifitas){
		$ci = & get_instance();
		$ci->load->database();
		$data=array('username'=>$ci->session->userdata('username'),
					 'aktifitas'=>$aktifitas
			);
	$ci->db->insert('log', $data); 
	}

	function convert_bulan($i=null){
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

		return $bulan;		
	}

	function buatrp($angka){
		$jadi = "Rp " . number_format($angka,2,',','.');
		return $jadi;
	}

	

?>