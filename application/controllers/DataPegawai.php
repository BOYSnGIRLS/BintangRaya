<?php

class DataPegawai extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Model_Pegawai');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }

    }

    public function index(){	
	   if($this->session->userdata('username')){
        $data=array(
            'title'=>'Data Pegawai',
            'active_datapegawai'=>'active'
        );
        $id_user['id_user'] = $this->Model_Barang->get_id();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header', $data);
        $this->load->view('home', $kode);   
        $this->load->view('element/v_footer');
       }else{
        redirect('Login');
       }
	}
    
	
	
}
