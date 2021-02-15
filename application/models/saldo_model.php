<?php
	class saldo_model extends Ci_model{
		function getsaldo(){
			return $this->db->get('saldo');
		}

		function update_saldo($insert_saldo){
			$this->db->where('id_saldo',1);
			$this->db->update('saldo',$insert_saldo);
		}

		public function set($saldo_akhir) {
		return $this->db->query("update saldo set saldo_total='$saldo_akhir' ");
	    }

	}
?>