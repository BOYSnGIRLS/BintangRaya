
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <!-- <img src="images/icon/logo.png" alt="CoolAdmin" /> -->
                            <h2>BINTANG RAYA</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?= base_url('DataBarang')?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= base_url('InputSewa')?>">
                                <i class="fas fa-chart-bar"></i>Input Sewa</a>
                        </li>
                        <li>
                            <a href="<?= base_url('ListTransaksi')?>">
                                <i class="fas fa-table"></i>List Transaksi</a>
                        </li>
                        <li>
                            <a href="<?= base_url('ListPengembalian')?>">
                                <i class="fas fa-table"></i>List Pengembalian</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <!-- <img src="images/icon/logo.png" alt="Cool Admin" /> -->
                    <h2>BINTANG RAYA</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?> has-sub">
                            <a class="js-arrow" href="<?= base_url('DataBarang')?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php if(isset($active_inputsewa)){echo $active_inputsewa ;}?> has-sub">
                            <a href="<?= base_url('InputSewa')?>">
                                <i class="fas fa-chart-bar"></i>Input Sewa</a>
                        </li>
                        <li class="<?php if(isset($active_listtransaksi)){echo $active_listtransaksi ;}?> has-sub">
                            <a href="<?= base_url('ListTransaksi')?>">
                                <i class="fas fa-table"></i>List Transaksi</a>
                        </li>
                        <li class="<?php if(isset($active_listkembali)){echo $active_listkembali ;}?> has-sub">
                            <a href="<?= base_url('ListPengembalian')?>">
                                <i class="fas fa-table"></i>List Pengembalian</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                             
                                <div class="header-button">
                                <div class="noti-wrap">
                                        <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url('assets/images/icon/avatar-01.jpg')?>" alt="Pak Andre" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Pak Andre</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/images/icon/avatar-01.jpg')?> " alt="Pak Andre" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">pak andre</a>
                                                    </h5>
                                                    <span class="email">andre@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url();?>Login/Logout">
                                                    <i class="zmdi zmdi-power"></i>Keluar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
