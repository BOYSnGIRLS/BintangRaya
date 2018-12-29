<?php
class Model_User extends CI_Model {

	function get_user(){
		$this->db->where('level', "1");
    	$this->db->select('*');
    	$this->db->from('user');
    	$query = $this->db->get();
		return $query->result();
	}

	function tambah_user($data){
	    $this->db->insert('user', $data);
	    return TRUE;
	}

	function update_user($data = array(),$id){
		$this->db->where('id_user',$id);
		return $this->db->update('user',$data);
	}

	function delete_user($id){
		$this->db->where('id_user', $id);
        return $this->db->delete('user');
	}

	function cari($username){
		$query = $this->db->query("SELECT * FROM user WHERE username = '$username'");
		return $query->result();
	}

	function get_level(){
	    $this->db->select('RIGHT(user.level,1) as level', FALSE);
	    $this->db->limit(1);    
	    $query = $this->db->get('user');     
	    if($query->num_rows() <> 0){ 
	     $data = $query->row();      
	    }
	    else {      
	     $level = 1;    
	    }
	    $level = str_pad($level, 1, "0", STR_PAD_LEFT); 
	    return $level;
	  }
}

?>