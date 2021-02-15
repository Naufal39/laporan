<?php
	class saldo_besar_model extends Ci_model{
		function getsaldo(){
			return $this->db->get('saldo_besar');
		}

		function update_saldo($insert_saldo){
			$this->db->where('id_saldo',1);
			$this->db->update('saldo_besar',$insert_saldo);
		}

		public function set($saldo_akhir_besar) {
		return $this->db->query("update saldo_besar set saldo_total='$saldo_akhir_besar' ");
	    }

	}
?>