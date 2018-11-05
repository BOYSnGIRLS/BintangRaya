            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">    
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tambah Data Barang</h2>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-12">
                                 <div class="au-card m-b-30">
                                    <div class="overview-wrap">
                                        <p>
    										<form method="post" action="input">
    							        Kode Barang<br/><input type="text" name="kodeBarang" size="5" maxlength="5" value="<?php if(isset($data)) { echo $data[0]->kodeBarang; } ?>"><br/><br/>
    									
    							        Nama<br/><input type="text" name="namaBarang" size="30" maxlength="25" value="<?php if(isset($data)) { echo $data[0]->namaBarang; } ?>"><br/><br/>
    									
    							        Stok Barang<br/><input type="number" name="stokBarang" size="5" maxlength="5" value="<?php if(isset($data)) { echo $data[0]->stokBarang; } ?>"><br/><br/>

    							        Harga Sewa<br/><input type="number" name="sewaBarang" size="5" maxlength="5" value="<?php if(isset($data)) { echo $data[0]->sewaBarang; } ?>"><br/><br/>

    							        Harga Jasa<br/><input type="number" name="jasaBarang" size="5" maxlength="5" value="<?php if(isset($data)) { echo $data[0]->jasaBarang; } ?>"><br/><br/>


									<br/><br/>
							        <input type="submit" name="btnTambah" value="Simpan"/>
							        <a href="<?php echo base_url()?>DataBarang/home">Kembali</a>
							    </form>
									</p>
                                </div>
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
        
