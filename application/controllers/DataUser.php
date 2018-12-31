<?php

class DataUser extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Model_User');

        $this->load->database();
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

    function edit_profil(){
        $id = $this->uri->segment(3);
        $data = array(
            'title'=> 'Edit Profil'
        );
        $this->load->view('element/css',$data);
        $this->load->view('element/v_header', $data);
        $this->load->view("v_editprofil", $data);
        $this->load->view('element/v_footer');
    }

    function edit_profil2(){
        $id = $this->uri->segment(3);
                $data = array(
                    'title'=> 'Edit Profil',
                    'user' => $this->Model_User->get_edit_profil(),
                );
                $this->load->view('element/css',$data);
                $this->load->view('element/v_header', $data);
                $this->load->view("v_editprofil2", $data);
                $this->load->view('element/v_footer');
    }

    function update_profil(){
        $insert = $this->Model_User->update_profil(array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
        ));
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


    // function cek_pass(){
    //     if(isset($_POST['btn_pass'])){
    //         $this->Model_User->password = $_POST['password'];
    //         if($this->Model_User->cek_pass()==TRUE){
    //                 $password  = $this->Model_User->password($user);
    //                 redirect('DataUser/edit_profil');
    //                 "valid password";
    //             }else{
    //                 "Invalid password";
    //             }
    //     }else{
    //         $id = $this->uri->segment(3);
    //         $data = array(
    //             'title'=> 'Edit Profil',
    //             'user' => $this->Model_User->get_edit_profil($id),
    //         );
    //         $this->load->view('element/css',$data);
    //         $this->load->view('element/v_header', $data);
    //         $this->load->view("v_editprofil", $data);
    //         $this->load->view('element/v_footer');
    //     }
    // }

    // public function change_pass(){
    //     if($this->input->post('change_pass')){
    //         $old_pass=$this->input->post('old_pass');
    //         $new_pass=$this->input->post('new_pass');
    //         $confirm_pass=$this->input->post('confirm_pass');
    //         $fetch_pass=$this->input->post('fetch_pass');
    //         $session_id=$this->session->userdata('id_user');
    //         $que=$this->db->query("SELECT * from user where id_user='$session_id'");
    //         $row=$que->row();

    //         if((!strcmp($old_pass, $fetch_pass))&& (!strcmp($new_pass, $confirm_pass))){
    //             $this->Model_User->change_pass($session_id,$new_pass);
    //             echo "Password changed successfully !";
    //         }else{
    //             echo "Invalid";
    //         }
    //     }
    //     $this->load->view('v_coba');
        
    // }
         	
}

?>
