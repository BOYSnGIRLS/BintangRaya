<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Model_app');
        $this->load->library('session');
        $this->load->helper('url');
    }


  public function index (){
    if($this->Model_app->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("DataBarang");

            }else{
              $data=array(
                    'title'=>'Login Page'
                );
              $this->load->view('element/css',$data);
              $this->load->view('v_login');
              $this->load->view('element/v_footer');
        }

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
                    'username' => $row->username,
                    'PASS'=>$row->password,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata('username', $this->Model_app->username);
               // echo "benar";
                redirect('DataBarang','refresh');
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

    public function Logout(){
      if ($this->session->has_userdata('username')) {
        $this->session->sess_destroy();
        redirect('Login');
    }
  } 
		
}
