<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h2 class="title-2 m-b-40">Data Penyewa</h2>

                    <!-- input data penyewa -->
                    <div class="form-group row">

                      <div class="col-sm-4" >
                        <label  for="nama">Nama Penyewa:</label>
                        <input class="form-control" placeholder="Masukan Nama" type="text" name="nama_pemesan" value="<?php if(isset($data)) { echo $data[0]->nama_pemesan; } ?>">
                      </div>
                      
                      <div class="col-sm-4">
                      <label for="nomor">Nomor Telepon: </label>
                        <input class="form-control" placeholder="Masukan Nomor" type="text" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->no_telp; } ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label for="alamat">Alamat Lengkap:</label>
                        <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_antar; } ?>">
                      </div>

                      <div class="col-sm-3">
                        <label for="Pesan">Tanggal Pakai:</label>
                        <input class="form-control" type="date" name="tgl_ambil" value="<?php if(isset($data)) { echo $data[0]->tgl_ambil; } ?>">
                      </div>
                    </div>

                    </div>


                    <div class="row">
                        <div class="col-lg-9">
                        
                        <form id="form_search" action="<?php echo site_url('InputSewa/get_autocomplete');?>" method="GET">
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
                            source: "<?php echo site_url('InputSewa/get_autocomplete');?>",
                  
                            select: function (event, ui) {
                                $(this).val(ui.item.label);
                                $('[name="id_barang"]').val(ui.item.id_barang);
                                $('[name="nama_barang"]').val(ui.item.label);
                            
                            }
                        });
                        });
                    </script> 
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3" >
                            <label  for="nama">Id Barang:</label>
                            <input class="form-control" type="text" name="id_barang" readonly>
                          </div>

                          <div class="col-sm-3" >
                            <label  for="nama">Nama Barang:</label>
                            <input class="form-control" type="text" name="nama_barang" readonly >
                          </div>
                          
                          <div class="col-lg-3">
                          <label for="nomor">Jumlah Beli: </label>
                            <input class="form-control" placeholder="Masukan Jumlah Beli" type="text" name="jumlah">
                            <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </span>
                            </div>
                        </div>

                        <table class="table table-borderless table-data3">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok Barang</th>
                                <th>Jumlah Sewa</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <hr>
                    <br>
                        <h3><button>SIMPAN</button></h3>
                    <br>
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
<!-- END MAIN CONTENT-->
</div>
<!-- END PAGE CONTAINER-->

</div>

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