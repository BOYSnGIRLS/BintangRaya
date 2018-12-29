<?php

class ListPengembalian extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Pengembalian');
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
                if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                            $tgl = $_GET['tanggal'];
                            
                            $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                            $transaksi = $this->Model_Pengembalian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel

                        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                            $bulan = $_GET['bulan'];
                            $tahun = $_GET['tahun'];
                            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                            
                            $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                            $transaksi = $this->Model_Pengembalian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel

                        }else{ // Jika filter nya 3 (per tahun)
                            $tahun = $_GET['tahun'];
                            
                            $ket = 'Data Transaksi Tahun '.$tahun;
                            $transaksi = $this->Model_Pengembalian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                        }
                        
                    }else{ // Jika user tidak mengklik tombol tampilkan
                        $ket = 'Semua Data Transaksi';
                        $transaksi = $this->Model_Pengembalian->view_all();
                        // Panggil fungsi view_all yang ada di TransaksiModel
                    }

                    $data['ket'] = $ket;
                    $data['trans'] = $transaksi;
                    $data['option_tahun'] = $this->Model_Pengembalian->option_tahun();

                    $title=array(
                        'title'=>'List Pengembalian',
                        'active_listkembali' => 'active'
                    );
                    $this->load->view('element/css',$title);
                    $this->load->view('element/v_header',$title);
                    $this->load->view('v_listpengembalian',$data);
                }else{
                    redirect('Login');
            }
        }elseif ($ceklevel == 1) {
             if($this->session->userdata('username')){
                if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                            $tgl = $_GET['tanggal'];
                            
                            $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                            $transaksi = $this->Model_Pengembalian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel

                        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                            $bulan = $_GET['bulan'];
                            $tahun = $_GET['tahun'];
                            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                            
                            $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                            $transaksi = $this->Model_Pengembalian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel

                        }else{ // Jika filter nya 3 (per tahun)
                            $tahun = $_GET['tahun'];
                            
                            $ket = 'Data Transaksi Tahun '.$tahun;
                            $transaksi = $this->Model_Pengembalian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                        }
                        
                    }else{ // Jika user tidak mengklik tombol tampilkan
                        $ket = 'Semua Data Transaksi';
                        $transaksi = $this->Model_Pengembalian->view_all();
                        // Panggil fungsi view_all yang ada di TransaksiModel
                    }

                    $data['ket'] = $ket;
                    $data['trans'] = $transaksi;
                    $data['option_tahun'] = $this->Model_Pengembalian->option_tahun();

                    $title=array(
                        'title'=>'List Pengembalian',
                        'active_listkembali' => 'active'
                    );
                    $this->load->view('element/css',$title);
                    $this->load->view('element/v_headerPegawai',$title);
                    $this->load->view('v_listpengembalian',$data);
                }else{
                    redirect('Login');
            }
        }else{

        }
    }

    public function detail(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
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
        }else if($ceklevel == 1){
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
            $this->load->view('element/v_headerPegawai', $title);
            $this->load->view('v_detailkembali', $data);
            $this->load->view('element/v_footer');
        }else{

            $this->load->view('element/css',$title);
            $this->load->view('v_login');
            
        }


    }

     public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
                $result = $this->Model_Pengembalian->search($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'=> $row->id_sewa,
                        'nama_pelanggan'=>$row->nama_pelanggan,
                        'no_telp'=>$row->telp_pelanggan,
                        'alamat'=>$row->alamat_pelanggan,
                        'tgl_acara1' => $row->tgl_acara1,
                        'tgl_acara2' => $row->tgl_acara2
                    );
                    echo json_encode($arr_result);            
                }
        }
    }

    public function inputdetail(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
            $title=array(
            'title'=>'List Pengembalian',
            'active_listkembali'=>'active'
            );
            $this->load->view('element/css', $title);
            $this->load->view('element/v_header', $title);
            $this->load->view('v_inputkembali');
        }else if($ceklevel == 1){
            $title=array(
            'title'=>'List Pengembalian',
            'active_listkembali'=>'active'
            );
            $this->load->view('element/css', $title);
            $this->load->view('element/v_headerPegawai', $title);
            $this->load->view('v_inputkembali');
        }else{
            
            $this->load->view('element/css');
            $this->load->view('v_login');
            
        }
    }

    public function inputtampil(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
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
        }else if($ceklevel == 1){
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
            $this->load->view('element/v_headerPegawai', $title);
            $this->load->view('v_inputkembali', $data+$kode);
        }else{

            $this->load->view('element/css');
            $this->load->view('v_login');
        }

    }

    public function inputkembali(){
        if (isset($_POST['btnSimpan'])) {
            // $kode=$this->input->post('id_kembali');
            $kode=$this->Model_Pengembalian->get_notrans();
            $id_sewa=$this->input->post('id_sewa');
            $idT = $this->input->post('idhargaTenda');
            $idB = $this->input->post('idBarang');
            $harga_ganti = $this->input->post('hargaGanti');
            $jumlah_sewaT = $this->input->post('tendaSewa');
            $jumlah_sewaB = $this->input->post('barangSewa');
            $jumlah_kembaliT = $this->input->post('tenda_kembali');
            $jumlah_kembaliB = $this->input->post('barang_kembali');

            
            $this->db->query("INSERT INTO `pengembalian`(`id_kembali`, `id_sewa`) VALUES ('$kode', '$id_sewa') ");
            $this->db->query("UPDATE `sewa` SET `status`='Kembali' WHERE `id_sewa`='$id_sewa'");
            
            $indexT = 0;
            foreach ($idT as $row) {
                $hilangrusak = $jumlah_sewaT[$indexT]-$jumlah_kembaliT[$indexT];
                $this->db->query("INSERT INTO `detail_kembali_tenda`(`id_kembali`,  `id_tenda`, `jumlah_sewa`, `jumlah_kembali`,  `hilangrusak`, `harga_ganti`) VALUES ('".$kode."', '".$row."', '".$jumlah_sewaT[$indexT]."',  '".$jumlah_kembaliT[$indexT]."', '".$hilangrusak."') ");
                $indexT++;

            }

            $indexB = 0;
            foreach ($idB as $row) {
                $hilangrusak = $jumlah_sewaB[$indexB]-$jumlah_kembaliB[$indexB];
                $ganti = ($jumlah_sewaB[$indexB]-$jumlah_kembaliB[$indexB])*$harga_ganti[$indexB];
                $this->db->query("INSERT INTO `detail_kembali_barang`(`id_kembali`,  `id_barang`, `jumlah_sewa`, `jumlah_kembali`,  `hilangrusak`, `harga_ganti`) VALUES ('".$kode."', '".$row."', '".$jumlah_sewaB[$indexB]."',  '".$jumlah_kembaliB[$indexB]."', '".$hilangrusak."', '".$ganti."') ");
                $indexB++;
            }

            $biaya = $this->Model_Pengembalian->biaya($kode);
            $this->db->query("UPDATE `sewa` SET `biaya_ganti`='$biaya' WHERE `id_sewa`='$id_sewa'");

            redirect('ListPengembalian');   
        }
    }
}
