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
        $kode['kode'] = $this->Model_Barang->get_id();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('home', $kode);	
        $this->load->view('element/v_footer');
	}

    

    function barang(){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_data3()
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$data+$kode);    
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

    // ===========================TENDA TENDA TENDA TENDA========================================

    function tenda(){
        $title=array(
            'title'=>'Data Tenda',
            'active_dashboard'=>'active'
        );
        $data['data']=$this->Model_Barang->get_tenda();
        $datapaket['data_paket']=$this->Model_Barang->get_pkttenda();
        $kode=array(
            'kode'=>$this->Model_Barang->get_idtenda(),
            'kode2'=> $this->Model_Barang->get_idpkttenda(),
            'option_ukuran' => $this->Model_Barang->get_tenda()
        ); 
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header');
        $this->load->view('v_datatenda',$data+$datapaket+$kode);    
        $this->load->view('element/v_footer');
    }

    public function tambah_tenda(){
        $data = array(
            'id_tenda' => $this->input->post('id_tenda'),
            'ukuran_tenda'     => $this->input->post('ukuran_tenda'),
            'stok_tenda' => $this->input->post('stok_tenda')
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
            'sewa_tenda' => $this->input->post('sewa_tenda'),
            'jasa_tenda' => $this->input->post('jasa_tenda')
        );
        $this->Model_Barang->tambah_paket($data);
        redirect('DataBarang/tenda');
    }

    function delete_paket($id){
        $this->Model_Barang->delete_paket($id);
        redirect('DataBarang/tenda');
    }
    //======================== BARANG BARANG BARANG BARANG ======================================

    function alatmakan(){
        $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'data'=>$this->Model_Barang->get_data2()
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $option_kategori['option_kategori'] = $this->Model_Barang->get_kategori();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$data+$kode+$option_kategori);    
        // $this->load->view('element/v_footer');
    }

    public function tambah_barang(){
        $data = array(
            'nama_barang'     => $this->input->post('nama_barang'),
            'harga_sewa' => $this->input->post('harga_sewa'),
            'harga_jasa' => $this->input->post('harga_jasa'),
            'stok_barang' => $this->input->post('stok_barang'),
            'id_kategori' => $this->input->post('id_kategori')

        );
        $this->Model_Barang->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('DataBarang/alatmakan');
    }
    function delete2($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/alatmakan');
    }

     function delete3($id){
        $this->Model_Barang->delete($id);
        redirect('DataBarang/barang');
    }

    function edit(){
        $id = $this->uri->segment(3);
        $data = array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            'user' => $this->Model_Barang->get_data_edit2($id)
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
