<?php
class Model_Barang extends CI_Model {
	
	function get_table(){
        return $this->db->get("barang");
    }
    
	function get_data(){
		$query = $this->db->query("SELECT * FROM barang");
		return $query->result();
	}
	
	function input($data = array()){
		return $this->db->insert('barang',$data);
	}
	
	// function delete($id){
	// 	$this->db->where('nim', $id);
 //        return $this->db->delete('tm_mahasiswa');
	// }
	
	// function update($data = array(),$id){
	// 	$this->db->where('nim',$id);
	// 	return $this->db->update('tm_mahasiswa',$data);
	// }
}