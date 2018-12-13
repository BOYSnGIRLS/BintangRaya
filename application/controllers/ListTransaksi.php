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
                    $akan = $_GET[''];
                }
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

    function update_status($id){
        if($_GET['id'] == "Menunggu Proses"){
        $status = "Proses";
    }else{
        $status = "Selesai";
    }
        $insert = $this->Model_Laporan->update_status(array(
                'id_sewa' => $id,
                'status' => $status
                
            ), $id);
        redirect('ListTransaksi/index');
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

    function update_transaksi(){
        $id= $this->input->post('id_sewa');
        $id_barang = $this->input->post('id_barang');
        $harga=$this->input->post('harga_sewa');
        $jumlah = $this->input->post('jumlah_sewa');
        $total = $harga*$jumlah;
        $tgl1 = $this->input->post('tgl_acara1');
        $tgl2 = $this->input->post('tgl_acara2');
        
        // $insert = $this->Model_Laporan->update_transaksi(array(
        //         'id_sewa' => $this->input->post('id_sewa'),
        //         'nama_pelanggan' => $this->input->post('nama_pelanggan'),
        //         'telp_pelanggan' => $this->input->post('telp_pelanggan'),
        //         'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
        //         'tgl_acara1' => $this->input->post('tgl_acara1'),
        //         'tgl_acara2' => $this->input->post('tgl_acara2')

        //     ), $id);
        $tgl_pasang = date('Y-m-d', strtotime('-1 day', strtotime($tgl1)));
        $tgl_bongkar = date('Y-m-d', strtotime('+1 day', strtotime($tgl2)));
        $id_barang = $this->input->post('id_barang');
        $harga=$this->input->post('harga_sewa');
        $jumlah = $this->input->post('jumlah_sewa');
        $lama=((strtotime($tgl2)-strtotime($tgl1))/(60*60*24))+1;
        $total = $harga*$jumlah;
        $ceklagi = $this->db->query("SELECT * FROM `sementara` WHERE id_sewa='$id'")->num_rows();
        if($ceklagi >= 1){
            $this->db->query("UPDATE `sementara` SET `nama_pelanggan`='$nama_pelanggan',`alamat_pelanggan`='$alamat',`telp_pelanggan`='$no_telp', `tgl_pasang`='$tgl_pasang', `tgl_acara1`='$tgl1', `tgl_acara2`='$tgl2', `tgl_bongkar`='$tgl_bongkar', `lama`='$lama' WHERE id_sewa='$id_sewa'");
        }

        $cek = $this->db->query("SELECT * FROM `detail_sewa` WHERE id_sewa='".$id."' AND id='".$id_barang."'")->num_rows();
        if($cek >= 1){
                $this->db->query("UPDATE `detail_sewa` SET `jumlah_barang`='$jumlah' WHERE id_sewa='$id' AND id='$id_barang'");
                redirect('ListTransaksi/edit_transaksi/'.$id);
            }

        elseif ($cek == 0){
            $data = array(
                'id_sewa' => $id,
                'id' => $id_barang,
                'harga_sewa' => $harga,
                'jumlah_barang' => $jumlah,
                'harga_total' => $total,
            );
                
            $this->Model_Transaksi->inputdetail($data,'detail_sewa');

        redirect('ListTransaksi/edit_transaksi/'.$id);
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
