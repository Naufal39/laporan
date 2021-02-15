<?php
	class saldo_rekening_model extends Ci_model{
		function getsaldo(){
			return $this->db->get('saldo_rekening');
		}

		function update_saldo($insert_saldo){
			$this->db->where('id_saldo',1);
			$this->db->update('saldo_rekening',$insert_saldo);
		}

		public function set($saldo_akhir_besar) {
		return $this->db->query("update saldo_rekening set saldo_total='$saldo_akhir_besar' ");
	    }

	}
?>