<?php

class CariBarang extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Model_Transaksi');
        $this->model = $this->Model_Transaksi;
        $this->load->model('Model_app');
        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }


    function index(){
        $user = $this->session->userdata('username');
        $tgl1 = $this->session->userdata('tgl_acara1');
        $tgl2 = $this->session->userdata('tgl_acara2');
        $tgl_pasang = date('Y-m-d', strtotime('-1 day', strtotime($tgl1)));
        $tgl_bongkar = date('Y-m-d', strtotime('+1 day', strtotime($tgl2)));
        $data = array(
            'tgl_pasang' = $tgl_pasang,
            'tgl_acara1' = $tgl1,
            'tgl_acara2' = $tgl2,
            'tgl_bongkar' = $tgl_bongkar
            )
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
            $this->load->view('element/css');
            $this->load->view('element/v_header');
            $this->load->view('v_caribarang',$data);

        }else if($ceklevel == 1) {
            $this->load->view('element/css');
            $this->load->view('element/v_headerPegawai');
            $this->load->view('v_caribarang',$data);
            }
        }

        
    }

    public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
                $result = $this->Model_Transaksi->search1($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'=> $row->nama_barang,
                        'stok'=>$row->stok_barang,
                        'harga'=>$row->harga_sewa,
                        'jasa'=>$row->harga_jasa,
                        'id_barang' => $row->id_barang,
                    );
                    echo json_encode($arr_result);            
                }else{
                    $result = $this->Model_Transaksi->search2($_GET['term']);
                    if (count($result) > 0) {
                    foreach ($result as $row)
                        $arr_result[] = array(
                            'label'=> $row->jenis_tenda,
                            'stok'=>$row->stok_tenda,
                            'harga'=>$row->harga_sewa,
                            'jasa'=>$row->harga_jasa,
                            'id_barang' => $row->id_hargatenda
                        );
                        echo json_encode($arr_result); 
                }
            }
        }
    }

    public function inputTgl(){
        $this->Model_app->tgl_acara1 = $_POST['tgl_acara1'];
        $this->Model_app->tgl_acara2 = $_POST['tgl_acara1'];
        $this->session->set_userdata('tgl_acara1', $this->Model_app->tgl_acara1);
        $this->session->set_userdata('tgl_acara2', $this->Model_app->tgl_acara2);

    }
}
