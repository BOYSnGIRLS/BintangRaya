<?php
class Model_Barang extends CI_Model {
	
	function get_table(){
        return $this->db->get("barang");
    }

    function get_tenda(){
    	$this->db->select('*');
    	$this->db->from('tenda');
    	$query = $this->db->get();
		return $query->result();
	}

	function get_pkttenda(){
    	$this->db->select('*');
    	$this->db->from('paket_tenda');
    	$this->db->join('tenda', 'paket_tenda.id_tenda=tenda.id_tenda');
    	$query = $this->db->get();
		return $query->result();
	}

	function get_kategori(){
		$this->db->select('*');
		$this->db->from('kategori_barang');
	    $data = $this->db->get();
	    return $data->result();
	}

	function get_barang(){
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang WHERE barang.id_kategori=kategori_barang.id_kategori");
		return $query->result();
	}
	
	function delete_tenda($id){
		$this->db->where('id_tenda', $id);
        return $this->db->delete('tenda');
	}

	function delete_paket($id1){
		$this->db->where('id_hargatenda', $id1);
        return $this->db->delete('paket_tenda');
	}

	function delete($id){
		$this->db->where('id_barang', $id);
        return $this->db->delete('barang');
	}

	function delete_kategori($id3){
		$this->db->where('id_kategori', $id3);
        return $this->db->delete('kategori_barang');
	}

	function get_edit_tenda($id){
		$query = $this->db->query("SELECT * FROM  tenda JOIN paket_tenda WHERE tenda.id_tenda=paket_tenda.id_tenda AND tenda.id_tenda = '$id'");
		return $query->result_array();
	}

	function get_edit_pakettenda($id1){
		$query = $this->db->query("SELECT * FROM paket_tenda JOIN tenda WHERE paket_tenda.id_tenda=tenda.id_tenda AND paket_tenda.id_hargatenda = '$id1'");
		return $query->result_array();
	}

	function get_edit_barang($id2){
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang WHERE barang.id_kategori=kategori_barang.id_kategori AND barang.id_barang = '$id2'");
		return $query->result_array();
	}

	function get_edit_kategori($id3){
		$query = $this->db->query("SELECT * FROM kategori_barang JOIN barang WHERE barang.id_kategori=kategori_barang.id_kategori AND kategori_barang.id_kategori = '$id3'");
		return $query->result_array();
	}

	function update_tenda($data = array(),$id){
		$this->db->where('id_tenda',$id);
		return $this->db->update('tenda',$data);
	}

	function update_pakettenda($data = array(),$id1){
		$this->db->where('id_hargatenda',$id1);
		return $this->db->update('paket_tenda',$data);
	}

	function update_barang($data = array(),$id2){
		$this->db->where('id_barang',$id2);
		return $this->db->update('barang',$data);
	}

	function update_kategori($data = array(),$id3){
		$this->db->where('id_barang',$id3);
		return $this->db->update('barang',$data);
	}

	function get_id(){
	    $this->db->select('RIGHT(barang.id_barang,3) as kode', FALSE);
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
	    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); 
	    $kodejadi = "MK".$kodemax;  
	    return $kodejadi;
	  }

	function get_idtenda(){
	    $this->db->select('RIGHT(tenda.id_tenda,3) as kode', FALSE);
	    $this->db->order_by('id_tenda','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('tenda');     
	    if($query->num_rows() <> 0){      
	  
	     $data = $query->row();      
	     $kode = intval($data->kode) + 1;    
	    }
	    else {      
	     //jika kode belum ada      
	     $kode = 1;    
	    }
	    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); 
	    $kodejadi = "TD".$kodemax;  
	    return $kodejadi;
	  }

	function get_idpkttenda(){
	    $this->db->select('RIGHT(paket_tenda.id_hargatenda,3) as kode', FALSE);
	    $this->db->order_by('id_hargatenda','DESC');    
	    $this->db->limit(1);    
	    $query = $this->db->get('paket_tenda');     
	    if($query->num_rows() <> 0){      
	  
	     $data = $query->row();      
	     $kode = intval($data->kode) + 1;    
	    }
	    else {      
	     //jika kode belum ada      
	     $kode = 1;    
	    }
	    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); 
	    $kodejadi = "PT".$kodemax;  
	    return $kodejadi;
	  }

	function inputdetail($data,$table) {
	    $this->db->insert($table,$data);

	  }

	function tambah_kategori($data){
	    $this->db->insert('kategori_barang', $data);
	    return TRUE;
	}

	function tambah($data){
	    $this->db->insert('barang', $data);
	    return TRUE;
	}

	function tambah_tenda($data){
	    $this->db->insert('tenda', $data);
	    return TRUE;
	}

	function tambah_paket($data){
	    $this->db->insert('paket_tenda', $data);
	    return TRUE;
	}

}