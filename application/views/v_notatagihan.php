<!-- MAIN CONTENT-->
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
                            <table width="900px">
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
            
                    <hr>
                    <h4>Barang Hilang atau Rusak (BHR)</h4>
                    <br>
                            <table width="900px">
                                <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Biaya</th>
                                    <th>Total Ganti Rugi</th>
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
                <hr>
                
            <div class="row">
                <div class="col-sm-6" >
                    <table width="350px" >
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
                    </table>
                    </div>
                <div class="col-sm-6">
                    <table width="350px">
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
                    </table>
                    </div>
                    </div>
            <hr/>
                    <form action="<?php echo base_url().'ListTransaksi/notatagihan'?>" method="post">
                           <?php if($data[0]->bayar > 0) {
                               echo "<center><h4>Pembayaran Selesai</h4></center>";
                                }else { ?>
                        <div class="form-group row">
                               <div class="col-sm-6" >
                                    <b><label>Pembayaran</label></b>
                                    <input type="hidden" name="id_sewa" value="<?php echo $data[0]->id_sewa;?>">
                                    <input type="number" class="form-control input-sm" id="bayar" name="bayar" style="text-align:right;margin-bottom:5px;" required onkeypress="return hanyaAngka(event)">
                                    <input type="hidden" class="form-control input-sm" id="bayar2" name="bayar2" style="text-align:right;margin-bottom:5px;" required>
                                </div>
                                <div class="col-sm-6" >
                                    <b><label>Kembalian</label></b>
                                    <input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                                </div>
                            </div>
                            <div >
                                    <button name="btnTambah" class="btn btn-info btn-lg">Simpan</button>
                            </div>
                          <?php } ?>
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

            <!-- END MAIN CONTENT-->
    
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>        

    <script type="text/javascript">
        $(function(){
            $('#bayar').on("input",function(){
                var kembali=$('#tagihan2').val();
                var bayar=$('#bayar').val();
                var hsl=kembali.replace(/[^\d]/g,"");
                $('#bayar2').val(hsl);
                $('#kembalian').val(hsl-bayar);
            })
            
        });
    </script>
    <script type="text/javascript">
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>

    
    <!-- Jquery JS-->
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url();?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>