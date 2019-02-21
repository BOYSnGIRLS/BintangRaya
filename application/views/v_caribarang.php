 <!-- MAIN CONTENT -->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid"> 

     <form id="form_input_detail" action="<?php echo site_url('CariBarang/inputTgl');?>" method="POST">
        <div class="row">
             <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">    
                    <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="tgl">Tanggal Acara Mulai:</label>
                        <input type="hidden" name="tgl_pasang" value="<?php if(null !== $this->session->userdata('tgl_pasang')) { $tgl_pasang = $this->session->userdata('tgl_pasang'); echo $tgl_pasang; } ?>" readonly >
                       <input class="form-control" type="date" name="tgl_acara1" value="<?php if(null !== $this->session->userdata('tgl_acara1')) { $tgl_acara1 = $this->session->userdata('tgl_acara1'); echo $tgl_acara1; } ?>" required>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Selesai :</label>
                        <input class="form-control" type="date" name="tgl_acara2" value="<?php if(null !== $this->session->userdata('tgl_acara2')) { $tgl_acara2 = $this->session->userdata('tgl_acara2'); echo $tgl_acara2; } ?>" required>
                        <input type="hidden" name="tgl_bongkar" value="<?php if(null !== $this->session->userdata('tgl_bongkar')) { $tgl_bongkar = $this->session->userdata('tgl_bongkar'); echo $tgl_bongkar; } ?>" readonly >
                      </div>
                      
                      <div class="col-sm-3">
                        <label for="btn">-------------------</label>
                        <a href="<?php echo site_url('CariBarang/selesai');?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span>Hapus</a>
                        <button class="btn btn-info" name="btnTgl" >Cari</button>
                      </div>
                      </div>
                  </form>
                </div>

                    <div class="form-group row">
                        <div class="col-lg-9">
                        
                        <form id="form_search" action="" method="GET">
                            <label>Cari Barang</label>
                            <div class="input-group">
                                <input type="text" name="title" class="form-control" id="title" placeholder="nama_barang" style="width:200px;" required="">
                                
                             </div>


                        </form>
                    </div>
                    </div>

                    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
                    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
                    <script type="text/javascript">
                        function a(id){
                        var stok = "asas";
                        var link = '<?php echo base_url('InputSewa/getStokBarang') ; ?>';
                        $.ajax({
                            type : "POST",
                            url : link,
                            async : false,
                            data : {'tglp':$('[name = tgl_pasang]').val(),'tgl1':$('[name = tgl_acara1]').val(), 'tgl2':$('[name = tgl_acara2]').val(), 'tglb':$('[name = tgl_bongkar]').val(), 'id' :id},
                            success : function(data){ stok = data }
                        }

                            )
                        return stok;
                        }

                    </script>
                    <script type="text/javascript">
                                              
                        $(document).ready(function(){
                            $('#title').autocomplete({
                            source: "<?php echo site_url().'CariBarang/get_autocomplete/';?>",
                  
                            select: function (event, ui) {
                                $(this).val(ui.item.label);
                                $('[name="id_barang"]').val(ui.item.id_barang);
                                $('[name="nama_barang"]').val(ui.item.label);
                                $('[name="stok_barang"]').val(ui.item.stok - a(ui.item.id_barang));
                                $('[name="harga_sewa"]').val(ui.item.harga);
                                $('[name="harga_jasa"]').val(ui.item.jasa);                            
                            }
                        });
                        });
                    </script>


        <!--<form id="form_search" action="<?php echo site_url('CariBarang/selesai');?>" method="POST">-->
            <div class="form-group row">
                <div class="col-sm-3" >
                    <label  for="nama">Nama Barang:</label>
                    <input class="form-control" type="text" name="nama_barang" readonly>
                    <input class="form-control" type="hidden" name="id_barang" readonly>
                  </div>

                  <div class="col-sm-3" >
                    <label  for="nama">Stok Barang:</label>
                    <input class="form-control" type="text" name="stok_barang" readonly >
                  </div>

                  <div class="col-sm-3" >
                    <label  for="nama">Biaya Sewa (Rp):</label>
                    <input class="form-control" type="text" name="harga_sewa" readonly >
                    <input type="hidden" name="jasa" readonly="">
                  </div>            
        </form>
</div></div>
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

<script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total_tagih').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
<script type="text/javascript">
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'dd-mm-yy' // Set format tanggalnya jadi yyyy-mm-dd
        });
   </script>

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