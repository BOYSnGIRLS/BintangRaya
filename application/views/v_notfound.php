<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>BINTANG RAYA</h1>
                            </a>
                        </div>
                        
                        <div class="login-form">

                                <!-- NOTIF -->
                                <?php
                                $message = $this->session->flashdata('notif');
                                if($message){
                                    echo '<p class="alert alert-danger text-center">'.$message .'</p>';
                                }?>
                                
                                <center><a href="<?php echo base_url('InputSewa') ?>"><button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="btn_log">Kembali</button></a>  </center>                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    