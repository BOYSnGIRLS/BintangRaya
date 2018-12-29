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
                                                <td>: <?php echo date ('d - m - Y', strtotime($data[0]->tgl_pasang));?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Surat</td>
                                                <td>: <?php echo $data[0]->id_sewa;?></td>
                                                <td>Tanggal Acara</td>
                                                <td>: <?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara1));?></td>
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
                                                <td>: <?php echo date ('d - m - Y', strtotime($data[0]->tgl_bongkar));?></td>
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
                                        <hr>
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
                    <th>Pelunasan (Rp)  : </th>
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
            <hr/>
                        </div>
                        <form action="<?php echo base_url().'ListTransaksi/notatagihan'?>" method="post">
                        <div class="form-group row">
                            <div class="col-sm-4" >
                                <label>Pembayaran</label>
                                <input type="hidden" name="id_sewa" value="<?php echo $data[0]->id_sewa;?>">
                                <input type="number" class="form-control input-sm" id="bayar" name="bayar" style="text-align:right;margin-bottom:5px;" required onkeypress="return hanyaAngka(event)">
                                <input type="hidden" class="form-control input-sm" id="bayar2" name="bayar2" style="text-align:right;margin-bottom:5px;" required>

                            </div>
                            <div class="col-sm-4" >
                                <label>Kembalian</label>
                                <input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                            </div>
                        </div>
                        <div >
                                <button name="btnTambah" class="btn btn-info btn-lg">Simpan</button>
                        </div>
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
                var kembali=$('#pelunasan2').val();
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