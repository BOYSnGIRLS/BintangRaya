
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <center><h2>List Transaksi</h2></center><br><br>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                    <form method="get" action="<?php echo base_url('ListTransaksi')?>" >
                                        <b>Status :</b>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option>Pilih</option>
                                                <option value="menunggu">Menunggu</option>
                                                <option value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                                <option value="kembali">Kembali</option>
                                            </select>
                                           <div class="dropDownSelect2"></div>
                                        </div>
                                        <button type="submit" class="btn btn-info">Tampilkan</button>&nbsp;&nbsp;
                                        <a href="<?php echo base_url('ListTransaksi'); ?>">Reset Filter</a>
                                    </form>
                                    
                                    </div>

                                    <div class="table-data__tool-right">
                                    
                                        <div class="rs-select2--light rs-select2--sm">
                                        
                                    </div>
                                </div>

                            </div>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <b><?php echo $ket; ?></b><br /><br />

                                <!-- DATA TABLE-->
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <!-- <th>No</th> -->
                                                <th>Kode Transaksi</th>
                                                <th>Nama Pelanggan</th>
                                                <th width="100%">Tgl Pasang</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Surat Jalan</th>
                                                <th>Nota Tagihan</th>
                                                <th>Petugas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $no = 1;
                                            foreach ($trans as $row):
                                            ?>
                                            <tr>
                                                <td><?php echo $row->id_sewa ?></td>
                                                <td><?php echo $row->nama_pelanggan ?></td>
                                                <td><?php echo date('d - m - Y', strtotime($row->tgl_pasang));?></td>
                                                <td><?php echo $row->alamat_pelanggan?></td>

                                                <td>

                                                    <?php if($row->status == "Menunggu Proses"){ ?>
                                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#konfirmasi<?php echo $row->id_sewa; ?>">Menunggu</button>

                                                    <?php }else if($row->status == "Proses"){ ?>
                                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#konfirmasi2<?php echo $row->id_sewa;?>">Proses</button>
                                                    

                                                   <?php }else if($row->status == "Selesai"){ ?>
                                                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#selesai">Selesai</button>
                                                    
                                                    <?php }else if($row->status == "Kembali"){ ?>
                                                    <button type="button" class="btn btn-success btn-lg">Kembali</button>
                                                    

                                                   <?php };?>

                                                <td><a href="<?php echo base_url(); ?>ListTransaksi/edit_transaksi/<?php echo $row->id_sewa ;?>"><button type="submit" class="btn btn-info">Edit</button></a>
                                                 <!--   <a href="<?php echo base_url(); ?>ListTransaksi/batal_transaksi/<?php echo $row->id_sewa ;?>"><button type="submit" class="btn btn-warning">Batal</button></a> -->
                                                 <?php if(isset($admin)){ ?>
                                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#batal_sewa<?php echo $row->id_sewa;?>">Batal</button> 
                                                </td>
                                                <?php } ?>
                                                <td><label  class="btn btn-warning"><?php echo anchor('ListTransaksi/suratjalan/'.$row->id_sewa,'VERSI CETAK', array('target' => '_blank')); ?></label> 

                                                <td>
                                                    <a href="<?php echo base_url(); ?>ListTransaksi/notatagihan/<?php echo $row->id_sewa ;?>"><button type="submit" class="btn btn-info">Detail</button></a>
                                                    <label class="btn btn-warning" ><?php echo anchor('ListTransaksi/notatagihan2/'.$row->id_sewa,'Cetak', array('target' => '_blank')); ?></label> 
                                                </td>
                                                <td><?php echo $row->username?></td>
                                                </tr>
                                            <?php endforeach;  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
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
        </div>

    
      <!-- modal konfirmasi -->
    <?php foreach ($trans as $row): ?>
        <div class="modal fade" id="konfirmasi<?php echo $row->id_sewa; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('ListTransaksi/update_status')?>" method="post" enctype="multipart/form-data" role="form">  
                        <div class="modal-body">
                          
                                <p>Yakin mengganti status ini?</p>
                        </div>
                        
                        <div class="modal-footer">
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <input type="hidden" name="id_sewa" value="<?php echo $row->id_sewa; ?>">
                                <input type="hidden" name="status" value="<?php echo $row->status; ?>">
                                <button type="submit" class="btn btn-primary" >Ya</button></a>
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
            <!-- end modal  -->

            <!-- modal konfirmasi -->
    <?php foreach ($trans as $row): ?>
        <div class="modal fade" id="konfirmasi2<?php echo $row->id_sewa; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Ganti Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          
                                <p>Yakin mengganti status ini?</p>
                        </div>
                        
                        <div class="modal-footer">
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                                <form action="<?php echo base_url('ListTransaksi/update_status')?>" method="post" enctype="multipart/form-data" role="form">  
                                <input type="hidden" name="id_sewa" value="<?php echo $row->id_sewa; ?>">
                                <input type="hidden" name="status" value="<?php echo $row->status; ?>">
                                <button type="submit" class="btn btn-primary" >Ya</button></a>
                                 </form>
                            
                        </div> 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
            <!-- end modal  -->

            <!-- modal selesai -->
            <div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Pemesanan telah selesai dilakukan</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            <!-- Batal Transaksi-->
        <?php foreach ($trans as $row):?>
            <div class="modal fade" id="batal_sewa<?php echo $row->id_sewa;?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="batal_sewa">Batalkan Transaksi Sewa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="<?php echo base_url('ListTransaksi/batal_transaksi')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                
                                <div class="form-group">
                                    <p class="error-text">Apakah anda yakin ingin membatalkan transaksi tersebut ?</p>
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_sewa" value="<?php echo $row->id_sewa; ?>">
                    <button class="btn btn-info btn-ok" type="submit"> Ya&nbsp;</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tidak</button>
                </div></form>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach;?>
            <!-- -->

    
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

   <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#konfirmasi').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget);
              var id_sewa = button.data("id_sewa");
              var status = button.data("status");
              var modal          = $(this);
              modal.find("#id_sewa").value(id_sewa);
              modal.find("#status").value(status);
          });
      });
  </script>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'dd-mm-yy' // Set format tanggalnya jadi yyyy-mm-dd
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
    <script src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script>

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