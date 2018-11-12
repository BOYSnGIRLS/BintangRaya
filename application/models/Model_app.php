<?php


class Model_app extends CI_Model{
    public $username;
    public $password;

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

   
    // =============================================LOGIN=======================================================
    public function logged_id(){
        return $this->session->userdata('username');
    }
    
    function cek_log(){
        $sql = sprintf("SELECT COUNT(*) AS hitung FROM user WHERE username='%s' AND password='%s'",
            $this->username,
            $this->password);
        $query = $this->db->query($sql);
        $row  = $query->row_array();
        return $row['hitung'] == 1;
    }
    
    
}