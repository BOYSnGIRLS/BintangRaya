<?php
class Model_Barang extends CI_Model {
	
	function get_table(){
        return $this->db->get("barang");
    }

    function get_data(){
		$query = $this->db->query("SELECT * FROM paket_tenda JOIN tenda WHERE paket_tenda.id_tenda=tenda.id_tenda");
		return $query->result();
	}
    
	function get_data2(){
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang WHERE barang.id_kategori=kategori_barang.id_kategori AND kategori_barang.nama_kategori='Alat Makan'");
		return $query->result();
	}

	function get_data3(){
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang WHERE barang.id_kategori=kategori_barang.id_kategori AND kategori_barang.nama_kategori='Perkakas'");
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