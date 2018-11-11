            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
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
        
