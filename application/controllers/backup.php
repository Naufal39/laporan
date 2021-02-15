<?php
class Backup extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index () {
		$username=$this->session->userdata('username');
		if ($username!="") {

			$this->template->load('template','backup/index');
		}
		else {

			$this->session->set_flashdata('confirm','Silahkan Login Terlebih Dahulu');
			redirect('login');
		}

	}

	function backup_tables() {

$this->load->helper('download');
$tanggal=date('Ymd-His');
$namaFile=$tanggal . '.sql.zip';
$this->load->dbutil();
$backup=& $this->dbutil->backup();
force_download($namaFile, $backup);
		
}
}