<?php

class DataBarang extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Model_Barang');
        $this->load->model('Model_app');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }

    }
    

	public function index(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
    	   if($this->session->userdata('username')){
            $data=array(
                'title'=>'Data Barang',
                'active_dashboard'=>'active'
            );
            $kode['kode'] = $this->Model_Barang->get_id();
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header', $data);
            $this->load->view('home', $kode);   
            $this->load->view('element/v_footer');
           }else{
            redirect('Login');
           }
         }elseif ($ceklevel == 1) {
            $data=array(
                'title'=>'Data Barang',
            );
            $this->session->set_flashdata('notif', 'ANDA TIDAK DAPAT MENGAKSES HALAMAN INI');
            $this->load->view('element/css',$data);
            $this->load->view('v_notfound');  
              $this->load->view('element/v_footer'); 
         }
	}

    // ===========================TENDA TENDA TENDA TENDA========================================

    function tenda(){
        $title=array(
            'title'=>'Data Tenda',
            'active_dashboard'=>'active'
        );
        $tenda['tenda']=$this->Model_Barang->get_tenda();
        $datapaket['data_paket']=$this->Model_Barang->get_pkttenda();
        $kode=array(
            'kode'=>$this->Model_Barang->get_idtenda(),
            'kode2'=> $this->Model_Barang->get_idpkttenda(),
            'option_ukuran' => $this->Model_Barang->get_tenda()
        ); 
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header', $tenda);
        $this->load->view('v_datatenda',$tenda+$datapaket+$kode);    
        $this->load->view('element/v_footer');
    }

     function cari_tenda(){
        if(isset($_POST['btnSubmit2'])){
            $jenis_tenda = $_POST['jenis_tenda'];
            $title=array(
            'title'=>'Data Tenda',
            'active_dashboard'=>'active'
            );
            $tenda['tenda']=$this->Model_Barang->get_tenda();
            $datapaket['data_paket']=$this->Model_Barang->cari_tenda($jenis_tenda);
            $kode=array(
                'kode'=>$this->Model_Barang->get_idtenda(),
                'kode2'=> $this->Model_Barang->get_idpkttenda(),
                'option_ukuran' => $this->Model_Barang->get_tenda()
            );
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header');
            $this->load->view('v_datatenda',$tenda+$datapaket+$kode);    
            $this->load->view('element/v_footer');
        } else{
        
            $data=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active'
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header', $data);
        $this->load->view('home', $kode);   
        $this->load->view('element/v_footer');
    }
    }

    public function tambah_tenda(){
        $data = array(
            'id_tenda' => $this->input->post('id_tenda'),
            'ukuran_tenda' => $this->input->post('ukuran_tenda'),
            'stok_tenda' => $this->input->post('stok_tenda'),
        );
        $this->Model_Barang->tambah_tenda($data);
        redirect('DataBarang/tenda');
    }
    
    function edit_tenda(){
        $id = $this->uri->segment(3);
        $data = array(
            'title'=> 'Edit Tenda',
            'active_dashboard'=>'active',
            'user' => $this->Model_Barang->get_edit_tenda($id),
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header', $data);
        $this->load->view("v_edittenda", $data);
         $this->load->view('element/v_footer');
    }

    function update_tenda(){

        $id = $this->input->post('id_tenda');
        $insert = $this->Model_Barang->update_tenda(array(
                'id_tenda' => $this->input->post('id_tenda'),
                'ukuran_tenda' => $this->input->post('ukuran_tenda'),
                'stok_tenda' => $this->input->post('stok_tenda')
                
            ), $id);
        redirect('DataBarang/tenda');
    }


    // function delete_tenda($id){
    //     $this->Model_Barang->delete_tenda($id);
    //     redirect('DataBarang/tenda');
    // }

    function delete_tenda(){
        $id=$this->input->post('id_tenda');
        $this->Model_Barang->delete_tenda($id);
        redirect('DataBarang/tenda');
    }

// ===========================PAKET TENDA TENDA========================================
    public function tambah_paket(){
        $ukuran['ukuran'] = $this->Model_Barang->ukuran($this->input->post('id_tenda'));
        $jenis_tenda = $this->input->post('jenis_tenda');
        $nama = $jenis_tenda.' '.$ukuran['ukuran'];
        $data = array(
            'id_hargatenda' => $this->input->post('id_hargatenda'),
            'id_tenda' => $this->input->post('id_tenda'),
            'jenis_tenda'  => $nama,
            'harga_sewa' => $this->input->post('sewa_tenda'),
            'harga_jasa' => $this->input->post('jasa_tenda')
        );
        $this->Model_Barang->tambah_paket($data);
        redirect('DataBarang/tenda');
    }

    function edit_pakettenda(){
        $id1 = $this->uri->segment(3);
        $data = array(
            'title'=> 'Edit Tenda',
            'active_dashboard'=>'active',
            'user' => $this->Model_Barang->get_edit_pakettenda($id1),
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header', $data);
        $this->load->view("v_editpakettenda", $data);
         $this->load->view('element/v_footer');
    }

    function update_pakettenda(){

        $id1 = $this->input->post('id_hargatenda');
        $insert = $this->Model_Barang->update_pakettenda(array(
                'id_hargatenda' => $this->input->post('id_hargatenda'),
                'jenis_tenda' => $this->input->post('jenis_tenda'),
                'harga_sewa' => $this->input->post('harga_sewa'),
                'harga_jasa' => $this->input->post('harga_jasa')
                
            ), $id1);
        redirect('DataBarang/tenda');
    }
    
    function delete_pakettenda(){
        $id1=$this->input->post('id_hargatenda');
        $this->Model_Barang->delete_paket($id1);
        redirect('DataBarang/tenda');
    }

    // =================== KATEGORI =======================

    public function tambah_kategori(){
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->Model_Barang->tambah_kategori($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('DataBarang/barang');
    }

    function edit_kategori(){
        $id3 = $this->uri->segment(3);
        $data = array(
            'title'=> 'Edit Kategori',
            'active_dashboard'=>'active',
            'user' => $this->Model_Barang->get_edit_kategori($id3),
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view("v_editkategori", $data);
         $this->load->view('element/v_footer');
    }

     function update_kategori(){

        $id3 = $this->input->post('id_kategori');
        $insert = $this->Model_Barang->update_kategori(array(
                'id_kategori' => $this->input->post('id_kategori'),
                'nama_kategori' => $this->input->post('nama_kategori')
            ), $id3);
        redirect('DataBarang/barang');
    }
    
    function delete_kategori(){
        $id3=$this->input->post('id_hargatenda');
        $this->Model_Barang->delete_kategori($id3);
        redirect('DataBarang/barang');
    }
    
    
    // =========================== BARANG BARANG ========================


    function barang(){
        $title=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
        );
        $kode['kode'] = $this->Model_Barang->get_id();
        $option_kategori ['option_kategori'] = $this->Model_Barang->get_kategori();
        $kategori['kategori'] = $this->Model_Barang->get_kategori();
        $data['data'] = $this->Model_Barang->get_barang();
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header');
        $this->load->view('v_databarang',$kode+$data+$kategori+$option_kategori);       
        $this->load->view('element/v_footer');
    }

    function cari_barang(){
        if(isset($_POST['btnSubmit'])){

            $nama_barang = $_POST['nama_barang'];
            $kode['kode'] = $this->Model_Barang->get_id();
            $option_kategori ['option_kategori'] = $this->Model_Barang->get_kategori();
            $kategori['kategori'] = $this->Model_Barang->get_kategori();
            $data['data'] = $this->Model_Barang->cari_barang($nama_barang);
            $title=array(
            'title'=>'Data Barang',
            'active_dashboard'=>'active',
            );
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header');
            $this->load->view('v_databarang',$kode+$kategori+$option_kategori+$data);       
            $this->load->view('element/v_footer');

           
        } else{
        
        $this->load->view('home',$data);
        }
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


    function edit_barang(){
        $id2 = $this->uri->segment(3);
        $data = array(
            'title'=> 'Edit Data Barang',
            'active_dashboard'=>'active',
            'user' => $this->Model_Barang->get_edit_barang($id2),
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header', $data);
        $this->load->view("v_editbarang", $data);
         $this->load->view('element/v_footer');
    }

    function update_barang(){

        $id2 = $this->input->post('id_barang');
        $insert = $this->Model_Barang->update_barang(array(
                'id_barang' => $this->input->post('id_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_sewa' => $this->input->post('harga_sewa'),
                'harga_jasa' => $this->input->post('harga_jasa'),
                'stok_barang' => $this->input->post('stok_barang')
                
            ), $id2);
        redirect('DataBarang/barang');
    }

    function delete_barang(){
        $id2=$this->input->post('id_barang');
        $this->Model_Barang->delete($id2);
        redirect('DataBarang/barang');
    }

    
}
