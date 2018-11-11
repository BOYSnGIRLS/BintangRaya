    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                         <h3 class="title-5 m-b-10">DATA TENDA</h3>
                                <button class="btn au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#tambah-tenda">
                                <i class="zmdi zmdi-plus"></i>Tambah Data</button>
                    </div>
                </div>
				
                    <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Tenda</th>
                                        <th>Ukuran Tenda</th>
										<th>Stok Tenda</th>
										<th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row): ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row->id_tenda;?></td>
                                        <td><?php echo $row->ukuran_tenda;?></td>
                                        <td><?php echo $row->stok_tenda;?></td>
                                        <td><a href="javascript:;"
                                            data-id_tenda="<?php echo $row->id_tenda ?>"
                                            data-ukuran_tenda="<?php echo $row->ukuran_tenda ?>"
                                            data-stok_tenda="<?php echo $row->stok_tenda ?>"
                                            data-toggle="modal" data-target="#edit-tenda">
                                            <button  data-toggle="modal" data-target="#ubah-tenda" class="btn btn-info">Edit</button></a></a>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>DataBarang/delete_tenda/<?php echo $row->id_tenda;?>">Hapus</a></td>
                                    </tr>
                                    <?php $no++;
                                    endforeach;?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                         <h3 class="title-5 m-b-10">DATA PAKET TENDA</h3>
                                <button class="btn au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#tambah-paket-tenda">
                                <i class="zmdi zmdi-plus"></i>Tambah Data</button>
                    </div>
                </div>
            <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Ukuran Tenda</th>
                                <th>Harga Sewa</th>
                                <th>Harga Jasa</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_paket as $row): ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->jenis_tenda;?></td>
                                <td><?php echo $row->ukuran_tenda;?></td>
                                <td><?php echo $row->harga_sewa;?></td>
                                <td><?php echo $row->harga_jasa;?></td>
                                 <!-- <td>EDIT</td> -->
                                 <!-- <td>HAPUS</td> -->

                                <td><a href="<?php echo base_url(); ?>DataBarang/edit/<?php echo $row->id_hargatenda;?>">Edit</a></td>

                                <td><a href="<?php echo base_url(); ?>DataBarang/delete_paket/<?php echo $row->id_hargatenda;?>">Hapus</a></td>
                            </tr>
                            <?php $no++;
                            endforeach;?>
                        </tbody>
                    </table>
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

<!-- modal tambah tenda -->
    <div class="modal fade" id="tambah-tenda" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Tambah Data Tenda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="<?php echo base_url('DataBarang/tambah_tenda')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                          <label class=" col-lg-4 col-sm-2 control-label">Kategori Barang</label>
                                    <div class="col-lg-10">
                                       <select name="id_kategori">
                                        <option value="" class="form-control">Pilih</option>
                                        <?php
                                        foreach($option_kategori as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="'.$data->id_kategori.'">'.$data->nama_kategori.'</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Id Tenda</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="id_tenda" value="<?php echo $kode; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Ukuran Tenda</label>
                            <div class="col-lg-10">
                              <input type="text" class="form-control" name="ukuran_tenda" placeholder="Tuliskan Ukuran Tenda">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Stok Tenda</label>
                            <div class="col-lg-10">
                              <input type="number" class="form-control" name="stok_tenda" placeholder="Tuliskan Jumlah Tenda"></textarea>
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
<!-- end modal large -->

<!-- modal tambah paket tenda -->
    <div class="modal fade" id="tambah-paket-tenda" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Tambah Data Paket Tenda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="<?php echo base_url('DataBarang/tambah_paket')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Id Paket Tenda</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="id_hargatenda" value="<?php echo $kode2; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Jenis Tenda</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="jenis_tenda" placeholder="Tuliskan Jenis Tenda">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Ukuran Tenda</label>
                            <div class="col-lg-10">
                                <select name="id_tenda">
                                        <option value="" class="form-control">Pilih</option>
                                        <?php
                                        foreach($option_ukuran as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="'.$data->id_tenda.'">'.$data->ukuran_tenda.'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Harga Sewa</label>
                            <div class="col-lg-10">
                              <input type="number" class="form-control" name="sewa_tenda" placeholder="Tuliskan Harga Sewa"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Harga Jasa</label>
                            <div class="col-lg-10">
                              <input type="number" class="form-control" name="jasa_tenda" placeholder="Tuliskan Harga Jasa"></textarea>
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
<!-- end modal large -->


<!-- Modal Edit -->
    <div class="modal fade" id="edit-tenda" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Ubah Data</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url('Dashboard/ubah_tenda')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Ukuran Tenda</label>
                                <div class="col-lg-10">
                                  <!-- <input type="hidden" id="id_roti" name="id_roti"> -->
                                  <input class="form-control" id="ukuran_tenda" name="ukuran_tenda"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Stok Tenda</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="stok_tenda" name="stok_tenda">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                          </div></form></div></div></div>

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
          $('#tambah-tenda').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
              // Isi nilai pada field
              modal.find('#id_tenda').html(div.data('id_tenda'));
              modal.find('#ukuran_tenda').attr("value",div.data('ukuran_tenda'));
              modal.find('#stok_tenda').html(div.data('stok_tenda'));
          });
      });
      $(document).ready(function() {
          // Untuk sunting
          $('#edit-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_tenda').attr("value",div.data('id_tenda'));
              modal.find('#ukuran_tenda').attr("value",div.data('ukuran_tenda'));
              modal.find('#stok_tenda').html(div.data('stok_tenda'));
          });
      });
  </script>