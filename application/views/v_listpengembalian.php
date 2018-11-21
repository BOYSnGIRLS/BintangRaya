<!-- MAIN CONTENT-->
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
                                        <a href="<?php echo base_url('listPengembalian'); ?>">Reset Filter</a>
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
                                                <th>Alamat</th>
                                                <th>Tgl Bongkar</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                            <?php
                                            // $no = 1;
                                            foreach ($data as $row):
                                            ?>
                                            <tr>
                                                <!-- <td><?php echo $no++; ?></td> -->
                                                <td><?php echo $row->id_sewa ?></td>
                                                <td><?php echo $row->nama_pelanggan ?></td>
                                                <td><?php echo $row->alamat_pelanggan?></td>
                                                <td><?php echo $row->tgl_bongkar?></td>
                                                <td ><label class="btn btn-warning btn-xs"> akan</label></td>
                                                <td><a href="<?php echo base_url(); ?>listPengembalian/detail/<?php echo $row->id_sewa;?>"><button class="btn btn-info"> detail </button></a></td> 
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

    </div>