            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                       <h2 class="title-5 m-b-35">EDIT PAKET TENDA</h2>
                                    <form method="post" action="<?php echo base_url()?>DataBarang/update_pakettenda">
                                        <table>
                                            <tr>
                                                <td width="200" height="50" >Kode Paket</td>
                                                <td><input class="form-control" type="text" name="id_hargatenda" maxlength="5" value="<?php echo @$user[0]['id_hargatenda']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Jenis Tenda</td>
                                             <td><input class="form-control" type="text" name="jenis_tenda" maxlength="15" value="<?php echo @$user[0]['jenis_tenda']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Harga Sewa</td>
                                             <td><input class="form-control" type="text" name="harga_sewa" maxlength="15" value="<?php echo @$user[0]['harga_sewa']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Harga Jasa</td>
                                             <td><input class="form-control" type="text" name="harga_jasa" maxlength="15" value="<?php echo @$user[0]['harga_jasa']; ?>"></td>
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
        
