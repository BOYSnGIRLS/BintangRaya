            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                       <h2 class="title-5 m-b-35">EDIT PROFIL</h2>
                                       <?php echo @$error; ?>
                                    <form method="post" action="<?= base_url('DataUser/update_profil')?>">
                                        <table>
                                            <tr>
                                                <td width="200" height="50" >Username</td>
                                                <td><input class="form-control" type="text" name="username" maxlength="15" value="<?php echo @$user[0]['username']; ?>">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td width="200" height="50" >Password Baru</td>
                                                <td><input class="form-control" type="text" name="password" maxlength="6" placeholder="Maksimal 6 digit karakter"></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="">Update</button> 
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td width="200" height="50" >Password baru</td>
                                                <td><input class="form-control" type="password2" name="password baru" maxlength="6" placeholder="password lama"></td>
                                            </tr>
                                            <tr>
                                                <td width="200" height="50" >Konfirmasi Password</td>
                                                <td><input class="form-control" type="password2" name="password baru" maxlength="6" placeholder="konfirmasi password">
                                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="btn_pass">confirm</button>   </td>
                                            </tr> -->
                                            <!-- <tr>
                                               <td><input type="submit" value="login" name="change_pass"/><br /></td>
                                               
                                            </tr> -->
                                           </table>     
                                    </form>
                         </div>
                    </div>

                        </div>
                </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
