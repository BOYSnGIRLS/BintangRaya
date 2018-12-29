            <!-- MAIN CONTENT-->
    <div class="main-content">
          <div class="section__content section__content--p30">
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="title-5 m-b-35"><b>Data Pegawai</b></h3> 

                                <div class="table-data__tool">
                                  <div class="table-data__tool-left">
                                      <div class="rs-select2--light rs-select2--md">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--medium" data-toggle="modal" data-target="#tambah-data">
                                        <i class="zmdi zmdi-plus"></i>Tambah</button>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <form  action="cari_user" method="post" style="text-align: center;">
                                <input class="au-input au-input--xl" type="text" name="username" placeholder="Cari Pegawai " />
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
                                            <th>Nama Pegawai</th>
                                            <th>Password</th>
                                            <th>Jabatan</th>
                                            <th colspan="2">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($user as $row): ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->username;?></td>
                                            <td><?php echo $row->password;?></td>
                                            <td><?php 
                                                  if($row->level == '0'){
                                                    echo "Admin";
                                                  }else{
                                                    echo "Pegawai";
                                                  }?>
                                            </td>
                                            <td> <button type="submit" class="fa fa-pencil-square-o" style="font-size:30px" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_user;?>"></button>
                                            </td> 
                                            <td>
                                               <button type="submit" class="fa fa-trash" style="font-size:30px" data-toggle="modal" data-target="#modal_hapus<?php echo $row->id_user;?>"></button> 
                                              </td>

                                        </tr>
                                        <?php $no++;
                                        endforeach;?>
                                    </tbody>
                                </table>
                              </div>
                          </div>
              </div>     
        </div>
    </div>

           <!-- modal tambah user -->
            <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataUser/tambah_user')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Username</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="username" placeholder="Tuliskan Nama Pegawai">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Password </label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="password" maxlength="6" placeholder="Tuliskan 6 karakter"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" col-lg-4 col-sm-2 control-label">Kode</label>
                                    <div class="col-lg-10">
                                       <input type="" class="form-control" name="level" placeholder=" Kode 0 = Admin dan Kode 1 = Pegawai">
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

  <!-- modal edit -->
  <?php foreach ($user as $row): ?>
            <div class="modal fade" id="modal_edit<?php echo $row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataUser/update_user')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Username</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="username" value="<?php echo $row->username;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Password </label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="password" maxlength="6" value="<?php echo $row->password;?>"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" col-lg-4 col-sm-2 control-label">Kode</label>
                                    <div class="col-lg-10">
                                       <input type="" class="form-control" name="level" value="<?php echo $row->level;?>">
                                    </div>
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>">
                    <button class="btn btn-info" type="submit"> Update&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div></form>
                  </div>
                </div>
              </div>
            </div>
  <?php endforeach;?>
      <!-- end modal  -->

<!-- Delete Modal-->
<?php foreach ($user as $row):?>
      <div class="modal fade" id="modal_hapus<?php echo $row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapus-data">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('DataUser/delete_user')?>" method="post" enctype="multipart/form-data" role="form">
                        
                                
                                <div class="form-group">
                                    <p class="error-text">Apakah anda yakin ingin menghapus data tersebut?</p>
                                </div>
                            
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>">
                    <button class="btn btn-danger btn-ok" type="submit"> Hapus&nbsp;</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Batal</button>
                </div></form>
                  </div>
                </div>
              </div>
            </div>
<?php endforeach;?>
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
  <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#modal_edit').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget);
              var username = button.data("username");
              var password = button.data("password");
              var level = button.data("level");
              var modal          = $(this);
              modal.find("#username").value(username);
              modal.find("#password").value(password);
              modal.find("#level").value(level);
          });
      });
    </script>
  

  

