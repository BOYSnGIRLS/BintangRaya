<?php

class ListPengembalian extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Pengembalian');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }

	public function index(){	
        if($this->session->userdata('username')){
    		$data=array(
                'title'=>'List Pengembalian',
                'data' => $this->Model_Pengembalian->tampil_semua()
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header');
            $this->load->view('v_listpengembalian', $data);
    	   }else{
            redirect('Login');
           }
        }

    public function detail(){
        $id = $this->uri->segment(3);
        $title['title']='List Pengembalian';
        $data=array(
                'data' => $this->Model_Pengembalian->tampil($id),
                'detail_sewa1' => $this->Model_Pengembalian->get_sewa1($id),
                'detail_sewa2' =>$this->Model_Pengembalian->get_sewa2($id)
            );
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header');
        $this->load->view('v_detailkembali', $data);
        $this->load->view('element/v_footer');

    }
}
