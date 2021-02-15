<?php

class login extends CI_Controller {

    public function __construct()
       {
            parent::__construct();
            $this->load->model('user_model');
            // Your own constructor code
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function cek_login(){
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$cek=$this->user_model->cek_user($username,$password);
		foreach ($cek->result_array() as $tampil) {
			$hak_akses=$tampil['hak_akses'];
		}
		if ($cek->num_rows>0){
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);
			$this->session->set_userdata('hak_akses',$hak_akses);
			redirect('home');
		}

		else{
			$this->session->set_flashdata('confirm','Username atau Password Salah');
			redirect('login');
		}

	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('confirm','Anda telah logout.');
		redirect('login');
	}
}

?>