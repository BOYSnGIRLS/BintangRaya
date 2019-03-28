  <!-- MAIN CONTENT -->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid"> 

        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                    <h2 class="title-2 m-b-40">Data Barang Meteran</h2>
                     <div class="form-group row">
                        <div class="col-lg-9">
                        
                        <form id="form_search" action="" method="GET">
                            <label>Cari Barang</label>
                            <div class="input-group">
                                <input type="hidden" name="id_sewa" value="<?php echo $kode;?>" readonly >
                                <input type="text" name="title" class="form-control" id="title" placeholder="nama_barang" style="width:200px;" required="">
                                
                             </div>
                        </form>
                    </div>
                </div>

                    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
                    <script type="text/javascript">
                        function a(id){
                        var stok = "asas";
                        var link = '<?php echo base_url('InputSewa2/getStokBarang') ; ?>';
                        $.ajax({
                            type : "POST",
                            url : link,
                            async : false,
                            data : {'tglp':$('[name = tgl_pasang]').val(),'tgl1':$('[name = tgl_acara1]').val(), 'tgl2':$('[name = tgl_acara2]').val(), 'tglb':$('[name = tgl_bongkar]').val(), 'id' :id},
                            success : function(data){ stok = data }
                        }

                            )
                        return stok;
                        }

                    </script>
                    <script type="text/javascript">
                                              
                        $(document).ready(function(){
                            $('#title').autocomplete({
                            source: "<?php echo site_url().'InputSewa2/get_autocomplete/';?>",
                  
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

        <form id="form_search" action="<?php echo site_url('InputSewa2/inputdetail3');?>" method="POST">
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
                </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="nomor">Panjang : </label>
                    <input class="form-control" type="number" min="0" placeholder="Masukan Jumlah Sewa" type="text" name="jumlah_sewa" onkeypress="return hanyaAngka(event)">
                </div>
                <div class="col-sm-3">
                    <label for="nomor">Lebar : </label>
                    <input class="form-control" type="number" min="0" placeholder="Masukan Jumlah Sewa" type="text" name="jumlah_sewa" onkeypress="return hanyaAngka(event)">
                </div>
            </div>
            <button class="btn btn-info" type="submit">Submit&nbsp;</button>
        </form>
    </div>
    <br>


                <!-- Tampil barang yang disewa -->
            <div class="table-responsive table--no-card m-b-30">
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
                        
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>

            <a href="<?php echo site_url('InputSewa2/step1');?>"><button class="btn btn-info">Simpan</button> </a>
            
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

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'dd-mm-yy' // Set format tanggalnya jadi yyyy-mm-dd
        });
   </script>

<!-- Jquery JS-->
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
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