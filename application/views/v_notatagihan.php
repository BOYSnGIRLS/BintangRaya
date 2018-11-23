<!-- MAIN CONTENT-->
<?php if(isset($data)){ ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
									<center>
                                        <h3>Persewaan Tenda dan Alat Pesta</h3>
										<h2>Bintang Raya</h2>
                                        <p >Jl. Singosari No.1 Sumber Pakem Kebonsari Jember</p>
										<p >Telp. (0331) 323204, 0831 044 055 05</p>
                                        <h4>BON PEMESANAN</h4>
									</center>
                                        <br>

                                    <div class="row">
                                         <div class="col-sm-3">
                                            <label>NPWP</label><br/>
                                            <label>SIUP</label><br/>
                                            <label  for="no">Nomor Surat</label><br/>
                                            <label  for="tgl">Tanggal Pasang</label><br/>
                                            <label  for="tgl2">Tanggal Acara</label><br/>
                                            <label  for="tgl3">Tanggal Bongkar</label><br/>
                                            <label  for="nama">Nama </label><br/>
                                            <label  for="alamat">Alamat</label><br/>
                                            <label  for="telp">Telp</label><br/>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>80.370.340.4-626.000</label><br/>
                                            <label>503/0629/411/2016</label><br/>
                                            <label><?php echo $data[0]->id_sewa;?></label><br/>
                                            <label><?php echo $data[0]->tgl_pasang;?></label><br/>
                                            <label><?php echo $data[0]->tgl_acara;?></label><br/>
                                            <label><?php echo $data[0]->tgl_bongkar;?></label><br/>
                                            <label><?php echo $data[0]->nama_pelanggan;?></label><br/>
                                            <label><?php echo $data[0]->alamat_pelanggan;?></label><br/>
                                            <label><?php echo $data[0]->telp_pelanggan;?></label><br/>
                                            
                                        </div>
                                    </div>
									
                                        <div class="table-responsive table--no-card m-b-30">
										<table class="table table-borderless table-striped table-earning">
                                            <thead>
                                            <tr>
                                                <th>Satuan</th>
                                                <th>Nama Barang</th>
												<th>Harga</th>
                                                <th>Jumlah</th>
											</tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>100</td>
                                                <td>Kursi</td>
                                                <td>1000</td>
                                                <td>10000</td>
                                            </tr>
											<tr>
                                                <td>100</td>
                                                <td>Mangkok</td>
                                                <td>500</td>
                                                <td>50000</td>
                                            </tr>
											<tr>
                                                <td>200</td>
                                                <td>Sendok</td>
                                                <td>300</td>
                                                <td>60000</td>
                                            </tr>
											<tr>
                                                <td>5</td>
                                                <td>Pemanas</td>
                                                <td>10000</td>
                                                <td>50000</td>
                                            </tr>
											
                                        </table>
										</div>
                                    </div>
                                    <hr>
                                    <br>
                                        <button class="au-btn au-btn-icon au-btn--blue" onClick="window.print();">CETAK</button>
                                    <br>
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
            <!-- END MAIN CONTENT-->