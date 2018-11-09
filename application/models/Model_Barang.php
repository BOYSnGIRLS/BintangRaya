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
		$this->db->where('id_hargatenda', $id);
        return $this->db->delete('paket_tenda');
	}

	function delete2($id){
		$this->db->where('id_barang', $id);
        return $this->db->delete('barang');
	}
	
	function get_data_edit($id){
		$query = $this->db->query("SELECT * FROM paket_tenda JOIN tenda WHERE paket_tenda.id_tenda=tenda.id_tenda AND paket_tenda.id_hargatenda = '$id'");
		return $query->result_array();
	}

	function get_data_edit2($id){
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang WHERE barang.id_kategori=kategori_barang.id_kategori AND barang.id_barang = '$id'");
		return $query->result_array();
	}

	function update($data = array(),$id){
		$this->db->where('id_hargatenda',$id);
		return $this->db->update('paket_tenda',$data);
	}

	function update2($data = array(),$id){
		$this->db->where('id_barang',$id);
		return $this->db->update('barang',$data);
	}

	function get_id(){
	    $this->db->select('RIGHT(barang.id_barang,4) as kode', FALSE);
	    $this->db->order_by('id_barang','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('barang');     
	    if($query->num_rows() <> 0){      
	  
	     $data = $query->row();      
	     $kode = intval($data->kode) + 1;    
	    }
	    else {      
	     //jika kode belum ada      
	     $kode = 1;    
	    }
	    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
	    $kodejadi = "BR".$kodemax;  
	    return $kodejadi;
	  }

	  function inputdetail($data,$table) {
	    $this->db->insert($table,$data);

	  }
}