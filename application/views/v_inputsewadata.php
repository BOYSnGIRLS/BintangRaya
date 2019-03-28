 <!-- MAIN CONTENT -->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid"> 

     <form id="form_input_detail" action="<?php echo site_url('InputSewa2/inputket');?>" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                    <center><h2 class="title-2 m-b-40"><?php echo $this->session->flashdata('message');?></h2></center>
                </div>
                    <div class="au-card-inner">
                        <h2 class="title-2 m-b-40">Data Penyewa</h2>
                    <div class="form-group row">
                        <div class="col-sm-4" >
                            <label>No Pesanan</label>
                            <input type="text" class="form-control" id="id_sewa" name="id_sewa"   value="<?php echo $kode;?>" readonly>
                        </div>
                        <div class="col-sm-4" >
                            <label  for="nama">Nama Penyewa:</label>
                            <input class="form-control" placeholder="Masukan Nama" type="text" name="nama_pelanggan" value="<?php if(isset($data)) { echo $data[0]->nama_pelanggan; } ?>" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="nomor">Nomor Telepon: </label>
                            <input class="form-control" placeholder="Masukan Nomor" type="number"  maxlength="15" min="0" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->telp_pelanggan; } ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label for="alamat">Alamat Lengkap:</label>
                        <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_pelanggan; } ?>" required>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Tanggal Acara Mulai:</label>
                        <input type="hidden" name="tgl_pasang" value="<?php if(isset($data)) { echo $data[0]->tgl_pasang; } ?>" readonly >
                       <input class="form-control" type="date" name="tgl_acara1" value="<?php if(isset($data)) { echo $data[0]->tgl_acara1; } ?>" required>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Selesai :</label>
                        <input class="form-control" type="date" name="tgl_acara2" value="<?php if(isset($data)) { echo $data[0]->tgl_acara2; } ?>" required>
                      </div>
                      <button class="btn btn-info" name="btnTgl" >Submit</button>
                  </form>
                    </div>
                    <a href="<?php echo site_url('InputSewa2/step1');?>"><button>Lanjut</button> </a>

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

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'dd-mm-yy' // Set format tanggalnya jadi yyyy-mm-dd
        });
   </script>

<!-- Jquery JS-->
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
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