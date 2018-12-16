<?php

class InputSewa extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Model_Transaksi');
        $this->model = $this->Model_Transaksi;
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
                        'jasa'=>$row->harga_jasa,
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
                            'jasa'=>$row->harga_jasa,
                            'id_barang' => $row->id_hargatenda
                        );
                        echo json_encode($arr_result); 
                }
            }
        }
    }


    function index(){
         
        if (isset($_POST['btnTambah'])){
            $kode['kode'] = $this->Model_Transaksi->get_notrans();
            $total = $this->input->post('total_tagih');
            $dp = $this->input->post('jml_uang');
            $pelunasan = $this->input->post('kembalian');

            $this->db->query("INSERT INTO `sewa` (`id_sewa`,`nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`,  `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar`) SELECT `id_sewa`,`nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`,  `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar` FROM `sementara` WHERE id_sewa='".$kode['kode']."' ");
            $this->db->query("UPDATE `sewa` SET `total_tagihan`='".$total."',`dp`='".$dp."',`pelunasan`='".$pelunasan."' WHERE id_sewa='".$kode['kode']."'");
            $this->db->query("DELETE FROM `sementara` WHERE id_sewa='".$kode['kode']."' ");

            $this->session->set_flashdata('message', 'anda berhasil menginput data');
            redirect('InputSewa');
        }else{

            $x =$this->Model_Transaksi->get_barang();
            $title=array(
                'title'=>'InputSewa',
                'active_inputsewa'=>'active'
            );
            $kode['kode'] = $this->Model_Transaksi->get_notrans();
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header');
            $detail_sewa['detail_sewa1'] = $this->Model_Transaksi->get_sewa1($kode['kode']);
            $detail_sewa['detail_sewa2'] = $this->Model_Transaksi->get_sewa2($kode['kode']);

            $cek = $this->db->query("SELECT * FROM `sementara` WHERE id_sewa='".$kode['kode']."'")->num_rows();
            if ($cek >=1 ){
                $sementara['data'] = $this->db->query("SELECT * FROM `sementara` WHERE id_sewa='".$kode['kode']."'")->result();
                $lama['lama']=$this->db->query("SELECT lama FROM `sementara` WHERE id_sewa='".$kode['kode']."'")->result();
                $data['total'] = $this->db->query("SELECT SUM(harga_total) as total FROM `detail_sewa` WHERE id_sewa='".$kode['kode']."'")->result();
                $data['total2']=$this->db->query("SELECT SUM(harga_total) as total FROM `detail_sewa` WHERE id_sewa='".$kode['kode']."'")->result();
            $this->load->view('v_inputsewa2', $data+$lama+$kode+$sementara+$detail_sewa);
            }
            elseif ($cek == 0){
                $data['total'] = $this->db->query("SELECT SUM(harga_total) as total FROM `detail_sewa`  WHERE id_sewa='".$kode['kode']."'")->result();
                $data['total2']=$this->db->query("SELECT SUM(harga_total) as total FROM `detail_sewa` WHERE id_sewa='".$kode['kode']."'")->result();
            $this->load->view('v_inputsewa2', $data+$kode+$detail_sewa);
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

    function inputket(){
        $id_sewa = $this->input->post('id_sewa');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $tgl1 = $this->input->post('tgl_acara1');
        $tgl2 = $this->input->post('tgl_acara2');
        $tgl_pasang = date('Y-m-d', strtotime('-1 day', strtotime($tgl1)));
        $tgl_bongkar = date('Y-m-d', strtotime('+1 day', strtotime($tgl2)));
        $lama=((strtotime($tgl2)-strtotime($tgl1))/(60*60*24))+1;

        $ceklagi = $this->db->query("SELECT * FROM `sementara` WHERE id_sewa='$id_sewa'")->num_rows();
        if($ceklagi >= 1){
            $this->db->query("UPDATE `sementara` SET `nama_pelanggan`='$nama_pelanggan',`alamat_pelanggan`='$alamat',`telp_pelanggan`='$no_telp', `tgl_pasang`='$tgl_pasang', `tgl_acara1`='$tgl1', `tgl_acara2`='$tgl2', `tgl_bongkar`='$tgl_bongkar', `lama`='$lama' WHERE id_sewa='$id_sewa'");
        }
        elseif ($ceklagi == 0) {
                $this->db->query("INSERT INTO `sementara`(`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`,`tgl_pasang`, `tgl_acara1`, `tgl_acara2`,`tgl_bongkar`, `lama`) VALUES ('$id_sewa','$nama_pelanggan','$alamat','$no_telp','$tgl_pasang', '$tgl1', '$tgl2', '$tgl_bongkar', '$lama')");
        }
        redirect('InputSewa');
        
    }

    
    function remove(){
        $id_barang = $this->uri->segment(3);
        $id_sewa = $this->Model_Transaksi->get_notrans();
        $this->db->query("DELETE FROM `detail_sewa` WHERE id_sewa='$id_sewa' AND id='$id_barang'");
        redirect('InputSewa/index');

    }

    function getStokBarang(){
         $tgl = $this->input->post('tgl');
         $id  = $this->input->post('id');
        $data = $this->Model_Transaksi->cariTotal($id,$tgl);
        echo $data->total;
    }
}
