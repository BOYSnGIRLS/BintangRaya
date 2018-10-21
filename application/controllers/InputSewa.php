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
            'title'=>'Input Sewa',
            'active_inputsewa'=>'active'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_inputsewa');
	}

    public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
            $result = $this->Model_app->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'=> $row->nama_barang,
                    'id_barang' => $row->id_barang
                );
                echo json_encode($arr_result);
            }
        }
    }
}
