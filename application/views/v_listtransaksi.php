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
                                    <div class="table-data__tool-right">
                                        Tanggal Pasang : <input type="date"></input>
                                    </div>    
                                    <!-- <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div> -->
                                </div>

                            </div>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
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
                                            $no = 1;
                                            foreach ($trans as $row){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= $row['id_sewa'];?></td>
                                                <td><?= $row['nama_pelanggan'];?></td>
                                                <td><?= $row['tgl_pasang'];?></td>
                                                <td><?= $row['alamat_pelanggan'];?></td>
                                                <td>akan</td>
                                                <td>detail</td>
                                                <td>detail</td>
                                                 <td><a href="<?php echo base_url(); ?>ListTransaksi/edit/<?php echo $row->id_sewa;?>">Edit</a></td>
                                            </tr>
                                            <?php } ?>
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
