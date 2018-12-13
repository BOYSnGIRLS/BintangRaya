<?php
class Model_Transaksi extends CI_Model{
	    public $tanggal;

	function get_barang(){
	    $query = $this->db->query("SELECT * FROM barang");
	    return $query->result();
	  }

	function get_sewa1($kode){
    $this->db->select('*');
    $this->db->from('detail_sewa');
    $this->db->join('barang','barang.id_barang=detail_sewa.id');
    $this->db->where('id_sewa', $kode);
    $query = $this->db->get();
    return $query->result();
  }

  function get_sewa2($kode){
    $this->db->select('*');
    $this->db->from('detail_sewa');
    $this->db->join('paket_tenda', 'paket_tenda.id_hargatenda=detail_sewa.id');
    $this->db->where('id_sewa', $kode);
    $query = $this->db->get();
    return $query->result();
  }

	function search1($title){
        $this->db->like('nama_barang', $title , 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
        // return $this->db->get()->result();       
    }

  function search2($title){
        $this->db->like('jenis_tenda', $title, 'both');
        $this->db->order_by('jenis_tenda', 'ASC');
        $this->db->limit(20);
        $this->db->from('paket_tenda');
        $this->db->join('tenda', 'tenda.id_tenda=paket_tenda.id_tenda');
        return $this->db->get()->result();
  }

  function search3($title){
        $this->db->like('nama_barang', $title , 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('stok_temp_barang')->result();
        return $this->db->get()->result();    
    }

  function search4($title){
        $this->db->like('jenis_tenda', $title, 'both');
        $this->db->order_by('jenis_tenda', 'ASC');
        $this->db->limit(20);
        $this->db->from('paket_tenda');
        $this->db->join('tenda', 'tenda.id_tenda=paket_tenda.id_tenda');
        return $this->db->get()->result();
  }
   
   function get_notrans(){
    $this->db->select('RIGHT(sewa.id_sewa,4) as kode', FALSE);
    $this->db->order_by('id_sewa','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('sewa');     
    if($query->num_rows() <> 0){      
  
     $data = $query->row();      
     $kode = intval($data->kode) + 1;    
    }
    else {      
     //jika kode belum ada      
     $kode = 1;    
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
    $kodejadi = "TS".$kodemax;  
    return $kodejadi;
  }

  function cariTotal($id,$tgl){
    $sql = sprintf("SELECT SUM(jumlah_barang) AS total FROM (SELECT detail_sewa.*, sewa.tgl_pasang, sewa.tgl_acara1, sewa.tgl_acara2, sewa.tgl_bongkar FROM `detail_sewa`, `sewa` WHERE sewa.id_sewa=detail_sewa.id_sewa) AS ahay WHERE ahay.id = '$id' AND ahay.tgl_pasang='$tgl' OR ahay.tgl_acara1 = '$tgl' OR ahay.tgl_acara2 = '$tgl'  ");
    $data = $this->db->query($sql);

    return $data->row();
  }

  function inputdetail($data,$table) {
    $this->db->insert($table,$data);

  }

  function tampil_transaksi(){
    $this->db->select('sewa');
    $this->db->from('sewa');
    $query = $this->db->get();
    return $result = $query->result_array();
  }

  function cekTanggal(){
    $tgl1 = $this->db->query("SELECT tgl_acara1 FROM `sementara` WHERE id_sewa='".$kode['kode']."'")->result();
    $cektgl=$this->db->query("SELECT tgl_acara1 FROM `sewa`")->result();
    foreach ($cektgl as $row) {
        if ($row == $tgl1) {
            $auto['auto']="1";

        }else{
            $auto['auto']="0";
        }
    }

  }
}
?>
