 <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-0.5"></div>
                        <div class="col-lg-9">
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
            <div class="col-sm-6" >
                <table width="450px">
                    <tr>
                        <td>NPWP</td>
                        <td>:</td>
                        <td>80.370.340.4-626.000</td>
                    </tr>
                    <tr>
                        <td>SIUP</td>
                        <td>:</td>
                        <td>503/0629/411/2016</td>
                    </tr>
                    <tr>
                        <td>Nomor Nota</td>
                        <td>:</td>
                        <td><?php echo $data[0]->id_sewa;?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $data[0]->nama_pelanggan;?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $data[0]->alamat_pelanggan;?></td>
                    </tr>

                </table>
            </div>

            <div class="col-sm-6" >
                <table width="450px">
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td><?php echo $data[0]->telp_pelanggan;?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pasang</td>
                        <td>:</td>
                        <td><?php echo date ('d - m - Y', strtotime($data[0]->tgl_pasang));?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Acara</td>
                        <td>:</td>
                        <td><?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara1));?> s/d <?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara2));?></td>
                    </tr>
                    <tr>
                        <td>Lama Acara</td>
                        <td>:</td>
                        <td><?php echo $data[0]->lama;?> Hari</td>
                    </tr>
                    <tr>
                        <td>Tanggal Bongkar</td>
                        <td>:</td>
                        <td><?php echo date ('d - m - Y', strtotime($data[0]->tgl_bongkar));?></td>
                    </tr>

                </table>
            </div>
            </div>
                    
            <hr>
            <h4>Barang Yang Disewa</h4>
            <br>
                    <table width="890px">
                        <thead>
                        <tr>
                            <th style="text-align:center;">Satuan</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php
                        foreach ($detail_sewa2 as $items): ?>
                    <tr>
                        <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                        <td><?=$items->jenis_tenda;?></td>
                        <td><?php echo number_format($items->harga_sewa);?></td>
                        <td><?php echo number_format($items->harga_total);?></td>
                    </tr>
                        <?php
                        endforeach; ?>

                        <?php 
                        foreach ($detail_sewa1 as $items): ?>
                    <tr>
                        <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                        <td><?=$items->nama_barang;?></td>
                        <td><?php echo number_format($items->harga_sewa);?></td>
                        <td><?php echo number_format($items->harga_total);?></td>
                    </tr>
            
                        <?php
                        endforeach; ?>
                        </tbody>
                    </table>
                    </div>
    
            <hr>
            <div class="row">
                <div class="col-sm-7" >
                <h4>Barang Hilang atau Rusak (BHR)</h4>
                <br>
                            <table width="500px">
                                <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th style="text-align:center;">Jumlah</th>
                                    <th style="text-align:center;">Biaya</th>
                                    <th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php 
                                foreach ($barang_kembali as $items): ?>
                                
                                <tr>
                                     <td><?=$items->nama_barang;?></td>
                                     <td style="text-align:center;"><?php echo number_format($items->hilangrusak);?></td>
                                     <td style="text-align:center;"><?php echo number_format($items->harga_ganti_rugi);?></td>
                                     <td style="text-align:center;"><?php echo number_format($items->harga_ganti);?></td>
                                </tr>
                    
                                <?php
                                endforeach; ?>
                                </tbody>
                            </table>
                </div>

                <div class="col-sm-4" >
                    <table width="320px">
                        <tr>
                            <td>Biaya Transportasi(Rp) </td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format($data[0]->biaya_transportasi) ;?></td>
                            <input type="hidden" name="kembali" value="<?php echo number_format($data[0]->biaya_transportasi) ;?>" style="text-align:right;">
                        </tr>
                        <tr>
                            <td>Total (Rp)</td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format($data[0]->total_tagihan) ;?></td>
                            <input type="hidden" name="total" value="<?php echo number_format($data[0]->total_tagihan) ;?>" style="text-align:right;">
                        </tr>
                        <tr>
                            <td>DP (Rp) </td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format($data[0]->dp) ;?></td>
                            <input type="hidden" name="dp" value="<?php echo number_format($data[0]->dp) ;?>" style="text-align:right;">
                        </tr>
                        <tr>
                            <td>Biaya Ganti Rugi</td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format($data[0]->biaya_ganti) ;?></td>
                            <input type="hidden" name="ganti_rugi" value="<?php echo number_format($data[0]->biaya_ganti) ;?>" style="text-align:right;">
                        </tr>
                        
                        <tr>
                            <td>Pelunasan (Rp)  </td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format($data[0]->pelunasan) ;?></td>
                            <input type="hidden" class="input-sm" id="pelunasan" name="pelunasan" value="<?php echo number_format($data[0]->pelunasan) ;?>" style="text-align:right;">
                            <input type="hidden" class="input-sm" id="pelunasan2" name="pelunasan2" value="<?php echo $data[0]->pelunasan ;?>" style="text-align:right;">
                            
                        </tr>
                        <tr>
                            <td>Total Tagihan (Rp) </td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format (($data[0]->pelunasan)-($data[0]->biaya_ganti)) ;?></td>
                            <input type="hidden" id="tagihan" name="tagihan" value="<?php echo number_format (($data[0]->pelunasan)-($data[0]->biaya_ganti)) ;?>" style="text-align:right;">
                            <input type="hidden" class="input-sm" id="tagihan2" name="tagihan2" value="<?php echo ($data[0]->pelunasan)-($data[0]->biaya_ganti) ;?>" style="text-align:right;">
                            
                        </tr>
                        <tr>
                            <td>Pembayaran (Rp) </td>
                            <td>:</td>
                            <td style="text-align:right;"><?php echo number_format($data[0]->bayar) ;?></td>
                            <input type="hidden" name="pembayaran" value="<?php echo number_format($data[0]->bayar) ;?>" style="text-align:right;">
                        </tr>
                        <!--<tr>-->
                        <!--    <td>Kembalian (Rp) </td>-->
                        <!--    <td>:</td>-->
                        <!--    <td style="text-align:right;"><?php echo number_format($data[0]->kembalian) ;?></td>-->
                        <!--    <input type="hidden" name="kembali" value="<?php echo number_format($data[0]->kembalian) ;?>" style="text-align:right;">-->
                        <!--</tr>-->
                        
                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-9" >
                    <br>
                   
                </div>

                <div class="col-sm-3" >
                    <table class="table table-borderless" >
                        <tr>
                            <th>Jember, <?php echo date('d-m-Y'); ?></th>
                        </tr>
                        <tr><th></th></tr>
                        <tr><th></th></tr>
                        <tr><th></th></tr>
                        <tr>
                            <th>(Andry Irdhiansyah)</th>
                        </tr>
                        
                    </table>
                </div>

                                    </div>
                                    <br>
                                        <input name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" style="visibility: visible;">
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

            <!-- END MAIN CONTENT -->

<script>
    function Cetakan(){
  var x = document.getElementsByName("cetak");
  for(i = 0; i < x.length ; i++)
  {
        x[i].style.visibility = "hidden";
  }
  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
  for(i = 0; i < x.length ; i++)
  {
        x[i].style.visibility = "visible";
  }
}
</script>


