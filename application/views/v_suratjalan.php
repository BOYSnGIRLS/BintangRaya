 <!-- MAIN CONTENT -->
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
									</center>
                                        <br>

                                
                                
                                    <div class="row">       
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Nomor Surat</td>
                                                <td>: <?php echo $data[0]->id_sewa;?></td>
                                                <td>Nama Pelanggan</td>
                                                <td>: <?php echo $data[0]->nama_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Pasang</td>
                                                <td>: <?php echo date ('d - m - Y', strtotime($data[0]->tgl_pasang));?></td>
                                                <td>Alamat</td>
                                                <td>: <?php echo $data[0]->alamat_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Acara</td>
                                                <td>: <?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara1));?> s/d <?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara2));?></td>
                                                <td>No. Telepon</td>
                                                <td>: <?php echo $data[0]->telp_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Bongkar</td>
                                                <td>: <?php echo date ('d - m - Y', strtotime($data[0]->tgl_bongkar));?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                        <br>

									
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
                                    <hr>
                                    <br>
                                        <button class="au-btn au-btn-icon au-btn--blue" onClick="window.print();">CETAK</button>
                                    <br>
                                    <!-- <?php echo anchor('ListTransaksi/suratjalan2/'.$data[0]->id_sewa,'VERSI CETAK', array('target' => '_blank')); ?> 
                                    -->
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
        <?php }?>
            <!-- END MAIN CONTENT