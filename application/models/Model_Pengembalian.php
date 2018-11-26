<?php
class Model_Pengembalian extends CI_Model{

function tampil_semua(){
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->join('detail_kembali_barang','pengembalian.id_kembali=detail_kembali_barang.id_kembali');
    $this->db->join('detail_kembali_tenda','pengembalian.id_kembali=detail_kembali_tenda.id_kembali');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

function get_notrans(){
    $this->db->select('RIGHT(pengembalian.id_kembali,4) as kode', FALSE);
    $this->db->order_by('id_kembali','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('pengembalian');     
    if($query->num_rows() <> 0){      
  
     $data = $query->row();      
     $kode = intval($data->kode) + 1;    
    }
    else {      
     //jika kode belum ada      
     $kode = 1;    
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
    $kodejadi = "KM".$kodemax;  
    return $kodejadi;
  }

function get_sewa1($kode){
    $this->db->select('*');
    $this->db->from('detail_sewa');
    $this->db->join('barang','barang.id_barang=detail_sewa.id');
    $this->db->where('id_sewa', $kode);
    $query = $this->db->get();
    return $query->result();
  }

function get_kembali1($kode){
    $this->db->select('*');
    $this->db->from('detail_kembali_barang');
    $this->db->join('barang','barang.id_barang=detail_kembali.id_barang');
    $this->db->where('id_kembali', $kode);
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

  function get_kembali2($kode){
    $this->db->select('*');
    $this->db->from('detail_kembali_barang');
    $this->db->join('tenda', 'paket_tenda.id_tenda=detail_kembali.id_tenda');
    $this->db->where('id_kembali', $kode);
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

  function tampilkembali($id){
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('detail_kembali', 'detail_kembali.id_kembali=pengembalian.id_kembali');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->join('pelanggan', 'pelanggan.id_sewa=sewa.id_sewa');
    $this->db->where('pengembalian.id_kembali', $id);
    $query = $this->db->get();
    return $query->result();

  }

  function search($title){
        $this->db->like('id_sewa', $title , 'both');
        $this->db->order_by('id_sewa', 'ASC');
        $this->db->limit(10);
        return $this->db->get('sewa')->result(); 
    }

    function search2($title){
        $this->db->like('id_sewa', $title , 'both');
        $this->db->order_by('id_sewa', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pelanggan')->result(); 
    }

    function search3($title){
        $this->db->like('id_sewa', $title , 'both');
        $this->db->order_by('id_sewa', 'ASC');
        $this->db->limit(10);
        return $this->db->get('detail_sewa')->result(); 
    }
}
?>
