<?php
class Pengeluaran_besar extends CI_Controller {

	public function __construct() {
		parent::__construct();
		 $this->load->model('akun_besar_model');
		 $this->load->model('pengeluaran_besar_model');
		 $this->load->model('saldo_besar_model');
		 $this->load->model('saldo_rekening_model');
		 $this->load->model('pemasukan_rekening_model');
	}

	 public function index(){
		$username=$this->session->userdata('username');
		if($username!=""){
			$data['data_akun'] = $this->akun_besar_model->GetAkun();
			$data['data_saldo'] = $this->saldo_besar_model->getsaldo();
			$data['data_saldo_rekening'] = $this->saldo_rekening_model->getsaldo();
			$this->template->load('template','pengeluaran_besar/index',$data);
		}
		else{
			$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
			redirect('login');
		}
	}

	public function tambah_pengeluaran() {

		$data_saldo_rekening=$this->saldo_rekening_model->getsaldo();
		$saldo ="belum";
		foreach ($data_saldo_rekening->result_array() as $tampil) {
			$saldo=$tampil['saldo_total'];
		}
		
		$kode_akun = $this->input->post('kode_akun');
		$nama_pengeluaran = $this->input->post('nama_pengeluaran');
		$jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
		$tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
		$keterangan = $this->input->post('keterangan');
		$saldo_total = $this->input->post('saldo_total');
		$saldo_total_rekening = $this->input->post('saldo_total_rekening');
		$saldo_akhir = $saldo_total-$jumlah_pengeluaran;
		$saldo_akhir_rekening = $saldo_total_rekening+$jumlah_pengeluaran;
		$cek = $this->input->post('cek');

		if ($cek=="besar") {

		$this->pengeluaran_besar_model->insert($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir,$keterangan);
		$this->saldo_besar_model->set($saldo_akhir);
		insert_log("Menambah data pengeluaran Besar.");
		}
		else {

			$this->pemasukan_rekening_model->insert2($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir_rekening,$keterangan);
			$this->saldo_besar_model->set($saldo_akhir);
			$this->pengeluaran_besar_model->insert($kode_akun,$nama_pengeluaran,$jumlah_pengeluaran,$tanggal_pengeluaran,$saldo_akhir,$keterangan);
			insert_log("Menambah data pengeluaran.");
			insert_log("Menambah data pemasukan Rekening.");


			
			if($saldo=="belum"){
			$masuk=array('saldo_total'=>0,'id_saldo'=>1);
			$this->db->insert('saldo_rekening',$masuk);
			$this->saldo_rekening_model->set($saldo_akhir_rekening);
			}
			else{
			$this->saldo_rekening_model->set($saldo_akhir_rekening);
			}

		insert_log("Menambah data pengeluaran Besar.");
		}
	}

	public function tampil_pengeluaran() {

		$data['data_pengeluaran'] = $this->pengeluaran_besar_model->Getpengeluaran();
		
		$this->load->view('pengeluaran_besar/tampil',$data);
	}

	public function update_pengeluaran() {

		$id_pengeluaran = $this->input->post('id_pengeluaran');
		$kode_pengeluaran = $this->input->post('kode_pengeluaran');
		$nama_pengeluaran = $this->input->post('nama_pengeluaran');

		$this->pengeluaran_besar_model->update($id_pengeluaran,$kode_pengeluaran,$nama_pengeluaran);
		insert_log('Mengubah Data Pengeluaran Besar');


	}

	public function delete_pengeluaran() {

		$id_pengeluaran = $this->input->post('id_pengeluaran');
		$jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');

		$saldo_total = $this->saldo_besar_model->getsaldo();
		foreach ($saldo_total->result_array() as $tampil) {
			$saldo_total2 = $tampil['saldo_total'];
		}

		$saldo_akhir = $saldo_total2 + $jumlah_pengeluaran;

		$this->pengeluaran_besar_model->delete($id_pengeluaran);
		$this->saldo_besar_model->set($saldo_akhir);
		insert_log('Menghapus Data Pengeluaran Besar');

	}

	public function edit_pengeluaran(){
		$id_pengeluaran=$this->input->post('id_pengeluaran');
		$data_saldo=$this->saldo_besar_model->getsaldo();
		foreach ($data_saldo->result_array() as $tampil) {
			$saldo=$tampil['saldo_total'];
		}
		$jumlah_pengeluaran=$this->input->post('jumlah_pengeluaran');
		$saldo_sekarang=$this->pengeluaran_besar_model->getjumlah($id_pengeluaran);
		foreach ($saldo_sekarang->result_array() as $tampil) {
			$jumlah_awal=$tampil['jumlah_pengeluaran'];
			$saldo_akhir=$tampil['saldo_akhir'];
		}

		$selisih_jumlah_terbaru=$jumlah_pengeluaran-$jumlah_awal;
		$saldo_terakhir=$saldo_akhir-$selisih_jumlah_terbaru;
		$update_saldo=$saldo-$selisih_jumlah_terbaru;

		$insert_pengeluaran=array('kode_akun'=>$this->input->post('kode_akun'),
				'nama_pengeluaran'=>$this->input->post('nama_pengeluaran'),
				'jumlah_pengeluaran'=>$this->input->post('jumlah_pengeluaran'),
				'tanggal_pengeluaran'=>$this->input->post('tanggal_pengeluaran'),
				'saldo_akhir'=>$saldo_terakhir,
				'keterangan'=>$this->input->post('keterangan')
			);
		$insert_saldo=array('saldo_total'=>$update_saldo
			);
		insert_log('Mengubah pengeluaran Pendapatan Besar');
		$this->pengeluaran_besar_model->update($insert_pengeluaran,$id_pengeluaran);
		$this->saldo_besar_model->update_saldo($insert_saldo);
	}

	public function cek_pengeluaran () {


		$query = $this->db->query("select * from saldo_besar");

		foreach ($query->result_array() as $tampil) {
			$saldo = $tampil['saldo_total'];
		}

		echo $saldo;

	}

	
}