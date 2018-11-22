
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">List Transaksi</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        Status :
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">All</option>
                                                <option value="">Akan</option>
                                                <option value="">Proses</option>
                                                <option>Selesai</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>

                                    <!-- <div class="table-data__tool-right"> -->
                                        <!-- Tanggal Pasang : <input type="table-data__tool-left"></input> -->
                                        <form method="get" action="">
                                        <label>Filter Berdasarkan Tanggal Pasang</label><br>
                                        <!-- <div class="rs-select2--light rs-select2--sm"> -->
                                        <select class="js-select2" name="filter" id="filter">
                                            <option value="">Pilih</option>
                                            <option value="1">Per Tanggal</option>
                                            <option value="2">Per Bulan</option>
                                            <option value="3">Per Tahun</option>
                                        </select><div class="dropDownSelect2"></div>
                                        <br />
                                        <div id="form-tanggal">
                                            <label>Tanggal</label><br>
                                            <input type="text" name="tanggal" class="input-tanggal" />
                                            <br />
                                        </div>
                                        <div id="form-bulan">
                                            <label>Bulan</label><br>
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
                                            <label>Tahun</label><br>
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
                                        <button type="submit" class="btn btn-info">Tampilkan</button>
                                        <a href="<?php echo base_url('ListTransaksi'); ?>">Reset Filter</a>
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
                                                <th>Nama Pelanggan</th>
                                                <th>Tgl Pasang</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Surat Jalan</th>
                                                <th>Nota Tagihan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $no = 1;
                                            foreach ($trans as $row):
                                            ?>
                                            <tr>
                                                <!-- <td><?php echo $no++; ?></td> -->
                                                <td><?php echo $row->id_sewa ?></td>
                                                <td><?php echo $row->nama_pelanggan ?></td>
                                                <td><?php echo $row->tgl_pasang?></td>
                                                <td><?php echo $row->alamat_pelanggan?></td>
                                                <td><a href=""><button type="submit" class="btn btn-warning">Akan</button></a></td> 
                                                <td><a href="<?php echo base_url(); ?>ListTransaksi/suratjalan/<?php echo $row->id_sewa;?>"><button type="submit" class="btn btn-info">Detail</button></a></td> 
                                                <td><a href=""><button type="submit" class="btn btn-info">Detail</button></a></td> 
                                                 <td><a href="<?php echo base_url(); ?>ListTransaksi/edit/<?php echo $row->id_sewa ;?>">Edit</a></td>
                                            </tr>
                                            <?php 
                                            // $no++;
                                    endforeach;  ?>
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