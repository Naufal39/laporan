<?php
class Akun_besar extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('akun_besar_model');
            // Your own constructor code
    }

    public function index(){
		$username=$this->session->userdata('username');
		if($username!=""){
			$this->template->load('template','akun_besar/index');
		}
		else{
			$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
			redirect('login');
		}
	}

	public function tambah_akun() {
		
		$kode_akun = $this->input->post('kode_akun');
		$nama_akun = $this->input->post('nama_akun');

		$rugi_laba = "Y";
		$rugi_laban = "N";

		$cek = $this->input->post('cek');

		if ($cek=="rugi_laba") {

			

			$this->akun_besar_model->insert($kode_akun,$nama_akun,$rugi_laba);
			
		}
		else {
			

			$this->akun_besar_model->insert2($kode_akun,$nama_akun,$rugi_laban);

		}
	}

	public function tampil_akun() {

		$data['data_akun'] = $this->akun_besar_model->GetAkun();
		
		$this->load->view('akun_besar/tampil',$data);
	}

	public function update_akun() {

		$id_akun = $this->input->post('id_akun');
		$kode_akun = $this->input->post('kode_akun');
		$nama_akun = $this->input->post('nama_akun');

		$rugi_laba = "Y";
		$rugi_laban = "N";

		$cek = $this->input->post('cek');

		if ($cek=="rugi_laba") {

			

			$this->akun_besar_model->update($id_akun,$kode_akun,$nama_akun,$rugi_laba);
			
		}
		else {
			

			$this->akun_besar_model->update2($id_akun,$kode_akun,$nama_akun,$rugi_laban);

		}

		


	}

	public function delete_akun() {

		$id_akun = $this->input->post('id_akun');

		$this->akun_besar_model->delete($id_akun);
	}

	public function cek_kode_akun() {

		$kode_akun = $this->input->post('kode_akun');

		$query = $this->akun_besar_model->cekakun($kode_akun);

		$akun="";


		foreach ($query->result_array() as $tampil) {
			$akun = $tampil['kode_akun'];
		}
		echo $akun;
	}
}