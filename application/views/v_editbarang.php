            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
<<<<<<< HEAD
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                       <h2 class="title-5 m-b-35">EDIT DATA BARANG</h2>
                                    <form method="post" action="<?php echo base_url()?>DataBarang/update_am">
                                        <table>
                                            <tr>
                                                <td width="200" height="50" >Kode Barang</td>
                                                <td><input class="form-control" type="text" name="id_barang" maxlength="5" value="<?php echo @$user[0]['id_barang']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Nama Barang</td>
                                             <td><input class="form-control" type="text" name="nama_barang" maxlength="15" value="<?php echo @$user[0]['nama_barang']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Stok Barang</td>
                                             <td><input class="form-control" type="text" name="stok_barang" maxlength="15" value="<?php echo @$user[0]['stok_barang']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Harga Sewa (Rp)</td>
                                             <td><input class="form-control" type="text" name="harga_sewa" maxlength="15" value="<?php echo @$user[0]['harga_sewa']; ?>"></td>
                                            </tr>
                                            <tr>
                                             <td width="200" height="50">Harga Jasa (Rp)</td>
                                             <td><input class="form-control" type="text" name="harga_jasa" maxlength="15" value="<?php echo @$user[0]['harga_jasa']; ?>"></td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <tr>
                                                <td width="410"></td>
                                                <td><span class="input-group-btn"><button class="au-btn au-btn-icon au-btn--blue" type="submit">Simpan</button></span></td>
                                            </tr>
                                        </table>
                                        
                                    </form>
                         </div>
                    </div>
=======
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Edit Data Barang</h2>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <p>
										<form method="post" action="<?php echo base_url()?>DataBarang/update">
							        Kode Barang<br/><input type="text" name="id_barang" size="5" maxlength="5" value="<?php echo @$user[0]['id_barang']; ?>"><br/><br/>
									
							        Nama<br/><input type="text" name="nama_barang" size="30" maxlength="25" value="<?php echo @$user[0]['nama_barang']; ?>"><br/><br/>
									
							        Stok Barang<br/><input type="number" name="stok_barang" size="5" maxlength="5" value="<?php echo @$user[0]['stok_barang']; ?>"><br/><br/>

							        Harga Sewa<br/><input type="number" name="harga_sewa" size="5" maxlength="5" value="<?php echo @$user[0]['harga_sewa']; ?>"><br/><br/>

							        Harga Jasa<br/><input type="number" name="harga_jasa" size="5" maxlength="5" value="<?php echo @$user[0]['harga_jasa']; ?>"><br/><br/>


									<br/><br/>
							        <input type="submit" name="btnSimpan" value="Simpan"/>
							        <a href="<?php echo base_url()?>DataBarang/home">Kembali</a>
							    </form>
									</p>
                                </div>
                            </div>
                        </div>
>>>>>>> 173b57f8ce2f1a618f8d7408a38ae7585e84ce3b
                           
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
        
