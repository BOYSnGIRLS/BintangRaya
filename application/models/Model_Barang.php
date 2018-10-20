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
	
	function delete($id){
		$this->db->where('id_barang', $id);
        return $this->db->delete('barang');
	}
	
	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id'");
		return $query->result_array();
	}

	function update($data = array(),$id){
		$this->db->where('id_barang',$id);
		return $this->db->update('barang',$data);
	}
}