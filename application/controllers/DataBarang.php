<?php

class DataBarang extends CI_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->helper(array('url'));
        $this->load->model('Model_Barang');
    }

	public function index()
	{	
	   $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('home');	
        $this->load->view('element/v_footer');
	}

    function home(){
        $data=array(
            'title'=>'Data Tenda',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_data()
        );

        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_datatenda',$data);    
        $this->load->view('element/v_footer');
    }

    function home2(){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_data2()
        );

        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$data);    
        $this->load->view('element/v_footer');
    }
    
    function home3(){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_data3()
        );

        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$data);    
        $this->load->view('element/v_footer');
    }

    function input(){
        if (isset($_POST['btnTambah'])){
            $data = $this->Model_Barang->input(array (
            'id_barang' => $this->input->post('kodeBarang'),
            'nama_barang' => $this->input->post('namaBarang'),
            'stok_barang' => $this->input->post('stokBarang'),
            'sewa_barang' => $this->input->post('sewaBarang'),
            'jasa_barang' => $this->input->post('jasaBarang')));
            redirect('DataBarang/home');
        }else{
            $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active'
        );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header');
            $this->load->view('v_inputBarang');
            $this->load->view('element/v_footer');
        }
    }

    function delete($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/home');
    }

    function delete2($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/home2');
    }

     function delete3($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/home3');
    }

    function edit(){
        $id = $this->uri->segment(3);
        $data = array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'user' => $this->Model_Barang->get_data_edit($id)
        );
        
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view("v_editbarang", $data);
         $this->load->view('element/v_footer');

    }

    function update(){
        $id = $this->input->post('id_barang');
        $insert = $this->Model_Barang->update(array(
                
                'nama_barang' => $this->input->post('nama_barang'),
                'stok_barang' => $this->input->post('stok_barang'),
                'sewa_barang' => $this->input->post('sewa_barang'),
                'jasa_barang' => $this->input->post('jasa_barang'),
            ), $id);
        redirect('DataBarang/home');
        }
}
