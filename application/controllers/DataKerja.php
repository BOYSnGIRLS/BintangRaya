<?php

class DataKerja extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_app');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }

	public function index(){	
        if($this->session->userdata('username')){
		$data=array(
            'title'=>'Data Kerja'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_datakerja');
        $this->load->view('element/v_footer');
        }else{
            redirect('Login');
        }
	}
}
