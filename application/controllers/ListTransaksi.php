<?php

class ListTransaksi extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Laporan');
        $this->load->model('Model_Transaksi');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }

	public function index(){

            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = $_GET['tanggal'];
                    
                    $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                    $transaksi = $this->Model_Laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel

                }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    
                    $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                    $transaksi = $this->Model_Laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel

                }else{ // Jika filter nya 3 (per tahun)
                    $tahun = $_GET['tahun'];
                    
                    $ket = 'Data Transaksi Tahun '.$tahun;
                    $transaksi = $this->Model_Laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                }
                
            }else{ // Jika user tidak mengklik tombol tampilkan
                $ket = 'Semua Data Transaksi';
                $transaksi = $this->Model_Laporan->view_all();
                // Panggil fungsi view_all yang ada di TransaksiModel
            }

            if(isset($_GET['time']) && ! empty($_GET['time'])){
                $time = $_GET['time'];
                if ($time == '1') {
                    $ket = 'Data Status Akan';
                    $transaksi = $this->Model_Laporan->status_menunggu();
                }else if ($time == '2') {
                    $ket = 'Data Status Proses';
                    $transaksi = $this->Model_Laporan->status_proses();
                }else{
                    $ket = 'Data Status Selesai';
                    $transaksi = $this->Model_Laporan->status_selesai();
                }
            }else{
                $tmpl = 'Semua Status';
                $pros = $this->Model_Laporan->view_all();
            }
            
            $data['ket'] = $ket;
            $tampil['trans'] = $transaksi;
            $data['option_tahun'] = $this->Model_Laporan->option_tahun();

            // $tampil['trans'] =  $this->Model_Transaksi->tampil_transaksi();
            $data=array(
                'title'=>'List Transaksi',
                'active_listtransaksi' => 'active'
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header',$data);
            $this->load->view('v_listtransaksi', $tampil+$data);
            // $this->load->view('element/v_footer'); 
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

    }

    function update_transaksi2(){
        $id = $this->input->post('id_sewa');
        $insert = $this->Model_Laporan->update_transaksi(array(
                'id_sewa' => $this->input->post('id_sewa'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat_pelanggan' => $this->input->post('alamat_pelanggan')
            ), $id);
        $insert2 = $this->Model_Laporan->update_transaksi(array(
                'id_sewa' => $this->input->post('id_sewa'),
                'id' => $this->input->post('id'),
                'jumlah_barang' => $this->input->post('jumlah_barang')
            ), $id);
        redirect('ListTransaksi/index');
    }

    function update_transaksi(){
        if (isset($_POST['btnUpdate'])) {
            $kode=$this->Model_Transaksi->get_notrans();
            $id_sewa=$this->input->post('id_sewa');
            $idT = $this->input->post('idhargaTenda');
            $idB = $this->input->post('idBarang');
            $jumlah_sewaT = $this->input->post('tendaSewa');
            $jumlah_sewaB = $this->input->post('barangSewa');
           
            $indexT = 0;
            // foreach ($idT as $row) {
                $this->db->query("UPDATE `detail_sewa` SET 'jumlah_sewa'='$jumlah_sewaT' WHERE `id_sewa`= '$id_sewa' AND `id_tenda`='$idT'");
            // }

            $indexB = 0; 
            // foreach ($idB as $row) {
                 $this->db->query("UPDATE `detail_sewa` SET 'jumlah_sewa'='$jumlah_sewaB' WHERE `id_sewa`= '$id_sewa' AND `id_tenda`='$idB'");
            // }

            $this->db->query("UPDATE `sewa` WHERE `id_sewa`='$id_sewa'");
            $this->db->query("UPDATE `detail_sewa` WHERE `id_sewa`='$id_sewa'");
            redirect('ListTransaksi');   
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



}
