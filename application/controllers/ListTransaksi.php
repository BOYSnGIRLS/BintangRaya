<?php

class ListTransaksi extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Transaksi');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }

	public function index(){
        $tampil['trans'] =  $this->Model_Transaksi->tampil_transaksi();
        $data=array(
            'title'=>'List Transaksi'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_listtransaksi', $tampil);
        $this->load->view('element/v_footer');
	   

    
    }
}
