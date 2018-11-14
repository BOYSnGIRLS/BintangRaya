            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">DATA BARANG</h3>
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
                    <table class=" table-striped table-earning">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
        												<th>Stok Barang</th>
        												<th>Harga Sewa</th>
        												<th>Harga Jasa</th>
        												<th colspan="2" width="35%">Aksi</th>
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
                               
                                  <td>
                                    <div class="rs-select2--light rs-select2--md">
                                      <a href="javascript:;"
                                        data-id="<?php echo $row->id_barang; ?>"
                                        data-nama="<?php echo $row->nama_barang; ?>"
                                        data-toggle="modal" data-target="#editBarang"
                                    >
                                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#editBarang" >EDIT</button>
                                  </div></a></td>

                                <!-- <td><a href="<?php echo base_url(); ?>DataBarang/edit/<?php echo $row->id_barang;?>">Edit</a></td> -->

                      <td><a href="<?php echo base_url(); ?>DataBarang/delete_barang/<?php echo $row->id_barang;?>">Hapus</a></td>
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

           <!-- modal large -->
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
                                        foreach($option_kategori as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="'.$data->id_kategori.'">'.$data->nama_kategori.'</option>';
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

       <!-- modal edit Barang -->
            <div class="modal fade" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataBarang/update')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Kode Barang</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="id_barang" id="id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Nama Barang</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Stok Barang</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga_jasa" id="stok_barang">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Harga Sewa</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga_jasa" id="harga_sewa">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Harga Jasa</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga_jasa" id="harga_jasa">
                                    </div>
                                </div>
                          </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" type="submit" name="btnTambah">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
      <!-- end modal -->
     
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

  <!-- EDIT BARANG -->
   <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <!-- <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#editBarang').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_kategori').html(div.data('id_kategori'));
              modal.find('#id').attr("value",div.data('id_barang'));
              modal.find('#nama').attr("value",div.data('nama_barang'));
              modal.find('#harga_sewa').html(div.data('harga_sewa'));
              modal.find('#harga_jasa').html(div.data('harga_jasa'));
              modal.find('#stok_barang').html(div.data('stok_barang'));
          });
      });
  </script> -->
  <script>
    $(document).ready(function(){
        $('#editbarang').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id_barang');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'DataBarang.php',
                data :  'id='+ id,
                success : function(data){
                $('.editbarang').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  
