 <!-- MAIN CONTENT -->
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
                                        <!-- <div class="col-lg-2">
                                            <label>NPWP</label><br/>
                                            <label>SIUP</label><br/>
                                            <label  for="no">Nomor Surat</label><br/>
                                            <label  for="nama">Nama </label><br/>
                                            <label  for="alamat">Alamat</label><br/>
                                        </div> -->
                                        <!-- <div class="col-lg-3">
                                            <label>: 80.370.340.4-626.000</label><br/>
                                            <label>: 503/0629/411/2016</label><br/>
                                            <label>: <?php echo $data[0]->id_sewa;?></label><br/>
                                            <label>: <?php echo $data[0]->nama_pelanggan;?></label><br/>
                                            <label>: <?php echo $data[0]->alamat_pelanggan;?></label><br/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label  for="telp">Telp</label><br/>
                                            <label  for="tgl">Tanggal Pasang</label><br/>
                                            <label  for="tgl2">Tanggal Acara</label><br/>
                                            <label  for="tgl2">Lama Acara</label><br/>
                                            <label  for="tgl3">Tanggal Bongkar</label><br/>
                                        </div> -->
                                        <!-- <div class="col-lg-4">
                                            <label>: <?php echo $data[0]->telp_pelanggan;?></label><br/>
                                            <label>: <?php echo $data[0]->tgl_pasang;?></label><br/>
                                            <label>: <?php echo $data[0]->tgl_acara1;?></label> s/d <label><?php echo $data[0]->tgl_acara2;?></label><br/> 
                                            <label>: <?php echo $data[0]->lama;?> Hari</label><br/>
                                            <label>: <?php echo $data[0]->tgl_bongkar;?></label><br/>
                                        </div> -->

                                        <table class="table table-borderless ">
                                            <tr>
                                                <td>NPWP</td>
                                                <td>: 80.370.340.4-626.000</td>
                                                <td>Telp</td>
                                                <td>: <?php echo $data[0]->telp_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>SIUP</td>
                                                <td>: 503/0629/411/2016</td>
                                                <td>Tanggal Pasang</td>
                                                <td>: <?php echo $data[0]->tgl_pasang;?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Surat</td>
                                                <td>: <?php echo $data[0]->id_sewa;?></td>
                                                <td>Tanggal Acara</td>
                                                <td>: <?php echo $data[0]->tgl_acara1;?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>: <?php echo $data[0]->nama_pelanggan;?></td>
                                                <td>Lama Acara</td>
                                                <td>: <?php echo $data[0]->lama;?> Hari</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>: <?php echo $data[0]->alamat_pelanggan;?></td>
                                                <td>Tanggal Bongkar</td>
                                                <td>: <?php echo $data[0]->tgl_bongkar;?></td>
                                            </tr>

                                        </table>
                                    </div><br>
									
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
                                            <?php
                                            foreach ($detail_sewa2 as $items): ?>
                                        <tr>
                                            <td><?php echo number_format($items->jumlah_barang);?></td>
                                            <td><?=$items->jenis_tenda;?></td>
                                            <td><?php echo number_format($items->harga_sewa);?></td>
                                            <td><?php echo number_format($items->harga_total);?></td>
                                        </tr>
                                            <?php
                                            endforeach; ?>

                                            <?php 
                                            foreach ($detail_sewa1 as $items): ?>
                                        <tr>
                                            <td><?php echo number_format($items->jumlah_barang);?></td>
                                            <td><?=$items->nama_barang;?></td>
                                            <td><?php echo number_format($items->harga_sewa);?></td>
                                            <td><?php echo number_format($items->harga_total);?></td>
                                        </tr>
                                
                                            <?php
                                            endforeach; ?>
                                            </tbody>
                                        </table>
										</div>
                                        <table style="">
                <tr>
                    <th>Total (Rp) : </th>
                    <th style="text-align:right;"><input type="text" name="total" value="<?php echo number_format($data[0]->total_tagihan) ;?>" style="text-align:right;"></th>
                </tr>
                <tr>
                    <th>DP (Rp)         : </th>
                    <th style="text-align:right;"><input type="text" name="dp" value="<?php echo number_format($data[0]->dp) ;?>" style="text-align:right;"></th>
                </tr>
                <tr>
                    <th>Biaya Ganti Rugi : </th>
                    <th style="text-align:right;"><input type="text" name="ganti_rugi" value="<?php echo number_format($data[0]->biaya_ganti) ;?>" style="text-align:right;"></th>
                </tr>
                <tr>
                    <th>Kurang Pembayaran (Rp)  : </th>
                    <th style="text-align:right;"><input type="text" class="input-sm" id="pelunasan" name="pelunasan" value="<?php echo number_format($data[0]->pelunasan) ;?>" style="text-align:right;">
                    <input type="hidden" class="input-sm" id="pelunasan2" name="pelunasan2" value="<?php echo $data[0]->pelunasan ;?>" style="text-align:right;">
                    </th>
                </tr>
                <tr>
                    <th>Pembayaran (Rp)         : </th>
                    <th style="text-align:right;"><input type="text" name="pembayaran" value="<?php echo number_format($data[0]->bayar) ;?>" style="text-align:right;"></th>
                </tr>
                <tr>
                    <th>Kembalian (Rp)         : </th>
                    <th style="text-align:right;"><input type="text" name="kembali" value="<?php echo number_format($data[0]->kembalian) ;?>" style="text-align:right;"></th>
                </tr>

            </table>
                                    </div>
                                    <br>
                                        <button class="au-btn au-btn-icon au-btn--blue" onClick="window.print();">CETAK</button>
                                    <br>
                                </div>
                            </div>

                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END MAIN CONTENT