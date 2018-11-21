<?php
class Model_Pengembalian extends CI_Model{

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

  function tampil_semua(){
    $this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  function tampil($id){
    $this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $this->db->where('sewa.id_sewa', $id);
    $query = $this->db->get();
    return $query->result();
  }

}
?>