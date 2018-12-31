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
        if(isset($_POST['btn_log'])){
            $this->Model_app->username = $_POST['username'];
            $this->Model_app->password = $_POST['password'];
            if($this->Model_app->cek_log()==TRUE){
                $this->session->set_userdata('username', $this->Model_app->username);
                $user = $this->Model_app->username;
                $ceklevel  = $this->Model_app->level($user);
                if ($ceklevel == 0) {
                  redirect('DataBarang');
                }else if($ceklevel == 1) {
                  redirect('InputSewa');
                }
            }else{
                redirect('Login');
            }
        }else{
            $data=array(
                    'title'=>'Login Page'
                );
              $this->load->view('element/css',$data);
              $this->load->view('v_login');
              $this->load->view('element/v_footer');
        }
    }

    public function Logout(){
        $this->session->sess_destroy();
        redirect('Login');
    
    } 
		
}
