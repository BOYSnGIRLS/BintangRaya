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
                'active_listkembali'=>'active',
                'data' => $this->Model_Pengembalian->tampil_semua()
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header',$data);
            $this->load->view('v_listpengembalian', $data);
    	   }else{
            redirect('Login');
           }
        }

    public function detail(){
        $id = $this->uri->segment(3);
        $title=array(
            'title'=>'List Pengembalian',
            'active_listkembali'=>'active'
        );
        $data=array(
                'data' => $this->Model_Pengembalian->tampilkembali($id),
                'detail_kembali1' => $this->Model_Pengembalian->get_kembali1($id),
                'detail_kembali2' =>$this->Model_Pengembalian->get_kembali2($id)
            );
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header', $title);
        $this->load->view('v_detailkembali', $data);
        $this->load->view('element/v_footer');

    }

     public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
                $result = $this->Model_Pengembalian->search($_GET['term']);
                $result = $this->Model_Pengembalian->search2($_GET['term']);
                // $result = $this->Model_Pengembalian->search3($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'=> $row->id_sewa,
                        'nama_pelanggan'=>$row->nama_pelanggan,
                        'no_telp'=>$row->telp_pelanggan,
                        'alamat'=>$row->alamat_pelanggan,
                        'tgl_acara1' => $row->tgl_acara1,
                        'tgl_acara2' => $row->tgl_acara2,
                    );
                    echo json_encode($arr_result);            
                }
        }
    }

    public function inputdetail(){
        $title=array(
            'title'=>'List Pengembalian',
            'active_listkembali'=>'active'
        );
        $this->load->view('element/css', $title);
        $this->load->view('element/v_header', $title);
        $this->load->view('v_inputkembali');
        // $this->load->view('element/v_footer');
    }

    public function inputtampil(){
        $id = $this->input->post('id_sewa');
        $kode['kode'] = $this->Model_Pengembalian->get_notrans();
        $data=array(
            'data' => $this->Model_Pengembalian->tampil($id),
            'detail_sewa1' => $this->Model_Pengembalian->get_sewa1($id),
            'detail_sewa2' =>$this->Model_Pengembalian->get_sewa2($id)
        );
        $title=array(
            'title'=>'List Pengembalian',
            'active_listkembali'=>'active'
        );
        $this->load->view('element/css', $title);
        $this->load->view('element/v_header', $title);
        $this->load->view('v_inputkembali', $data+$kode);

    }

    public function inputkembali(){
        if (isset($_POST['btnSimpan'])) {
            // $kode=$this->input->post('id_kembali');
            $kode=$this->Model_Pengembalian->get_notrans();
            $id_sewa=$this->input->post('id_sewa');
            $idT = $this->input->post('idhargaTenda');
            $idB = $this->input->post('idBarang');
            $jumlah_sewaT = $this->input->post('tendaSewa');
            $jumlah_sewaB = $this->input->post('barangSewa');
            $jumlah_kembaliT = $this->input->post('tenda_kembali');
            $jumlah_kembaliB = $this->input->post('barang_kembali');
            $indexT = 0;

            foreach ($idT as $row) {
                $hilangrusak = $jumlah_sewaT[$indexT]-$jumlah_kembaliT[$indexT];
                $this->db->query("INSERT INTO `detail_kembali_tenda`(`id_kembali`,  `id_tenda`, `jumlah_sewa`, `jumlah_kembali`,  `hilangrusak`) VALUES ('".$kode."', '".$row."', '".$jumlah_sewaT[$indexT]."',  '".$jumlah_kembaliT[$indexT]."', '".$hilangrusak."') ");
                $indexT++;

            }

            $indexB = 0;
            foreach ($idB as $row) {
                $hilangrusak = $jumlah_sewaB[$indexB]-$jumlah_kembaliB[$indexB];
                $this->db->query("INSERT INTO `detail_kembali_barang`(`id_kembali`,  `id_barang`, `jumlah_sewa`, `jumlah_kembali`,  `hilangrusak`) VALUES ('".$kode."', '".$row."', '".$jumlah_sewaB[$indexB]."',  '".$jumlah_kembaliB[$indexB]."', '".$hilangrusak."') ");
                $indexB++;
            }

            $this->db->query("INSERT INTO `pengembalian`(`id_kembali`, `id_sewa`) VALUES ('$kode', '$id_sewa') ");
            $this->db->query("UPDATE `sewa` SET `status`='1' WHERE `id_sewa`='$id_sewa'");
            redirect('ListPengembalian');   
        }
    }
}
