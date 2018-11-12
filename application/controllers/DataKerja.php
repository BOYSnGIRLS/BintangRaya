<?php

class DataKerja extends CI_Controller {

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
            'title'=>'Data Kerja'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_datakerja');
        // $this->load->view('element/v_footer');
        }else{
            redirect('Login');
        }
	}
    public function get_autocomplete(){   //auto complete nama + alamat
        if (isset($_GET['term'])) {
            $result = $this->Model_GajiPegawai->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'=> $row->nama_pelanggan,
                    'alamat'=>$row->alamat_pelanggan,
                    'tgl_acara'=>$row->tgl_acara,
                    'id_sewa' => $row->id_sewa
                );
                echo json_encode($arr_result);
            }
        }
    }

    public function coba(){
        $result = $this->Model_GajiPegawai->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'=> $row->nama_pelanggan,
                    'alamat'=>$row->alamat_pelanggan,
                    'tgl_acara'=>$row->tgl_acara,
                    'id_sewa' => $row->id_sewa
                );
                echo json_encode($arr_result);
            }
    }

}
