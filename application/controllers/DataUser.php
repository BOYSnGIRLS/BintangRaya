<?php

class DataUser extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Model_User');

        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }

    }

    public function index(){	
	    $title=array(
            'title'=>'Data User',
            'active_datapegawai'=>'active');
        $user['user']=$this->Model_User->get_user();
        $this->load->view('element/css',$title);
        $this->load->view('element/v_header', $user);
        $this->load->view('v_datauser',$user);    
        $this->load->view('element/v_footer');
	}

    public function tambah_user(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $level['level'] = $this->Model_user->get_level();
        $this->Model_User->tambah_user($data+$level);
        redirect('DataUser/index');
    }

    function update_user(){

        $id = $this->input->post('id_user');
        $insert = $this->Model_User->update_user(array(
                'id_user' => $this->input->post('id_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level')
        ), $id);
        redirect('DataUser/index');
    }

    function delete_user(){
        $id=$this->input->post('id_user');
        $this->Model_User->delete_user($id);
        redirect('DataUser/index');
    }

    function cari_user(){
        if(isset($_POST['btnSubmit'])){

            $username = $_POST['username'];
            $user['user'] = $this->Model_User->cari($username);

            $title=array(
            'title'=>'Data User',
            'active_datapegawai'=>'active',
            );
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header');
            $this->load->view('v_datauser',$user);       
            $this->load->view('element/v_footer');

           
        } else{
            $this->load->view('v_datauser',$data);       
        }
    }
 	
}

?>
