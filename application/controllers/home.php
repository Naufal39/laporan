<?php
class home extends CI_Controller {

    public function __construct()
       {
            parent::__construct();
            $this->load->model('user_model');
            // Your own constructor code
    }

	public function index(){
		$username=$this->session->userdata('username');
		if($username!=""){
			$this->template->load('template','home');
		}
		else{
			$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
			redirect('login');
		}
	}

	

}

?>