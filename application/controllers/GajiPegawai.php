<?php

class GajiPegawai extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_app');
        $this->load->model('Model_GajiPegawai');
        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }

	public function index(){	
        if($this->session->userdata('username')){
		$data=array(
            'title'=>'Gaji Pegawai'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_gajipegawai');
        $this->load->view('element/v_footer');

	}
    else{
        redirect('Login');

	   }
       
       }
    }

