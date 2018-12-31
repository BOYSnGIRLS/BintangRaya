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

	function get_edit_profil(){
		$query = $this->db->query("SELECT * FROM  user WHERE id_user = '1'");
		return $query->result_array();
	}

	function update_profil($data = array()){
		$this->db->where('id_user','1');
		return $this->db->update('user',$data);
	}


	public $username;
	public $password;
	function cek_akun(){
        $sql = sprintf("SELECT COUNT(*) AS hitung FROM user WHERE username='%s' AND password='%s'",
            $this->username,
            $this->password);
        $query = $this->db->query($sql);
        $row  = $query->row_array();
        return $row['hitung'] == 1;
    }

	// function fetch_pass($session_id){ 
	// 	$fetch_pass=$this->db->query("SELECT * from user where id_user='$session_id'");
	// 	$res=$fetch_pass->result();
	// }
	
	// function change_pass($session_id,$new_pass){
	// 	$update_pass=$this->db->query("UPDATE user set password='$new_pass' where id_user='$session_id'");
	// }

	// public $password;
	// function password($user){
 //        $query = $this->db->select('password as password')->from('user')->where('username', $user)->get();
 //        return $query->row()->password;
 //    }

 //    function cek_pass(){
 //        $sql = sprintf("SELECT COUNT(*) AS hitung FROM user WHERE password='%s'",
 //            $this->password);
 //        $query = $this->db->query($sql);
 //        $row  = $query->row_array();
 //        return $row['hitung'] == 1;
 //    }

}

?>