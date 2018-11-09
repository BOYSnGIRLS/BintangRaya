<?php

class InputSewa extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Transaksi');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }
    }

	// public function index()
	// {	
	// 	$data=array(
 //            'title'=>'Input Sewa',
 //            'active_inputsewa'=>'active'
 //        );
 //        $kode['kode'] = $this->Model_Transaksi->get_notrans();
 //        $this->load->view('element/css',$data);
 //        $this->load->view('element/v_header');
 //        $this->load->view('v_inputsewa', $kode);
	// }

    public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
            $result = $this->Model_Transaksi->search($_GET['term']);
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

    function index(){
         
        if (isset($_POST['btnTambah'])){
            $kode['kode'] = $this->Model_Transaksi->get_notrans();
            $total = $this->input->post('total');
            $dp = $this->input->post('jml_uang');
            $pelunasan = $this->input->post('kembalian');
            /*$data = $this->Pesanan_model->input(array (
            'id_pesan' => $this->input->post('id_pesan'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'no_telp' => $this->input->post('no_telp'),
            'tgl_ambil' => $this->input->post('tgl_ambil'),
            'jam_ambil' => $this->input->post('jam_ambil')
            ));*/
            $this->db->query("INSERT INTO tabel_sewa (id_pesan,id_pelanggan,tgl_acara) SELECT id_pesan,nama_pemesan,no_telp,tgl_ambil,jam_ambil,alamat_antar FROM tabel_detail_pemesan WHERE id_pesan='".$kode['kode']."'");
            $this->db->query("UPDATE `tabel_pesanan` SET `grand_total`='".$total."',`dp`='".$dp."',`pelunasan`='".$pelunasan."' WHERE id_pesan='".$kode['kode']."'");


            
            redirect('InputSewa');
        }else{
            $x =$this->Model_Transaksi->get_barang();
            $data = array(
                'roti'=>$this->Model_Transaksi->get_barang()
                );
            $title=array(
                'title'=>'InputSewa',
                'active_inputsewa'=>'active'
            );
            $kode['kode'] = $this->Model_Transaksi->get_notrans();
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header');
            $detail_sewa['detail_sewa'] = $this->Model_Transaksi->get_sewa($kode['kode']);
            $cek = $this->db->query("SELECT * FROM `pelanggan` WHERE id_sewa='".$kode['kode']."'")->num_rows();
            if ($cek >=1 ){
                $pelanggan['pelanggan'] = $this->db->query("SELECT * FROM `pelanggan` WHERE id_sewa='".$kode['kode']."'")->result();
                $data['total'] = $this->db->query("SELECT SUM(harga_total) as total FROM `detail_sewa` WHERE id_sewa='".$kode['kode']."'")->result();
            $this->load->view('v_inputsewa', $data+$kode+$pelanggan+$detail_sewa);
            }
            elseif ($cek == 0){
                $data['total'] = $this->db->query("SELECT SUM(harga_total) as total FROM `detail_sewa` WHERE id_sewa='".$kode['kode']."'")->result();
            $this->load->view('v_inputsewa', $data+$kode+$detail_sewa);

            }

            //$data['total'] = $this->db->query("SELECT SUM(total) as total FROM `tabel_detail_pesan` WHERE id_pesan='".$kode['kode']."'")->result();
            //$this->load->view('CreatePesanan_view', $data+$kode+$pemesan+$tabel_detail_pesan);
            // $this->load->view('element/footer');
        }
    }

    function inputdetail(){
        $id_sewa = $this->input->post('no_transaksi');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $tgl = $this->input->post('tgl_acara');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah_sewa');
        $total = $harga*$jumlah;
        $ceklagi = $this->db->query("SELECT * FROM 'pelanggan' WHERE id_sewa='".$id_sewa."'")->num_rows();
        if($ceklagi >= 1){
            $this->db->query("UPDATE `pelanggan` SET `nama_pelanggan`='$nama_pelanggan',`alamat_pelanggan`='$alamat',`telp_pelanggan`='$no_telp' WHERE id_sewa='$no_transaksi'");
        }
        elseif ($ceklagi == 0) {
                $this->db->query("INSERT INTO `pelanggan`('id_sewa', `nama_pelanggan`, `alamat_pelanggan`, `alamat_pelanggan`,`telp_pelanggan`) VALUES ('$no_transaksi','$nama_pelanggan','$tgl','$alamat_pelanggan','$no_telp')");
        }
        $cek = $this->db->query("SELECT * FROM `detail_sewa` WHERE id_sewa='".$no_transaksi."' AND id='".$id_barang."'")->num_rows();
        if($cek >= 1){
                $this->db->query("UPDATE `detail_sewa` SET `jumlah_sewa`=jumlah_sewa+'$jumlah',`harga_total`=harga_total+'$total' WHERE id_sewa='$no_transaksi' AND id_barang='$id_barang'");
                redirect('InputSewa/index');
            }
            
            
        
        elseif ($cek == 0){
            
                $data = array(
            'id_sewa' => $no_transaksi,
            'id_barang' => $id_roti,
            'harga_sewa' => $harga,
            'jumlah_sewa' => $jumlah,
            'harga_total' => $total
            );
                
            $this->Model_Transaksi->inputdetail($data,'detail_sewa');
            redirect('InputSewa/index');
        }
    }
}
