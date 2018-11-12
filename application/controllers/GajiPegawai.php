<?php

class GajiPegawai extends CI_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('Model_app');
        $this->load->model('GajiPegawai');
    }

	public function index()
	{	
		$data=array(
            'title'=>'Gaji Pegawai'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_gajipegawai');
        $this->load->view('element/v_footer');
	}

    }
