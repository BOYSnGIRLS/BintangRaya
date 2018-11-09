            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Tenda</h2>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    
									<h3 class="title-1"><a href="<?php echo base_url()?>DataBarang/input">Tambah Tenda</a></h3>
                                </div>
                            </div>
                        </div>
                            <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Tenda</th>
                                                <th>Jenis Tenda</th>
                                                <th>Ukuran Tenda</th>
												<th>Stok Tenda</th>
												<th>Harga Sewa</th>
												<th>Harga Jasa</th>
												<th colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data as $row): ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->id_hargatenda;?></td>
                                                <td><?php echo $row->jenis_tenda;?></td>
                                                <td><?php echo $row->ukuran_tenda;?></td>
                                                <td><?php echo $row->stok_tenda;?></td>
                                                <td><?php echo $row->sewa_tenda;?></td>
                                                 <td><?php echo $row->jasa_tenda;?></td>
                                                 <!-- <td>EDIT</td> -->
                                                 <!-- <td>HAPUS</td> -->

                                                <td><a href="<?php echo base_url(); ?>DataBarang/edit/<?php echo $row->id_hargatenda;?>">Edit</a></td>

                                                <td><a href="<?php echo base_url(); ?>DataBarang/delete/<?php echo $row->id_hargatenda;?>">Hapus</a></td>
                                            </tr>
                                            <?php $no++;
                                            endforeach;?>
                                        </tbody>
                                    </table>
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
        