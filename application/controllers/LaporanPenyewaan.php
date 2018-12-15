<?php

class LaporanPenyewaan extends CI_Controller {

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
                    $transaksi = $this->Model_Laporan->view_by_date2($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel

                }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    
                    $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                    $transaksi = $this->Model_Laporan->view_by_month2($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel

                }else{ // Jika filter nya 3 (per tahun)
                    $tahun = $_GET['tahun'];
                    
                    $ket = 'Data Transaksi Tahun '.$tahun;
                    $transaksi = $this->Model_Laporan->view_by_year2($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                }
                
            }else{ // Jika user tidak mengklik tombol tampilkan
                $ket = 'Semua Data Transaksi';
                $transaksi = $this->Model_Laporan->view_all2();
                // Panggil fungsi view_all yang ada di TransaksiModel
            }

            // if(isset($_GET['time']) && ! empty($_GET['time'])){
            //     $time = $_GET['time'];
            //     if ($time == '1') {
            //         $akan = $_GET[''];
            //     }
            // }
            $tampil['trans'] = $transaksi;
            $tahun['option_tahun'] = $this->Model_Laporan->option_tahun2();

            // $tampil['trans'] =  $this->Model_Transaksi->tampil_transaksi();
            $data=array(
                'title'=>'Laporan Penyewaan',
                'active_laporanpenyewaan' => 'active'
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header',$data);
            $this->load->view('v_laporan', $tampil+$tahun);
            // $this->load->view('element/v_footer'); 
    }

    

}
