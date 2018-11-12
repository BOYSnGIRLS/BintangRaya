<?php

class DataKerja extends CI_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('Model_app');
        $this->load->model('Model_GajiPegawai');
    }

	public function index()
	{	
		$data=array(
            'title'=>'Data Kerja'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_datakerja');
        $this->load->view('element/v_footer');
	}
    public function get_autocomplete(){   //auto complete nama + alamat
        if (isset($_GET['term'])) {
            $result = $this->GajiPegawai->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'=> $row->nama_pelanggan,
                    'alamat'=>$row->alamat_pelanggan,
                    'tgl_acara'=>$row->harga_sewa,
                    'id_sewa' => $row->id_sewa
                );
                echo json_encode($arr_result);
            }
        }
    }

}
