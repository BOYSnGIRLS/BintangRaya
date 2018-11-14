<?php
class Model_Pengembalian extends CI_Model{

	function tampil_kembalian(){
    $this->db->select('sewa.*, pelanggan.nama_pelanggan, pelanggan.alamat_pelanggan');
    $this->db->from('sewa');
    $this->db->join('pelanggan', 'pelanggan.id_sewa = sewa.id_sewa');
    $query = $this->db->get();
    return $result = $query->result_array();
  }
  
}