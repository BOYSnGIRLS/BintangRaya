<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid">
     <form id="form_input_detail" action="<?php echo site_url('ListPengembalian/inputdetail');?>" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <!-- <h2 class="title-2 m-b-40">Data Penyewa</h2> -->
                    <!-- input data penyewa -->
                    <div class="form-group row">
                      <div class="col-sm-4" >

                      <form id="form_search" action="<?php echo site_url('ListPengembalian/get_autocomplete');?>" method="GET">
                          <label>Cari Transaksi</label>
                          <div class="input-group">
                              <input type="text" name="title" class="form-control" id="title" placeholder="No Transaksi" style="width:200px;">
                           </div>
                      </form>
                    </div>

                    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
                      <script type="text/javascript">
                          $(document).ready(function(){
                              $('#title').autocomplete({
                              source: "<?php echo site_url('ListPengembalian/get_autocomplete');?>",
                    
                              select: function (event, ui) {
                                  $(this).val(ui.item.label);
                                  $('[name="id_sewa"]').val(ui.item.label);
                                  $('[name="nama_pelanggan"]').val(ui.item.nama_pelanggan);
                                  $('[name="no_telp"]').val(ui.item.no_telp);
                                  $('[name="alamat"]').val(ui.item.alamat);
                                  $('[name="tgl_acara1"]').val(ui.item.tgl_acara1); 
                                  $('[name="tgl_acara2"]').val(ui.item.tgl_acara2);                     
                              }
                          });
                          });
                      </script> 
                  </div>


      <form id="form_input_detail" action="<?php echo site_url('ListPengembalian/inputtampil');?>" method="POST">
                    <div class="form-group row">
                      <div class="col-sm-4" >
                      <label>No Transaksi</label>
                        <input type="text" class="form-control" id="id_sewa" name="id_sewa" value="<?php if(isset($data)) { echo $data[0]->id_sewa; } ?>"  readonly>
                      </div>

                      <div class="col-sm-4" >
                        <label  for="nama">Nama Penyewa:</label>
                        <input class="form-control"  type="text" name="nama_pelanggan" value="<?php if(isset($data)) { echo $data[0]->nama_pelanggan; } ?>" readonly>
                      </div>
                      
                      <div class="col-sm-4">
                      <label for="nomor">Nomor Telepon: </label>
                        <input class="form-control" type="text" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->telp_pelanggan; } ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label for="alamat">Alamat Lengkap:</label>
                        <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_pelanggan; } ?>" readonly>
                      </div>

                      <div class="col-sm-4">
                        <label for="tgl">Tanggal Acara 1:</label>
                       <input class="form-control" type="date" name="tgl_acara1" value="<?php if(isset($data)) { echo $data[0]->tgl_acara1; } ?>"  readonly>
                      </div>

                      <div class="col-sm-4">
                        <label for="tgl">Tanggal Acara 2:</label>
                        <input class="form-control" type="date" name="tgl_acara2" value="<?php if(isset($data)) { echo $data[0]->tgl_acara2; } ?>" readonly>
                      </div>
                    </div>
                    </div>

                <div class="form-group row">
                  <div class="col-sm-4"><button class="btn btn-info" type="submit">Tampilkan Barang</button>
                  </div>
                </div>
              </form>

       
     <?php if(isset($data)){
         ?>
      <form  action="<?php echo site_url('ListPengembalian/inputkembali');?>" method="POST">
                    <table class="table table-borderless table-data3">
                            <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Sewa</th>
                                <th style="text-align:left;">Jumlah Kembali</th>
                            </tr>
                            </thead>
                            <tbody>

                              <?php $i=1;
                                foreach ($detail_sewa2 as $items): ?>
                                <tr>
                                     <td><?=$items->id_hargatenda ;?></td>
                                     <td><?=$items->jenis_tenda;?></td>
                                     <td style="text-align:left;"><?php echo number_format($items->jumlah_barang);?></td>
                                     <input type="hidden" name="idhargaTenda[]" id="jumlah_kembali" class="form-control" value="<?php echo $items->id_hargatenda; ?>">
                                     <input type="hidden" name="tendaSewa[]" class="form-control" value="<?php echo $items->jumlah_barang; ?>">
                                     <td ><input type="text" name="tenda_kembali[]" id="jumlah_kembali" class="form-control" ></td>
                                </tr>
                                <?php $i++;
                                endforeach; ?>

                                <?php $i=1;
                                foreach ($detail_sewa1 as $items): ?>
                                <tr>
                                     <td><?=$items->id_barang ;?></td>
                                     <td><?=$items->nama_barang;?></td>
                                     <td style="text-align:left;"><?php echo number_format($items->jumlah_barang);?></td>
                                     <input type="hidden" name="idBarang[]" class="form-control" value="<?php echo $items->id_barang; ?>">
                                     <input type="hidden" name="barangSewa[]" class="form-control" value="<?php echo $items->jumlah_barang; ?>">
                                     <td><input type="text" name="barang_kembali[]" id="jumlah_kembali" class="form-control"></td>
                                </tr>
                                <?php $i++;
                                endforeach; ?>

                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <input type="hidden" class="form-control" id="id_sewa" name="id_sewa" value="<?php if(isset($data)) { echo $data[0]->id_sewa; } ?>"
                                  <input type="hidden" class="form-control" id="id_kembali" name="id_kembali"  style="width:200px;" value="<?php echo $kode;?>" readonly>
                                <th><button  name="btnSimpan" class="btn btn-info btn-lg"> Simpan</button></th>
                                </tr>
                            </tbody>
                        </table>
                      </form>
<?php }
?>
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
<!-- end document-->