<?php
class Pemasukan_besar extends CI_Controller {

    public function __construct()
       {
            parent::__construct();
            $this->load->model('pemasukan_besar_model');
            $this->load->model('akun_besar_model');
            $this->load->model('saldo_besar_model');
            // Your own constructor code
    }

	public function index(){
		$username=$this->session->userdata('username');
		if($username!=""){
			$data['data_akun']=$this->akun_besar_model->GetAkun();
			$this->template->load('template','pemasukan_besar/index',$data);
		}
		else{
			$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
			redirect('login');
		}
	}

	public function tampil_pemasukan() {
		$data['data_pemasukan'] = $this->pemasukan_besar_model->GetPemasukan();
		$this->load->view('pemasukan_besar/tampil',$data);
	}

	public function tambah_pemasukan(){
		$data_saldo=$this->saldo_besar_model->getsaldo();
		$saldo ="belum";
		foreach ($data_saldo->result_array() as $tampil) {
			$saldo=$tampil['saldo_total'];
		}
		$saldo_akhir=$this->input->post('jumlah_pemasukan')+$saldo;
		$insert_pemasukan=array('kode_akun'=>$this->input->post('kode_akun'),
				'nama_pemasukan'=>$this->input->post('nama_pemasukan'),
				'jumlah_pemasukan'=>$this->input->post('jumlah_pemasukan'),
				'tanggal_pemasukan'=>$this->input->post('tanggal_pemasukan'),
				'saldo_akhir'=>$saldo_akhir,
				'keterangan'=>$this->input->post('keterangan')
			);
		$insert_saldo=array('saldo_total'=>$saldo_akhir
			);
		insert_log('Menambah Pemasukan Pendapatan Besar');
		$this->pemasukan_besar_model->insert($insert_pemasukan);
		if($saldo=="belum"){
			$masuk=array('saldo_total'=>0,'id_saldo'=>1);
			$this->db->insert('saldo_besar',$masuk);
			$this->saldo_besar_model->update_saldo($insert_saldo);
		}
		else{
			$this->saldo_besar_model->update_saldo($insert_saldo);
		}
	}

	public function delete_pemasukan(){
		$id_pemasukan=$this->input->post('id_pemasukan');
		$jumlah_saldo=$this->pemasukan_besar_model->getjumlah($id_pemasukan);
		foreach ($jumlah_saldo->result_array() as $tampil) {
			$jumlah=$tampil['jumlah_pemasukan'];
		}
		$data_saldo=$this->saldo_besar_model->getsaldo();
		foreach ($data_saldo->result_array() as $tampil) {
			$saldo=$tampil['saldo_total'];
		}

		$saldo_akhir=$saldo-$jumlah;
		$insert_saldo=array('saldo_total'=>$saldo_akhir
			);
		$this->saldo_besar_model->update_saldo($insert_saldo);
		$this->pemasukan_besar_model->delete($id_pemasukan);
		insert_log('Menghapus Data Pemasukan Besar');
	}

	public function edit_pemasukan(){
		$id_pemasukan=$this->input->post('id_pemasukan');
		$data_saldo=$this->saldo_besar_model->getsaldo();
		foreach ($data_saldo->result_array() as $tampil) {
			$saldo=$tampil['saldo_total'];
		}
		$jumlah_pemasukan=$this->input->post('jumlah_pemasukan');
		$saldo_sekarang=$this->pemasukan_besar_model->getjumlah($id_pemasukan);
		foreach ($saldo_sekarang->result_array() as $tampil) {
			$jumlah_awal=$tampil['jumlah_pemasukan'];
			$saldo_akhir=$tampil['saldo_akhir'];
		}

		$jumlah_terbaru=$jumlah_pemasukan-$jumlah_awal;
		$saldo_terakhir=$saldo_akhir+$jumlah_terbaru;
		$update_saldo=$saldo+$jumlah_terbaru;

		$insert_pemasukan=array('kode_akun'=>$this->input->post('kode_akun'),
				'nama_pemasukan'=>$this->input->post('nama_pemasukan'),
				'jumlah_pemasukan'=>$this->input->post('jumlah_pemasukan'),
				'tanggal_pemasukan'=>$this->input->post('tanggal_pemasukan'),
				'saldo_akhir'=>$saldo_terakhir,
				'keterangan'=>$this->input->post('keterangan')
			);
		$insert_saldo=array('saldo_total'=>$update_saldo
			);
		insert_log('Mengubah Pemasukan Pendapatan Besar');
		$this->pemasukan_besar_model->update_saldo($insert_pemasukan,$id_pemasukan);
		$this->saldo_besar_model->update_saldo($insert_saldo);
	}
}

?>