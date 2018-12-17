
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <!-- <div class="row"> -->
                            <div class="col-md-12">
                                <!-- DATA TABLE -->

                            <form method="get" action="<?php echo base_url('LaporanPenyewaan')?>">
                                <h3 class="title-5 m-b-35">List Transaksi</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <h4>Filter Berdasarkan </h4><br>
                                        <label>Tanggal Pasang</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <select name="filter" id="filter" >
                                            <option value="">Pilih</option>
                                            <option value="1">Per Tanggal</option>
                                            <option value="2">Per Bulan</option>
                                            <option value="3">Per Tahun</option>
                                        </select>
                                        <!-- <div class="rs-select2--light rs-select2--sm"> -->
                                        <br />
                                        <div id="form-tanggal">
                                            <label>Tanggal</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="text" name="tanggal" class="input-tanggal" />
                                            <br />
                                        </div>
                                        <div id="form-bulan">
                                            <label>Bulan</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <select name="bulan">
                                                <option value="">Pilih</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <br />
                                        </div>
                                        <div id="form-tahun">
                                            <label>Tahun</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <select name="tahun">
                                                <option value="">Pilih</option>
                                                <?php
                                                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                                                }
                                                ?>  
                                            </select>
                                            <br />
                                        </div>
                                        <button type="submit" class="btn btn-info">Tampilkan</button>&nbsp;&nbsp;
                                        <a href="<?php echo base_url('LaporanPenyewaan'); ?>">Reset Filter</a>
                                    </form>
                                    <hr />
                                    </div>     
                                </div>

                            </div>

                        <div class="row m-t-30">
                            <div class="col-md-12">

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <!-- <th>No</th> -->
                                                <th>Kode Transaksi</th>
                                                <th>Nama </th>
                                                <th>Tanggal Acara</th>
                                                <th>Alamat</th>
                                                <th>Jumlah Tagihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             if( ! empty($trans)){
                                                  foreach($trans as $row){
                                                  $tgl1 = date('d/m/Y', strtotime($row->tgl_acara1)); 
                                                  $tgl2 = date('d/m/Y', strtotime($row->tgl_acara2)); 

                                           
                                            ?>
                                            <tr>
                                                <td><?php echo $row->id_sewa ?></td>
                                                <td><?php echo $row->nama_pelanggan ?></td>
                                                <td><?php echo $tgl1."<b> - </b>".$tgl2; ?></td>
                                                <td><?php echo $row->alamat_pelanggan?></td>
                                                <td><?php echo $row->total_tagihan?></td>
                                                
                                            </tr>
                                            <?php }}  ?>
                                            <tr>
                                                <td colspan="4" style="text-align:right;"><b>Total</b></td>
                                                <td><?php echo $row->totals?></td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    
    
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })     
   </script>

   <!-- Jquery JS-->
    <!-- <script src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script> -->

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