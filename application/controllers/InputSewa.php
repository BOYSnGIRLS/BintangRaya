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

    public function get_autocomplete(){    //membuat dropdown pilihan di search box
        if (isset($_GET['term'])) {
                $result = $this->Model_Transaksi->search1($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'=> $row->nama_barang,
                        'stok'=>$row->stok_barang,
                        'harga'=>$row->harga_sewa,
                        'id_barang' => $row->id_barang,
                    );
                    echo json_encode($arr_result);            
                }else{
                    $result = $this->Model_Transaksi->search2($_GET['term']);
                    if (count($result) > 0) {
                    foreach ($result as $row)
                        $arr_result[] = array(
                            'label'=> $row->jenis_tenda,
                            'stok'=>$row->stok_tenda,
                            'harga'=>$row->harga_sewa,
                            'id_hargatenda' => $row->id_hargatenda
                        );
                        echo json_encode($arr_result); 
                }
            }
        }
    }

    function index(){
         
        if (isset($_POST['btnTambah'])){
            $kode['kode'] = $this->Model_Transaksi->get_notrans();
            $total = $this->input->post('total');
            $dp = $this->input->post('jml_uang');
            $pelunasan = $this->input->post('kembalian');

            $tgl = $this->input->post('tgl_acara');
            $tgl_pasang = date('Y-m-d', strtotime('-1 day', strtotime($tgl)));
            $tgl_bongkar = date('Y-m-d', strtotime('+1 day', strtotime($tgl)));

            // $data = $this->Model_Transaksi->input(array (
            // 'id_sewa' => $this->input->post('id_sewa'),
            // 'tgl_acara' => $this->input->post('tgl_acara')
            // ));

            // $this->db->query("INSERT INTO sewa (id_pesan, tgl_pasang, tgl_acara, tgl_bongkar, ) SELECT id_pesan,nama_pemesan,no_telp,tgl_ambil,jam_ambil,alamat_antar FROM tabel_detail_pemesan WHERE id_pesan='".$kode['kode']."'");
            // $this->db->query("UPDATE `tabel_pesanan` SET `grand_total`='".$total."',`dp`='".$dp."',`pelunasan`='".$pelunasan."' WHERE id_pesan='".$kode['kode']."'");

            $this->db->query("INSERT INTO `sewa`(`id_sewa`,  `tgl_pasang`, `tgl_acara`, `tgl_bongkar`, `total_tagihan`, `dp`, `pelunasan`) VALUES ('".$kode['kode']."', '".$tgl_pasang."', '".$tgl."', '".$tgl_bongkar."', '".$total."','".$dp."','".$pelunasan."')");
            
            redirect('InputSewa');
        }else{
            $x =$this->Model_Transaksi->get_barang();
            // $data = array(
            //     'roti'=>$this->Model_Transaksi->get_barang()
            //     );
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
                $pelanggan['data'] = $this->db->query("SELECT * FROM `pelanggan` WHERE id_sewa='".$kode['kode']."'")->result();
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
        $id_sewa = $this->input->post('id_sewa');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $tgl = $this->input->post('tgl_acara');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $id_barang = $this->input->post('id_barang');
        $harga=$this->input->post('harga_sewa');
        $jumlah = $this->input->post('jumlah_sewa');
        $total = $harga*$jumlah;
        $ceklagi = $this->db->query("SELECT * FROM `pelanggan` WHERE id_sewa='$id_sewa'")->num_rows();
        if($ceklagi >= 1){
            $this->db->query("UPDATE `pelanggan` SET `nama_pelanggan`='$nama_pelanggan',`alamat_pelanggan`='$alamat',`telp_pelanggan`='$no_telp', `tgl_acara`='$tgl' WHERE id_sewa='$id_sewa'");
        }
        elseif ($ceklagi == 0) {
                $this->db->query("INSERT INTO `pelanggan`(`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`) VALUES ('$id_sewa','$nama_pelanggan','$alamat','$no_telp')");
        }
        $cek = $this->db->query("SELECT * FROM `detail_sewa` WHERE id_sewa='".$id_sewa."' AND id='".$id_barang."'")->num_rows();
        if($cek >= 1){
                $this->db->query("UPDATE `detail_sewa` SET `jumlah_barang`=jumlah_barang+'$jumlah',`harga_total`=harga_total+'$total' WHERE id_sewa='$id_sewa' AND id='$id_barang'");
                redirect('InputSewa/index');
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
            redirect('InputSewa/index');
        }
    }

    function remove(){
        $id_barang = $this->uri->segment(3);
        $id_sewa = $this->Model_Transaksi->get_notrans();
        $this->db->query("DELETE FROM `detail_sewa` WHERE id_sewa='$id_sewa' AND id='$id_barang'");
        redirect('InputSewa');

    }
}
