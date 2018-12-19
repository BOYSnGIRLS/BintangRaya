            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="title-5 m-b-35"><b>Kategori Alat Pesta</b></h3> 

                                <div class="table-data__tool">
                                  <div class="table-data__tool-left">
                                      <div class="rs-select2--light rs-select2--md">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--medium" data-toggle="modal" data-target="#tambah-kategori">
                                        <i class="zmdi zmdi-plus"></i>Tambah</button>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <form  action="cari_barang" method="post" style="text-align: center;">
                                <input class="au-input au-input--xl" type="text" name="nama_barang" placeholder="Cari Alat Pesta " />
                                <button class="au-btn btn-primary" type="submit" name="btnSubmit"><i class="zmdi zmdi-search"></i></button>
                              </form>
                            </div>
                            
                        </div>
            <div class="row">
            <!-- Tabel Tampil Barang -->
            <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-striped table-earning">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kategori</th>
                                <th>Nama Kategori</th>
                                <th colspan="2">Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kategori as $row): ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->id_kategori;?></td>
                                <td><?php echo $row->nama_kategori;?></td>
                                <td> <a href="<?php echo base_url(); ?>DataBarang/edit_kategori/<?php echo $row->id_kategori;?>"><button type="submit" class="fa fa-pencil-square-o" style="font-size:30px"></button></a><br> 

                      
                                </td> 
                                <td>
                                    <a href="<?php echo base_url(); ?>DataBarang/delete_kategori/<?php echo $row->id_kategori;?>"><button type="submit" class="fa fa-trash" style="font-size:30px"></button></a> </td>

                            </tr>
                            <?php $no++;
                            endforeach;?>
                        </tbody>
                    </table>
            </div>
          </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="title-5 m-b-35"><b>Data Alat Pesta</b></h3>
                                <div class="table-data__tool">
                                  <div class="table-data__tool-left">
                                      <div class="rs-select2--light rs-select2--md">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--medium" data-toggle="modal" data-target="#tambah-data">
                                        <i class="zmdi zmdi-plus"></i>Tambah</button>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
						<div class="row">
            <!-- Tabel Tampil Barang -->
            <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-striped table-earning">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
        												<th>Stok Barang</th>
        												<th>Harga Sewa</th>
        												<th>Harga Jasa</th>
                                <th>Kategori</th>
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
                                <td><?php echo $row->nama_kategori;?></td>
                                <td><a href="<?php echo base_url(); ?>DataBarang/edit_barang/<?php echo $row->id_barang;?>"><button type="submit" class="fa fa-pencil-square-o" style="font-size:30px"></button></a></td> 
                                <td>
                                    <a href="<?php echo base_url(); ?>DataBarang/delete_barang/<?php echo $row->id_barang;?>"><button type="submit" class="fa fa-trash" style="font-size:30px"></button></a> 
                                   
                                </td>
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

           <!-- modal tambah barang -->
            <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataBarang/tambah_barang')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class=" col-lg-4 col-sm-2 control-label">Kategori Barang</label>
                                    <div class="col-lg-10">
                                       <select name="id_kategori">
                                        <option value="" class="form-control">Pilih</option>
                                        <?php
                                        foreach($option_kategori as $user){ // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="'.$user->id_kategori.'">'.$user->nama_kategori.'</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Id Barang</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="id_barang" value="<?php echo $kode ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Nama Barang</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="nama_barang" placeholder="Tuliskan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Harga Sewa </label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga_sewa" placeholder="Tuliskan Harga"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Harga Jasa</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga_jasa" placeholder="Tuliskan Harga"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Stok</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="stok_barang" placeholder="Tuliskan Jumlah Stok"></textarea>
                                    </div>
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div></form>
                  </div>
                </div>
              </div>
            </div>
      <!-- end modal large -->

        <!-- modal tambah kategori -->
            <div class="modal fade" id="tambah-kategori" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Kategori Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataBarang/tambah_kategori')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Kode Kategori</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="id_kategori" placeholder="Tuliskan Kode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Nama Kategori</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="nama_kategori" placeholder="Tuliskan Nama">
                                    </div>
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div></form>
                  </div>
                </div>
              </div>
            </div>
      <!-- end modal  -->

<!-- Delete Modal-->
      <div class="modal fade" id="hapus-data" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapus-data">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataBarang/delete_barang')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                
                                <div class="form-group">
                                    <p class="error-text"><i class="fa fa-warning modal-icon"></i>Apakah anda yakin ingin menghapus data tersebut?
                    <br>Data tidak dapat dikembalikan lagi</p>
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger btn-ok" type="submit"> Hapus&nbsp;</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Batal</button>
                </div></form>
                  </div>
                </div>
              </div>
            </div>
      <!-- end modal  -->



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
              modal.find('#id_kategori').html(div.data('id_kategori'));
              modal.find('#id_barang').attr("value",div.data('id_barang'));
              modal.find('#nama_barang').attr("value",div.data('nama_barang'));
              modal.find('#harga_sewa').html(div.data('harga_sewa'));
              modal.find('#harga_jasa').html(div.data('harga_jasa'));
              modal.find('#stok_barang').html(div.data('stok_barang'));
          });
      });
  </script>

  

  

  