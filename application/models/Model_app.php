<?php


class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================

    public function getAllData($table) {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data) {
        return $this->db->get_where($table, $data);
    }

    function updateData($table,$data,$field_key) {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data) {
        $this->db->delete($table,$data);
    }

    function insertData($table,$data) {
        $this->db->insert($table,$data) or die ($db->error);
    }

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
			redirect('login');
        }
    }
	
    function search($title){
        $this->db->like('nama_barang', $title , 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
    }
   
}