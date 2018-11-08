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

   
    // =============================================LOGIN=======================================================
    public function logged_id(){
        return $this->session->userdata('username');
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

    // ==========================================PENYEWAAN=======================================================
	
    function search($title){
        $this->db->like('nama_barang', $title , 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
    }
   
   function get_notrans(){
    $this->db->select('RIGHT(sewa.id_sewa,4) as kode', FALSE);
    $this->db->order_by('id_sewa','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('sewa');     
    if($query->num_rows() <> 0){      
  
     $data = $query->row();      
     $kode = intval($data->kode) + 1;    
    }
    else {      
     //jika kode belum ada      
     $kode = 1;    
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
    $kodejadi = "TS".$kodemax;  
    return $kodejadi;
  }
}