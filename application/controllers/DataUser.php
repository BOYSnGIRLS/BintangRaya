<?php

class DataUser extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Model_User');
        $this->load->model('Model_app');

        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('username')){
            redirect('Login');
        }

    }

    public function index(){	
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
           if($this->session->userdata('username')){
            $title=array(
                'title'=>'Data User',
                'active_datapegawai'=>'active');
            $pegw['pegw']=$this->Model_User->get_user();
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header', $user);
            $this->load->view('v_datauser',$pegw);    
            $this->load->view('element/v_footer');
           }else{
            redirect('Login');
           }
         }elseif ($ceklevel == 1) {
            $data=array(
                'title'=>'Data Barang',
            );
            $this->session->set_flashdata('notif', 'ANDA TIDAK DAPAT MENGAKSES HALAMAN INI');
            $this->load->view('element/css',$data);
            $this->load->view('v_notfound');  
            $this->load->view('element/v_footer'); 
         }
         
	    
	}

    public function tambah_user(){
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'lahir_user' => $this->input->post('lahir_user'),
            'nomor_user' => $this->input->post('nomor_user'),
            'alamat_user' => $this->input->post('alamat_user'),
            'level' => $this->input->post('level')
        );
        $this->Model_User->tambah_user($data);
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
            $pegw['pegw'] = $this->Model_User->cari($username);

            $title=array(
            'title'=>'Data User',
            'active_datapegawai'=>'active',
            );
            $this->load->view('element/css',$title);
            $this->load->view('element/v_header');
            $this->load->view('v_datauser',$pegw);       
            $this->load->view('element/v_footer');

           
        } else{
            $this->load->view('v_datauser',$data);       
        }
    }

    function edit_profil(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
            $id = $this->uri->segment(3);
            $data = array(
                'title'=> 'Edit Profil'
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_header', $data);
            $this->load->view("v_editprofil", $data);
            $this->load->view('element/v_footer');
        }else{
            $id = $this->uri->segment(3);
            $data = array(
                'title'=> 'Edit Profil'
            );
            $this->load->view('element/css',$data);
            $this->load->view('element/v_headerPegawai', $data);
            $this->load->view("v_editprofil", $data);
            $this->load->view('element/v_footer');
        }
    }

    function edit_profil2(){
        $user = $this->session->userdata('username');
        $ceklevel  = $this->Model_app->level($user);
        if ($ceklevel == 0) {
            $id = $this->uri->segment(3);
                $data = array(
                    'title'=> 'Edit Profil',
                    'user' => $this->Model_User->get_edit_profil(),
                );
                $this->load->view('element/css',$data);
                $this->load->view('element/v_header', $data);
                $this->load->view("v_editprofil2", $data);
                $this->load->view('element/v_footer');
        } else {
                $id = $this->uri->segment(3);
                $user = $this->session->userdata('username');
                $data = array(
                    'title'=> 'Edit Profil',
                    'user' => $this->Model_User->get_edit_profil(),
                );
                $this->load->view('element/css',$data);
                $this->load->view('element/v_headerPegawai', $data);
                $this->load->view("v_editprofil2", $data);
                $this->load->view('element/v_footer');
        }
    }

    function update_profil(){
        $user = $this->session->userdata('username');
        $id = $this->Model_app->iduser($user);
        $insert = $this->Model_User->update_profil(array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
        ),$id);
        $data=array(
                'title'=>'Sukses Ganti Profil'
        );
        $this->load->view('element/css',$data);
        $this->load->view('v_berhasil');
        $this->load->view('element/v_footer');
        
    }

    function cek_akun() {
        if(isset($_POST['btn_conf'])){
            $this->Model_User->username = $_POST['username'];
            $this->Model_User->password = $_POST['password'];
            if($this->Model_User->cek_akun()==TRUE){
                $this->session->set_userdata('username', $this->Model_User->username);
                $user = $this->Model_User->username;
                redirect('DataUser/edit_profil2');
                
            }else{
                redirect('DataUser/index');
            }
        }else{
            redirect('DataUser/edit_profil');
        }
    }

}

?>
