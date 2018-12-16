 <!-- MAIN CONTENT -->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid"> 

     <form id="form_input_detail" action="<?php echo site_url('InputSewa/inputket');?>" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h2 class="title-2 m-b-40">Data Penyewa</h2>
                    <!-- input data penyewa -->
                    <div class="form-group row">
                         <div class="col-sm-4" >
                        <label>No Pesanan</label>
                        <input type="text" class="form-control" id="id_sewa" name="id_sewa"   value="<?php echo $kode;?>" readonly>
                    </div>

                      <div class="col-sm-4" >
                        <label  for="nama">Nama Penyewa:</label>
                        <input class="form-control" placeholder="Masukan Nama" type="text" name="nama_pelanggan" value="<?php if(isset($data)) { echo $data[0]->nama_pelanggan; } ?>" required>
                      </div>
                      
                      <div class="col-sm-4">
                      <label for="nomor">Nomor Telepon: </label>
                        <input class="form-control" placeholder="Masukan Nomor" type="text" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->telp_pelanggan; } ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label for="alamat">Alamat Lengkap:</label>
                        <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_pelanggan; } ?>" required>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Tanggal Acara Mulai:</label>
                        <input type="hidden" name="tgl_pasang" value="<?php if(isset($data)) { echo $data[0]->tgl_pasang; } ?>" readonly >
                       <input class="form-control" type="date" name="tgl_acara1" value="<?php if(isset($data)) { echo $data[0]->tgl_acara1; } ?>" required>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Selesai :</label>
                        <input class="form-control" type="date" name="tgl_acara2" value="<?php if(isset($data)) { echo $data[0]->tgl_acara2; } ?>" required>
                      </div>
                      <button class="btn btn-info" name="btnTgl" >Submit</button>
                  </form>
                    </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-9">
                        
                        <form id="form_search" action="" method="GET">
                            <label>Cari Barang</label>
                            <div class="input-group">
                                <input type="hidden" name="id_sewa" value="<?php echo $kode;?>" readonly >
                                <input type="text" name="title" class="form-control" id="title" placeholder="nama_barang" style="width:200px;" required="">
                                
                             </div>


                        </form>
                        <!-- <button class="btn btn-info" onclick="a()">test</button> -->
                    </div>

                    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
                    <script type="text/javascript">
                        function a(id){
                        var stok = "asas";
                        var link = '<?php echo base_url('InputSewa/getStokBarang') ; ?>';
                        //var id = $('[name = "id_barang"]').val();
                        $.ajax({
                            type : "POST",
                            url : link,
                            async : false,
                            data : {'tgl':$('[name = tgl_acara1]').val(), 'id' :id},
                            success : function(data){ stok = data }
                        }

                            )
                        return stok;
                        }

                    </script>
                    <script type="text/javascript">
                                              
                        $(document).ready(function(){
                            $('#title').autocomplete({
                            source: "<?php echo site_url().'InputSewa/get_autocomplete/';?>",
                  
                            select: function (event, ui) {
                                $(this).val(ui.item.label);
                                $('[name="id_barang"]').val(ui.item.id_barang);
                                $('[name="nama_barang"]').val(ui.item.label);
                                $('[name="stok_barang"]').val(ui.item.stok - a(ui.item.id_barang));
                                $('[name="harga_sewa"]').val(ui.item.harga);
                                $('[name="harga_jasa"]').val(ui.item.jasa);                            
                            }
                        });
                        });
                    </script>


        <form id="form_search" action="<?php echo site_url('InputSewa/inputdetail');?>" method="POST">
            <div class="form-group row">
                <div class="col-sm-3" >
                    <label  for="nama">Nama Barang:</label>
                    <input class="form-control" type="text" name="nama_barang" readonly>
                    <input class="form-control" type="hidden" name="id_barang" readonly>
                    <input type="hidden" class="form-control" id="id_sewa" name="id_sewa" style="width:200px;" value="<?php echo $kode;?>" readonly>
                  </div>

                  <div class="col-sm-3" >
                    <label  for="nama">Stok Barang:</label>
                    <input class="form-control" type="text" name="stok_barang" readonly >
                  </div>

                  <div class="col-sm-3" >
                    <label  for="nama">Biaya Sewa (Rp):</label>
                    <input class="form-control" type="text" name="harga_sewa" readonly >
                    <input type="hidden" name="jasa" readonly="">
                  </div>
                  
                  <div class="col-sm-3">
                  <label for="nomor">Jumlah Sewa: </label>
                    <input class="form-control" placeholder="Masukan Jumlah Sewa" type="text" name="jumlah_sewa" onkeypress="return hanyaAngka(event)">
                    <span class="input-group-btn">
                            <button class="btn btn-info" type="submit">Submit&nbsp;</button>
                        </span>
                    </div>
                </div>
        </form>


                <!-- Tampil barang yang disewa -->

                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Sewa</th>
                        <th>Biaya Sewa</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php  $no = 1; 
                        foreach ($detail_sewa2 as $items): ?>
                        
                        <tr>
                            <td><?php echo $no ;?></td>
                             <td><?=$items->id_hargatenda ;?></td>
                             <td><?=$items->jenis_tenda;?></td>
                             <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                             <td style="text-align:right;"><?php echo number_format($items->harga_sewa);?></td>
                             <td style="text-align:right;"><?php echo number_format($items->harga_total);?></td>
                             <td style="text-align:center;"><a href="<?php echo base_url().'InputSewa/remove/'.$items->id_hargatenda;?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                        </tr>
                        
                        <?php $no++;
                        endforeach; ?>
                        <?php 
                        foreach ($detail_sewa1 as $items): ?>
                        
                        <tr>
                            <td><?php echo $no ;?></td>
                             <td><?=$items->id_barang ;?></td>
                             <td><?=$items->nama_barang;?></td>
                             <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                             <td style="text-align:right;"><?php echo number_format($items->harga_sewa);?></td>
                             <td style="text-align:right;"><?php echo number_format($items->harga_total);?></td>
                             <td style="text-align:center;"><a href="<?php echo base_url().'InputSewa/remove/'.$items->id_barang;?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                        </tr>
                        
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
            <hr>

        <form action="<?php echo base_url().'InputSewa'?>" method="post">
            <table>
                <tr>
                    <?php if (isset($lama)) {
                    ?>
                    <td style="width:760px;" rowspan="2"></td>
                    <th style="width:200px;">Lama Acara (hari) </th>
                    <th style="text-align:right;width:140px;">
                    <input type="text" name="lama" value="<?php echo number_format($lama[0]->lama);?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" ></th>
                    <th style="width:140px;">Total (Rp)</th>
                    <th style="text-align:right;width:250px;">
                    <?php }?>

                    <?php if (isset($total) && isset($lama)) {
                    ?>
                    <input type="text" name="total2" value="<?php echo number_format($total[0]->total);?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" ></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $total[0]->total;?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <td></td><td></td>
                    <th>Total Tagihan (Rp)</th>
                    <th style="text-align:right;">
                    <input stye="text" id="total_tagih" name="total_tagih" value="<?php echo ($total[0]->total)*($lama[0]->lama); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>

                <tr>
                    <td></td><td></td><td></td>
                    <th>DP (Rp)</th>
                    <th style="text-align:right;">

                    <input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required onkeypress="return hanyaAngka(event)"></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td><td></td><td></td>
                    <th>Pelunasan (Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
                <tr>
                    <td></td><td></td><td></td>
                    <th>
                    <input class="form-control" type="hidden" name="tgl_acara1" value="<?php if(isset($data)) { echo $data[0]->tgl_acara1; } ?>">
                    <input class="form-control" type="hidden" name="tgl_acara2" value="<?php if(isset($data)) { echo $data[0]->tgl_acara2; } ?>">
                    <input type="hidden" class="form-control" id="id_sewa" name="id_sewa" placeholder="transaksi" style="width:200px;" value="<?php echo $kode;?>" readonly></th>
                    <th><button  name="btnTambah" class="btn btn-info btn-lg"> Simpan</button></th>
                </tr>
                <?php }?>
            </table>
            </form>
            <hr/>
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
</div>
<!-- END PAGE CONTAINER-->

</div>

<script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total_tagih').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
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

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'dd-mm-yy' // Set format tanggalnya jadi yyyy-mm-dd
        });
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

</body>

</html>
<!-- end document