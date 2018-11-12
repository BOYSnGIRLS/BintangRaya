<?php
/**
 * 
 */
class Model_GajiPegawai extends CI_Model
{
	
	function search($title){
        //$query = $this->db->query("SELECT * FROM sewa JOIN pelanggan ON sewa.id_sewa=pelanggan.id_sewa");
        //return $query->result();
        $this->db->like('nama_pelanggan', $title , 'both');
        $this->db->order_by('nama_pelanggan', 'ASC');
        $this->db->limit(10);
        $this->db->join('pelanggan','sewa.id_sewa=pelanggan.id_sewa');
        return $this->db->get('sewa')->result();
        return $this->db->get()->result(); 
    }
}
?>