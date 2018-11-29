 <!-- MAIN CONTENT -->
 <!-- <?php if(isset($data)){ ?> -->
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
									</center>
                                        <br>

                                
                                
                                    <div class="row">          
                                         <div class="col-sm-3">
                                            <label  for="no">Nomor Surat</label><br/>
                                            <label  for="tgl">Tanggal Pasang</label><br/>
                                            <label  for="tgl2">Tanggal Acara</label><br/>
                                            <label  for="tgl3">Tanggal Bongkar</label><br/>
                                            <label  for="nama">Nama </label><br/>
                                            <label  for="alamat">Alamat</label><br/>
                                            <label  for="telp">Telp</label><br/>
                                        </div>

                                       <div class="col-lg-6">
                                            <?php foreach ($data as $row): ?>
                                            <label><?php echo $row->id_sewa;?></label><br/>
                                            <label><?php echo $row->tgl_pasang;?></label><br/>
                                            <label><?php echo $row->tgl_acara1;?></label>
                                            <label>s/d </label>
                                            <label><?php echo $row->tgl_acara2;?></label>
                                            <br/>
                                            <label><?php echo $row->tgl_bongkar;?></label><br/>
                                            <label><?php echo $row->nama_pelanggan;?></label><br/>
                                            <label><?php echo $row->alamat_pelanggan;?></label><br/>
                                            <label><?php echo $row->telp_pelanggan;?></label><br/>
                                            <?php endforeach;?>
                                        </div>
                                        
                                    </div>

									
                                        <div class="table-responsive table--no-card m-b-30">
										<table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
												<th>Jumlah Barang</th>
											</tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($detail_sewa2 as $items): ?>
                                        <tr>
                                             <td><?=$items->id_hargatenda ;?></td>
                                             <td><?=$items->jenis_tenda;?></td>
                                             <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                                         </tr>
                                            <?php
                                            endforeach; ?>

                                            <?php 
                                            foreach ($detail_sewa1 as $items): ?>
                                        <tr>
                                             <td><?=$items->id_barang ;?></td>
                                             <td><?=$items->nama_barang;?></td>
                                             <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                                             
                                        </tr>
                                
                                            <?php
                                            endforeach; ?>
                                        </tbody>
                                        </table>
							             </div>
                                    </div>
                                    <hr>
                                    <br>
                                        <button class="au-btn au-btn-icon au-btn--blue" onClick="window.print();">CETAK</button>
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
      <!--   <?php }?> -->
            <!-- END MAIN CONTENT