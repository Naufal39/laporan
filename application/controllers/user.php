<?php
class user extends Ci_Controller{
	 public function __construct()
       {
            parent::__construct();
            $this->load->model('user_model');
            // Your own constructor code
    }

	public function index(){
		$username=$this->session->userdata('username');
		if($username!=""){
			$this->template->load('template','user/index');
		}
		else{
			$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
			redirect('login');
		}
	}

	public function tampil() {

		$data['data_user'] = $this->user_model->GetUser();
		
		$this->load->view('user/tampil',$data);
	}

	public function tambah_user(){
		$tambah=array(
		'username'=>$this->input->post('username'),
		'password'=>md5($this->input->post('password')),
		'hak_akses'=>$this->input->post('hak_akses')
		);

		$this->user_model->insert($tambah);
	}

	public function update_user(){
		$id_user=$this->input->post('id_user');
		$password_lama=md5($this->input->post('password'));
		$cek=$this->db->query("select * from user where id_user='$id_user' and password='$password_lama'");
		if($cek->num_rows()>0){
			$update=array('username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password_baru')),
				'hak_akses'=>$this->input->post('hak_akses')
				);
			$this->db->where('id_user',$id_user);
			$this->db->update('user',$update);
			echo "Data Berhasil di ubah";
		}else{
			echo "Password Lama Anda Salah!!";
		}

	}

	public function delete_user(){
		$id_user=$this->input->post('id_user');
		$this->db->query("delete from user where id_user='$id_user'");
	}

}
?>