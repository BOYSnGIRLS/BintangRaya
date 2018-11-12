<?php
/**
 * 
 */
class Model_GajiPegawai extends CI_Model
{
	
	function search(){
        $query = $this->db->query("SELECT * FROM sewa JOIN pelanggan ON sewa.id_sewa=pelanggan.id_sewa");
        return $query->result();
    }
}
?>