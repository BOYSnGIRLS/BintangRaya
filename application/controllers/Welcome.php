<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_app');
    }

	public function index()
	{	
		$data=array(
            'title'=>'Login Page'
        );
        $this->load->view('element/css',$data);
        $this->load->view('v_login');
        $this->load->view('element/v_footer');
	}

	function cek_login() {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->Model_app->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->id_user,
                    'USERNAME' => $row->username,
                    'PASS'=>$row->password,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
               // echo "benar";
                redirect('Welcome','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            $this->session->set_flashdata('notif', 'password atau username salah');
            redirect('Welcome','refresh');
			//echo "salah";
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('login');
    }
}
