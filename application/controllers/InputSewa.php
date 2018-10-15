<?php

class InputSewa extends CI_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('Model_app');
    }

	public function index()
	{	
		$data=array(
            'title'=>'Input Sewa'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_inputsewa');
        $this->load->view('element/v_footer');
	}
}
