<?php

class DataBarang extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Model_Barang');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }

    }
    

	public function index(){	
	   if($this->session->userdata('username')){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active'
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('home', $kode);   
        $this->load->view('element/v_footer');
       }else{
        redirect('Login');
       }
	}

    // ===========================TENDA TENDA TENDA TENDA========================================

    function tenda(){
        $title=array(
            'title'=>'Data Tenda',
            'active_dashboard'=>'active'
        );
        $option_kategori['option_kategori'] = $this->Model_Barang->get_kategori();
        $data['data']=$this->Model_Barang->get_tenda();
        $datapaket['data_paket']=$this->Model_Barang->get_pkttenda();
        $kode=array(
            'kode'=>$this->Model_Barang->get_idtenda(),
            'kode2'=> $this->Model_Barang->get_idpkttenda(),
            'option_ukuran' => $this->Model_Barang->get_tenda()
        ); 
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header');
        $this->load->view('v_datatenda',$data+$datapaket+$kode+$option_kategori);    
        $this->load->view('element/v_footer');
    }

    public function tambah_tenda(){
        $data = array(
            'id_tenda' => $this->input->post('id_tenda'),
            'ukuran_tenda'     => $this->input->post('ukuran_tenda'),
            'stok_tenda' => $this->input->post('stok_tenda'),
            'id_kategori' => $this->input->post('id_kategori')
        );
        $this->Model_Barang->tambah_tenda($data);
        redirect('DataBarang/tenda');
    }

    function delete_tenda($id){
        $this->Model_Barang->delete_tenda($id);
        redirect('DataBarang/tenda');
    }

// ===========================PAKET TENDA TENDA========================================
    public function tambah_paket(){
        $data = array(
            'id_hargatenda' => $this->input->post('id_hargatenda'),
            'id_tenda' => $this->input->post('id_tenda'),
            'jenis_tenda'     => $this->input->post('jenis_tenda'),
            'harga_sewa' => $this->input->post('sewa_tenda'),
            'harga_jasa' => $this->input->post('jasa_tenda')
        );
        $this->Model_Barang->tambah_paket($data);
        redirect('DataBarang/tenda');
    }

    function delete_paket($id){
        $this->Model_Barang->delete_paket($id);
        redirect('DataBarang/tenda');
    }

    //======================== BARANG ALAT MAKAN ======================================

    function alatmakan(){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_am()
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $option_kategori['option_kategori'] = $this->Model_Barang->get_kategori();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$data+$kode+$option_kategori);    
        $this->load->view('element/v_footer');
    }

    public function tambah_am(){
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'harga_sewa' => $this->input->post('harga_sewa'),
            'harga_jasa' => $this->input->post('harga_jasa'),
            'stok_barang' => $this->input->post('stok_barang'),
            'id_kategori' => $this->input->post('id_kategori')

        );
        $this->Model_Barang->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('DataBarang/alatmakan');
    }

    function edit_am(){
        $id2 = $this->uri->segment(3);
        $data = array(
            'user' => $this->Model_Barang->get_edit_am($id2),
        );
        redirect('DataBarang/alatmakan');
        // $this->load->view("App/edit_mhs", $data);
    
        
    }

     function update_am(){

        

        $id2 = $this->input->post('id_barang');
        $insert = $this->Model_Barang->update_barang(array(
                'id_barang' => $this->input->post('id_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_sewa' => $this->input->post('harga_sewa'),
                'harga_jasa' => $this->input->post('harga_jasa'),
                'stok_barang' => $this->input->post('stok_barang')
                
            ), $id2);
        redirect('DataBarang/alatmakan');

        // $data = array(
        //     'id_barang' => $this->input->post('id_barang'),
        //     'nama_barang' => $this->input->post('nama_barang'),
        //     'harga_sewa' => $this->input->post('harga_sewa'),
        //     'harga_jasa' => $this->input->post('harga_jasa'),
        //     'stok_barang' => $this->input->post('stok_barang'),
        //     'id_kategori' => $this->input->post('id_kategori')

        // );
        // $this->Model_Barang->update_barang($data);
        // echo json_encode($data);

    }

    function delete_am($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/barang');
    }
    // =========================== BARANG BARANG =========================

    function barang(){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_data3()
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $option_kategori['option_kategori'] = $this->Model_Barang->get_kategori();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$data+$kode+$option_kategori);    
        $this->load->view('element/v_footer');
    }

    public function tambah_barang(){
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'harga_sewa' => $this->input->post('harga_sewa'),
            'harga_jasa' => $this->input->post('harga_jasa'),
            'stok_barang' => $this->input->post('stok_barang'),
            'id_kategori' => $this->input->post('id_kategori')

        );
        $this->Model_Barang->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('DataBarang/barang');
    }

    function delete_barang($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/alatmakan');
    }

    
}
