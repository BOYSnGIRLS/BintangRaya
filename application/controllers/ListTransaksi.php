<?php

class ListTransaksi extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Laporan');
        $this->load->model('Model_Transaksi');
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
            if(isset($_GET['time']) && ! empty($_GET['time'])){
                $time = $_GET['time'];
                if ($time == 'menunggu') {
                    $ket = 'Data Status Menunggu';
                    $transaksi = $this->Model_Laporan->status_menunggu();
                }else if ($time == 'proses') {
                    $ket = 'Data Status Proses';
                    $transaksi = $this->Model_Laporan->status_proses();
                }else if ($time == 'selesai'){
                    $ket = 'Data Status Selesai';
                    $transaksi = $this->Model_Laporan->status_selesai();
                }else{
                    $ket = 'Data Status Kembali';
                    $transaksi = $this->Model_Laporan->status_kembali();
                }
            }else{ 
                $ket = 'Semua Data Transaksi';
                $transaksi = $this->Model_Laporan->view_all();
            }
            
            $data['ket'] = $ket;
            $data['trans'] = $transaksi;

            $title=array(
                'title'=>'List Transaksi',
                'active_listtransaksi' => 'active'
            );
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header',$title);
            $this->load->view('v_listtransaksi', $title+$data);
            // $this->load->view('element/v_footer'); 
        }else if($ceklevel == 1) {
            if(isset($_GET['time']) && ! empty($_GET['time'])){
                $time = $_GET['time'];
                if ($time == 'menunggu') {
                    $ket = 'Data Status Menunggu';
                    $transaksi = $this->Model_Laporan->status_menunggu();
                }else if ($time == 'proses') {
                    $ket = 'Data Status Proses';
                    $transaksi = $this->Model_Laporan->status_proses();
                }else if ($time == 'selesai'){
                    $ket = 'Data Status Selesai';
                    $transaksi = $this->Model_Laporan->status_selesai();
                }else{
                    $ket = 'Data Status Kembali';
                    $transaksi = $this->Model_Laporan->status_kembali();
                }
            }else{ 
                $ket = 'Semua Data Transaksi';
                $transaksi = $this->Model_Laporan->view_all();
            }
            
            $data['ket'] = $ket;
            $data['trans'] = $transaksi;

            $title=array(
                'title'=>'List Transaksi',
                'active_listtransaksi' => 'active'
            );
            $this->load->view('element/css',$title);
            $this->load->view('element/v_headerPegawai',$title);
            $this->load->view('v_listtransaksi', $title+$data);
            // $this->load->view('element/v_footer'); 
        }else{
            $title=array(
                'title'=>'List Transaksi',
                'active_listtransaksi' => 'active'
            );
            $this->load->view('element/v_headerPegawai',$title);
        }
    }

    function suratjalan($id){


        $id = $this->uri->segment(3);
        $data = array(
            'title'=>'Surat Jalan',
            'active_listtransaksi'=>'active',
            'data'=>$this->Model_Laporan->surat_jalan($id),
            'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
            'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
        );
        
        $this->load->view('element/css',$data);
        // $this->load->view('element/v_header', $data);
        $this->load->view('v_suratjalan', $data);
        $this->load->view('element/v_footer'); 
        
    }


    function notatagihan(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
            $id = $this->uri->segment(3);
            if (isset($_POST['btnTambah'])){
                $kode['kode'] = $this->input->post('id_sewa');
                $bayar = $this->input->post('bayar');
                $kembalian = $this->input->post('kembalian');

                $this->db->query("UPDATE `sewa` SET `bayar`='".$bayar."',`kembalian`='".$kembalian."' WHERE id_sewa='".$kode['kode']."'");

            redirect(base_url('ListTransaksi'));


            }else{
                $data = array(
                'title'=>'Nota Tagihan',
                'active_listtransaksi'=>'active',
                'data'=>$this->Model_Laporan->nota_tagihan($id),
                'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
                'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
            );
            }
            
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header', $data);
            $this->load->view('v_notatagihan', $data);
            $this->load->view('element/v_footer'); 
        }else if($ceklevel == 1){
            $id = $this->uri->segment(3);
            if (isset($_POST['btnTambah'])){
                $kode['kode'] = $this->input->post('id_sewa');
                $bayar = $this->input->post('bayar');
                $kembalian = $this->input->post('kembalian');

                $this->db->query("UPDATE `sewa` SET `bayar`='".$bayar."',`kembalian`='".$kembalian."' WHERE id_sewa='".$kode['kode']."'");

            redirect(base_url('ListTransaksi'));


            }else{
                $data = array(
                'title'=>'Nota Tagihan',
                'active_listtransaksi'=>'active',
                'data'=>$this->Model_Laporan->nota_tagihan($id),
                'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
                'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
                );
            }
            
            $this->load->view('element/css',$data);
            $this->load->view('element/v_headerPegawai', $data);
            $this->load->view('v_notatagihan', $data);
            $this->load->view('element/v_footer'); 
        }else{
            $data = array(
                'title'=>'Nota Tagihan',
                'active_listtransaksi'=>'active',
                'data'=>$this->Model_Laporan->nota_tagihan($id),
                'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
                'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
                );
            $this->load->view('element/css',$data);
            $this->load->view('v_login', $data);
        }
    }

    function notatagihan2(){
        $id = $this->uri->segment(3);
        $data = array(
            'title'=>'Nota Tagihan',
            'active_listtransaksi'=>'active',
            'data'=>$this->Model_Laporan->nota_tagihan($id),
            'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
            'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
        );
        
        $this->load->view('element/css',$data);
        $this->load->view('v_notatagihan2', $data);
        $this->load->view('element/v_footer'); 
        
    }

    function update_status(){
        $id=$this->input->post('id_sewa');
        $status=$this->input->post('status');
        // $index=0;
        // foreach ($id as $row) {
        // if($_GET['id'] == "Menunggu Proses"){
        if($status == "Menunggu Proses"){
            $status= "Proses";

        }else{
                $status = "Selesai";
        }
        $insert = $this->Model_Laporan->update_status(array(
               'id_sewa' => $id,
               'status' => $status
        ), $id);
        redirect('ListTransaksi/index');
            // $index++;
    }

    public function edit_transaksi(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
            $id = $this->uri->segment(3);
            $data = array(
                'title'=>'Edit Transaksi',
                'active_listtransaksi'=>'active',
                'trans'=>$this->Model_Laporan->get_edit_transaksi($id),
                'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
                'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header', $data);
            $this->load->view('v_edittransaksi',$data);
        }else if($ceklevel == 1){
            $id = $this->uri->segment(3);
            $data = array(
                'title'=>'Edit Transaksi',
                'active_listtransaksi'=>'active',
                'trans'=>$this->Model_Laporan->get_edit_transaksi($id),
                'detail_sewa1' => $this->Model_Laporan->get_sewa1($id),
                'detail_sewa2' =>$this->Model_Laporan->get_sewa2($id)
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_headerPegawai', $data);
            $this->load->view('v_edittransaksi',$data);
        }else{
            $this->load->view('element/css',$data);
            $this->load->view('element/v_login', $data);
        }


    }

    function update_transaksi2(){
        $id = $this->input->post('id_sewa');
        $insert = $this->Model_Laporan->update_transaksi(array(
                'id_sewa' => $this->input->post('id_sewa'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'telp_pelanggan' => $this->input->post('telp_pelanggan'),
                'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
                'tgl_acara1' => $this->input->post('tgl_acara1'),
                'tgl_acara2' => $this->input->post('tgl_acara2')
            ), $id);
        $insert2 = $this->Model_Laporan->update_transaksi2(array(
                'id_sewa' => $this->input->post('id_sewa'),
                'id' => $this->input->post('id'),
                'jumlah_barang' => $this->input->post('jumlah_barang')
            ), $id);
        redirect('ListTransaksi/index');
    }

    function update_transaksi(){
        if (isset($_POST['btnUpdate'])) {
            $kode=$this->Model_Transaksi->get_notrans();
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $no_telp = $this->input->post('telp_pelanggan');
            $alamat = $this->input->post('alamat_pelanggan');
            $tgl1 = $this->input->post('tgl_acara1');
            $tgl2 = $this->input->post('tgl_acara2');
            $tgl_pasang = date('Y-m-d', strtotime('-1 day', strtotime($tgl1)));
            $tgl_bongkar = date('Y-m-d', strtotime('+1 day', strtotime($tgl2)));
            $lama=((strtotime($tgl2)-strtotime($tgl1))/(60*60*24))+1;
            $id_sewa=$this->input->post('id_sewa');
            $idT = $this->input->post('idhargaTenda');
            $idB = $this->input->post('idBarang');
            $jumlah_sewaT = $this->input->post('stok_tenda');
            $jumlah_sewaB = $this->input->post('stok_barang');
           
           $this->db->query("UPDATE `sewa` SET `nama_pelanggan`='$nama_pelanggan',`alamat_pelanggan`='$alamat',`telp_pelanggan`='$no_telp', `tgl_pasang`='$tgl_pasang', `tgl_acara1`='$tgl1', `tgl_acara2`='$tgl2', `tgl_bongkar`='$tgl_bongkar', `lama`='$lama' WHERE `id_sewa`='$id_sewa'");

            $indexT = 0;
            foreach ($idT as $row) {
                $this->db->query("UPDATE `detail_sewa` SET `jumlah_barang`='$jumlah_sewaT[$indexT]' WHERE `id_sewa`= '$id_sewa' AND `id`='$row'");
            $indexT++;
            }

            $indexB = 0; 
            foreach ($idB as $row) {
                 $this->db->query("UPDATE `detail_sewa` SET `jumlah_barang`='$jumlah_sewaB[$indexB]' WHERE `id_sewa`= '$id_sewa' AND `id`='$row'");
                 $indexB++;
            }

            
            // $this->db->query("UPDATE `detail_sewa` WHERE `id_sewa`='$id_sewa'");
            redirect('ListTransaksi/index');   
        }
    }

    public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
                $result = $this->Model_Laporan->search1($_GET['term']);
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
                    $result = $this->Model_Laporan->search2($_GET['term']);
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

    function inputdetail(){
            $id_sewa = $this->input->post('id_sewa');
            $id_barang = $this->input->post('id_barang');
            $harga=$this->input->post('harga_sewa');
            $jumlah = $this->input->post('jumlah_sewa');
            $total = $harga*$jumlah;
            $cek = $this->db->query("SELECT * FROM `detail_sewa` WHERE id_sewa='".$id_sewa."' AND id='".$id_barang."'")->num_rows();
            if($cek >= 1){
                    $this->db->query("UPDATE `detail_sewa` SET `jumlah_barang`=jumlah_barang+'$jumlah',`harga_total`=harga_total+'$total' WHERE id_sewa='$id_sewa' AND id='$id_barang'");
                    redirect('ListTransaksi/edit_transaksi');
                }
                
                
            
            elseif ($cek == 0){
                $data = array(
                    'id_sewa' => $id_sewa,
                    'id' => $id_barang,
                    'harga_sewa' => $harga,
                    'jumlah_barang' => $jumlah,
                    'harga_total' => $total,
                );
                    
                $this->Model_Transaksi->inputdetail($data,'detail_sewa');
                redirect('ListTransaksi/edit_transaksi/'.$id_sewa);
            }
        }



}
