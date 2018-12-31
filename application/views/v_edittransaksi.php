 MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
          <form id="form_input_detail" action="<?php echo site_url('ListTransaksi/update_transaksi');?>" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                              <h3>EDIT TRANSAKSI</h3><br>
                              <div class="form-group row">
                                  <div class="col-sm-4" >
                                  <label>No Transaksi</label><br>
                                    <input type="text" class="form-control" id="id_sewa" name="id_sewa"   value="<?php echo @$trans[0]['id_sewa']; ?>" readonly>
                    
                                  </div>

                                  <div class="col-sm-4" >
                                    <label  for="nama">Nama Penyewa:</label>
                                    <input class="form-control"  type="text" name="nama_pelanggan" value="<?php echo @$trans[0]['nama_pelanggan']; ?>">
                                  </div>
                                
                                  <div class="col-sm-4">
                                  <label for="nomor">Nomor Telepon: </label>
                                    <input class="form-control" type="text" name="telp_pelanggan" value="<?php echo @$trans[0]['telp_pelanggan']; ?>">
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-sm-4">
                                    <label for="alamat">Alamat Lengkap:</label>
                                    <input class="form-control" type="textarea" name="alamat_pelanggan" value="<?php echo @$trans[0]['alamat_pelanggan']; ?>">
                                  </div>

                                  <div class="col-sm-4">
                                    <label for="tgl">Tanggal Acara 1:</label>
                                   <input class="form-control" type="date" name="tgl_acara1" value="<?php echo @$trans[0]['tgl_acara1']; ?>">
                                  </div>

                                  <div class="col-sm-4">
                                    <label for="tgl">Tanggal Acara 2:</label>
                                    <input class="form-control" type="date" name="tgl_acara2" value="<?php echo @$trans[0]['tgl_acara2']; ?>">
                                  </div>
                              </div>
                             <!--  <div class="form-group row">
                                  <div class="col-sm-4">
                                    
                                  </div>

                                  <div class="col-sm-4">
                                    
                                  </div>

                                  <div class="col-sm-4">
                                    <button class="btn btn-info" name="btnEdit" >Submit</button>
                                  </div>
                              </div> -->
                              
                        </div>

                        <div class="form-group row">
                              <div class="col-lg-9">
                                    <form id="form_search" action="<?php echo site_url('ListTransaksi/get_autocomplete');?>" method="GET"><br>
                                    <h1 class="title-5 m-b-10">Tambah Barang</h1>
                                        <label>Cari Barang</label>
                                        <div class="input-group">
                                            <input type="text" name="title" class="form-control" id="title" placeholder="nama_barang" style="width:200px;">
                                            
                                         </div>
                                    </form>
                                </div>

                                <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
                                <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
                                <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#title').autocomplete({
                                        source: "<?php echo site_url('ListTransaksi/get_autocomplete');?>",
                              
                                        select: function (event, ui) {
                                            $(this).val(ui.item.harga);
                                            $('[name="id_barang"]').val(ui.item.id_barang);
                                            $('[name="nama_barang"]').val(ui.item.label);
                                            $('[name="stok_barang"]').val(ui.item.stok);
                                            $('[name="harga_sewa"]').val(ui.item.harga);
                                            $('[name="harga_jasa"]').val(ui.item.jasa);                            
                                        }
                                    });
                                    });
                                </script> 
                        </div>

                    <form id="form_search" action="<?php echo site_url('ListTransaksi/inputdetail');?>" method="POST">
                        <div class="form-group row">
                                <div class="col-sm-3" >
                                    <label  for="nama">Nama Barang:</label>
                                    <input class="form-control" type="text" name="nama_barang" readonly>
                                    <input class="form-control" type="hidden" name="id_barang" readonly>
                                    <input type="hidden" class="form-control" id="nama_barang" name="nama_barang" style="width:200px;" readonly>
                                    <input type="hidden" class="form-control" id="id_sewa" name="id_sewa"   value="<?php echo @$trans[0]['id_sewa']; ?>" readonly>
                                </div>

                                <div class="col-sm-3" >
                                  <label  for="nama">Stok Barang:</label>
                                  <input class="form-control" type="text" name="stok_barang" readonly >
                                </div>

                                <div class="col-sm-3" >
                                  <label  for="nama">Biaya Sewa:</label>
                                  <input class="form-control" type="text" name="harga_sewa" readonly >
                                  <input type="hidden" name="jasa" readonly="">
                                </div>

                                <div class="col-sm-3">
                                <label for="nomor">Jumlah Sewa: </label>
                                  <input class="form-control" placeholder="Masukan Jumlah Sewa" type="text" name="jumlah_sewa" onkeypress="return hanyaAngka(event)">
                                  <span class="input-group-btn">
                                          <button class="btn btn-info" type="submit">Submit&nbsp;</button>
                                      </span>
                                </div>
                        </div>
                    </form>
             

                                  <table class="table table-borderless table-striped table-earning">
                                      <thead>
                                            <tr>
                                              <th>Kode Barang</th>
                                              <th>Nama Barang</th>
                                              <th>Jumlah Barang</th>
                                              <th>Aksi</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($detail_sewa2 as $items): ?>
                                        <tr>
                                             <td><?=$items->id_hargatenda ;?></td>
                                             <td><?=$items->jenis_tenda;?></td>
                                             <td style="text-align:center;">
                                              <input class="form-control" type="text" name="stok_tenda[]" maxlength="15" value="<?php echo number_format($items->jumlah_barang);?>"></td>
                                     <input type="hidden" name="idhargaTenda[]" id="jumlah_kembali" class="form-control" value="<?php echo $items->id_hargatenda; ?>">
                                            <td><button type="submit" class="btn btn-danger">Hapus</button></td>

                                        </tr>
                                        <?php endforeach; ?>

                                        <?php foreach ($detail_sewa1 as $items): ?>
                                        <tr>
                                             <td><?=$items->id_barang ;?></td>
                                             <td><?=$items->nama_barang;?></td>
                                             <td style="text-align:center;">
                                     <input type="hidden" name="idBarang[]" class="form-control" value="<?php echo $items->id_barang; ?>">
                                              <input class="form-control" type="text" name="stok_barang[]" maxlength="15" value="<?php echo number_format($items->jumlah_barang);?>">
                                              </td>
                                              <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                                        </tr>
                                        <?php endforeach; ?>

                                      </tbody>
                                  </table><br>
                                  <table>
                                      <tr>
                                          <td width="800"></td>
                                          <td><a href="<?php echo base_url()?>ListTransaksi/index"><button class=" btn btn-primary btn-lg" name="kembali" type="submit">Kembali</button></a></td>
                                          <td width="10"></td>
                                          <td><span class="input-group-btn"><button class=" btn btn-primary btn-lg" name="btnUpdate" type="submit">Simpan</button></span></td>
                                      </tr>
                                  </table>

                           </form>
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
        </form>
      </div>
    </div>
</div>
<!-- Jquery JS-->
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