<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<body class="animsition" background="assets/images/bg3.jpg">
    <div class="page-wrapper">
        <div>
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <!-- <img src="images/icon/logo.png" alt="Bintang Raya"> -->
                                <h1>BINTANG RAYA</h1>
<!-- 
                    <center><h2 class="title-2 m-b-40"><?php echo $this->session->flashdata('message');?></h2></center> -->
                            </a>
                        </div>
                        
                        <div class="login-form">
                            <form action="<?= base_url('Login/cek_login')?>" method="post">

                                <!-- NOTIF -->
                                <?php
                                $message = $this->session->flashdata('notif');
                                if($message){
                                    echo '<p class="alert alert-danger text-center">'.$message .'</p>';
                                }?>
                                
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="Username" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required="">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="btn_log">Masuk</button>                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    