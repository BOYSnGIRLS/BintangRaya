<?php

class InputSewa extends CI_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('Model_app');
    }

	public function index()
	{	
		$data=array(
            'title'=>'Input Sewa',
            'active_inputsewa'=>'active'
        );
        $kode['kode'] = $this->Model_app->get_notrans();
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header');
        $this->load->view('v_inputsewa', $kode);
	}

    public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
            $result = $this->Model_app->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'=> $row->nama_barang,
                    'stok'=>$row->stok_barang,
                    'harga'=>$row->harga_sewa,
                    'id_barang' => $row->id_barang
                );
                echo json_encode($arr_result);
            }
        }
    }

    function inputdetail(){
        // $no_transaksi = $this->input->post('no_transaksi');
        // $nama_pemesan = $this->input->post('nama_pemesan');
        // $tgl_ambil = $this->input->post('tgl_ambil');
        // $jam_ambil = $this->input->post('jam_ambil');
        // $no_telp = $this->input->post('no_telp');
        // $alamat_antar = $this->input->post('alamat');
        $id_pesan = $this->input->post('id_pesan');
        $stok = $this->input->post('stok_barang');
        $harga = $this->input->post('harga_sewa');
        $jumlah = $this->input->post('jumlah_sewa');
        $total = $harga*$jumlah;
        $ceklagi = $this->db->query("SELECT * FROM 'detail_sewa' WHERE id_pesan='".$id_pesan."'")->num_rows();
        if($ceklagi >= 1){
            $this->db->query("UPDATE `detail_sewa` SET `nama_pemesan`='$nama_pemesan',`tgl_ambil`='$tgl_ambil',`jam_ambil`='$jam_ambil',`alamat_antar`='$alamat_antar',`no_telp`='$no_telp' WHERE id_pesan='$no_transaksi'");
        }
        elseif ($ceklagi == 0) {
                $this->db->query("INSERT INTO `tabel_detail_pemesan`(`id_pesan`, `nama_pemesan`, `tgl_ambil`, `jam_ambil`, `alamat_antar`,`no_telp`) VALUES ('$no_transaksi','$nama_pemesan','$tgl_ambil','$jam_ambil','$alamat_antar','$no_telp')");
        }
        $cek = $this->db->query("SELECT * FROM `tabel_detail_pesan` WHERE id_pesan='".$no_transaksi."' AND id_roti='".$id_roti."'")->num_rows();
        if($cek >= 1){
                $this->db->query("UPDATE `tabel_detail_pesan` SET `jumlah`=jumlah+'$jumlah',`total`=total+'$total' WHERE id_pesan='$no_transaksi' AND id_roti='$id_roti'");
                redirect('Pesanan/input');
            }
            
            
        
        // elseif ($cek == 0){
            
        //         $data = array(
        //     'id_pesan' => $no_transaksi,
        //     'id_roti' => $id_roti,
        //     'harga' => $harga,
        //     'jumlah' => $jumlah,
        //     'total' => $total
        //     );
                
        //     $this->Pesanan_model->inputdetail($data,'tabel_detail_pesan');
        //     redirect('Pesanan/input');
        // }
    }
}
