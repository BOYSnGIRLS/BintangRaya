            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Barang</h2>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
									<!-- <h3 class="title-1"><a href="<?php echo base_url()?>DataBarang/input">Tambah Barang</a></h3> -->
                                    <a href="javascripts:;">
                                        <button data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">
                                          <i class="glyphicon glyphicon-pencil"></i>
                                          Tambah Data Barang
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
												<th>Stok Barang</th>
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
                                                <td><?php echo $row->id_barang;?></td>
                                                <td><?php echo $row->nama_barang;?></td>
                                                <td><?php echo $row->stok_barang;?></td>
                                                <td><?php echo $row->harga_sewa;?></td>
                                                 <td><?php echo $row->harga_jasa;?></td>
                                                 <!-- <td>EDIT</td> -->
                                                 <!-- <td>HAPUS</td> -->

                                                <td><a href="<?php echo base_url(); ?>DataBarang/edit/<?php echo $row->id_barang;?>">Edit</a></td>

                                                <td><a href="<?php echo base_url(); ?>DataBarang/delete2/<?php echo $row->id_barang;?>">Hapus</a></td>
                                            </tr>
                                            <?php $no++;
                                            endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                </div>
                
        
        <!-- Modal Tambah -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Tambah Data</h4>
                      </div>
                      <form class="form-horizontal" action="<?php echo base_url('DataBarang/input')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Id Barang</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="id_barang" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Nama Barang</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_barang" placeholder="Tuliskan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Harga Jasa</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga_jasa" placeholder="Tuliskan Harga"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
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

    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#tambah-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_barang').attr("value",div.data('id_barang'));
              modal.find('#nama_barang').attr("value",div.data('nama_barang'));
              modal.find('#harga_jasa').html(div.data('harga_jasa'));
          });
      });
  </script>

