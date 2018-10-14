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
                                <!-- <img src="images/icon/logo.png" alt="Bintang Raya"> -->
                                <h1>BINTANG RAYA</h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?= base_url('Welcome/cek_login')?>" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Masuk</button>                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    