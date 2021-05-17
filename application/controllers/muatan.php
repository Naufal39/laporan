<?php
class muatan extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('muatan_model');
            // Your own constructor code
    }

    public function index(){
		$username=$this->session->userdata('username');
		if($username!=""){
			$this->template->load('template','muatan/index');
		}
		else{
			$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
			redirect('login');
		}
	}

	public function tambah_muatan() {
		
		// $kode_akun = $this->input->post('kode_akun');
		$jenis_muatan = $this->input->post('jenis_muatan');
		// $rugi_laba = "Y";
		// $rugi_laban = "N";

		$cek = $this->input->post('cek');

		if ($cek=="rugi_laba") {

			

			// $this->akun_model->insert($kode_akun,$nama_akun,$rugi_laba);
			$this->muatan_model->insert($jenis_muatan);
			
		}
		else {
			

			// $this->akun_model->insert2($kode_akun,$nama_akun,$rugi_laban);
			$this->akun_model->insert2($nama_akun,$rugi_laban);

		}

	}

	public function tampil_muatan() {

		$data['data_muatan'] = $this->muatan_model->GetMuatan();
		
		$this->load->view('muatan/tampil',$data);
	}

	public function update_muatan() {

		$id_akun = $this->input->post('id_muatan');
		// $kode_akun = $this->input->post('kode_akun');
		$jenis_muatan = $this->input->post('jenis_muatan');


			// $this->akun_model->update($id_akun,$kode_akun,$nama_akun,$rugi_laba);
			$this->muatan_model->update($id_muatan,$jenis_muatan);




	}

	public function delete_muatan() {

		$id_muatan = $this->input->post('id_muatan');

		$this->muatan_model->delete($id_muatan);
	}

	public function cek_kode_akun() {
		$kode_akun = $this->input->post('kode_akun');

		$query = $this->akun_model->cekakun($kode_akun);

		$akun="";

			foreach ($query->result_array() as $tampil) {
			$akun = $tampil['kode_akun'];
			}
		echo $akun;


	}
}