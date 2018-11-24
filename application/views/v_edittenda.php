            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                       <h2 class="title-5 m-b-35">EDIT TENDA</h2>
                                    <form method="post" action="<?php echo base_url()?>DataBarang/update_tenda">
                                        <table>
                                            <tr>
                                                <td width="200" height="50" >Kode Tenda</td>
                                                <td><input class="form-control" type="text" name="id_tenda" maxlength="5" value="<?php echo @$user[0]['id_tenda']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Ukuran Tenda</td>
                                             <td><input class="form-control" type="text" name="ukuran_tenda" maxlength="15" value="<?php echo @$user[0]['ukuran_tenda']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Stok Tenda</td>
                                             <td><input class="form-control" type="text" name="stok_tenda" maxlength="15" value="<?php echo @$user[0]['stok_tenda']; ?>"></td>
                                            </tr>
                                            
                                        </table><br>
                                        <table>
                                            <tr>
                                                <td width="310"></td>
                                                <td><a href="<?php echo base_url()?>DataBarang/tenda"><button type="button" class=" btn btn-secondary btn-lg">Kembali</button></a></td>

                                                <td width="10"></td>
                                                <td>
                                                    <span class="input-group-btn"><button class=" btn btn-primary btn-lg" type="submit">Simpan</button></span>
                                                </td>
                                            </tr>
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
        
