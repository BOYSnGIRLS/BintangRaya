<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                   <h2 class="title-1">Data Kerja Pegawai</h2>
                                                     </div>                 
                                    <br>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                <div class="card-header">Transaksi</div>
                                    <div class="card-body">

                                            <h3 class="text-center title-2">Pilih Transaksi</h3>
                                        <hr>
                                            <div class="form-group">
                                                <label for="tanggal" class="control-label mb-1">Tanggal</label>
                                                <input id="tanggal" name="tanggal" type="date" class="form-control" >
                                            </div>
                                            <form id="form_search" action="<?php echo site_url('DataKerja/get_autocomplete');?>" method="GET">
                                            <div class="form-group has-success">
                                                <label for="nama" class="control-label mb-1">Nama</label>
                                                <input id="title" name="title" type="text"  class="form-control">
                                            </div>
                                            </form>
                                            <div class="form-group">
                                                <label for="alamat" class="control-label mb-1">Alamat</label>
                                                <input id="alamat" name="alamat" type="text" class="form-control ">
                                                   
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    &nbsp;
                                                    <span id="payment-button-amount">Cari</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                      </div>  
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Pembagian Gaji</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label class=" form-control-label">Supir</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                            <input type="text" id="text-input" name="text-input" placeholder="Total" class="form-control">
                                                            </div>
                                                        </div>

                                                        

                                                    <div class="row form-group">
                                                        <div class="col-md-7">
                                                            <select name="select" id="select" class="form-control">
                                                                <option value="0">Berangkat</option>
                                                                <option value="1">Option #1</option>
                                                                <option value="2">Option #2</option>
                                                                <option value="3">Option #3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="form-input">
                                                    <div class="row form-group">
                                                        <div class="col-md-7">
                                                            <select name="select" id="select" class="form-control">
                                                                <option value="0">Pulang</option>
                                                                <option value="1">Option #1</option>
                                                                <option value="2">Option #2</option>
                                                                <option value="3">Option #3</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-7">
                                                            <td width="40%">
                                                                <input type="checkbox" name="alamat" value="berbeda" class="detail">Pulang - Pergi</td>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
											<div class="row form-group">
                                            <div class="col col-md-4">
                                                    <label class=" form-control-label">Pemasangan</label>
                                            </div>
                                            <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="row form-group">
                                                            <div class="col col-md-10">
                                                             <select class="form-control" name="nama pegawai" id="nama_pegawai">
																
																<?php
																foreach ($dropdown->result() as $row) {
 
																echo "<option value='".$row->nama."'>".$row->nama."</option>";
																}
																?>
																</select>
																
                                                            </div>
                                                        </div>
															<input id="idf" value="1" type="hidden" />
                                                                <button type="button" onclick="tambah(); return false;">+ Tambah</button>
																
																<div class="row form-group">
															<div class="col col-md-10">
																<div id="divTambah"></div>
                                                        
														</div>
														</div>
                                                        </div>
                                                    </div>
                                                </div>
											
											<div class="row form-group">
                                            <div class="col col-md-4">
                                                    <label class=" form-control-label">Pembongkaran</label>
                                            </div>
                                            <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="row form-group">
                                                            <div class="col col-md-10">
                                                                <select class="form-control" name="nama pegawai" id="nama_pegawai">
																
																<?php
																foreach ($dropdown->result() as $row) {
 
																echo "<option value='".$row->nama."'>".$row->nama."</option>";
																}
																?>
																
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                                <input id="idf2" value="1" type="hidden" />
                                                                <button type="button" onclick="tambah2(); return false;">+ Tambah</button>
														<div class="row form-group">
															<div class="col col-md-10">
																<div  id="divTambah2"></div>
															</div>
														</div>
														</div>
                                                    </div>
                                                    </div>
                                                </div>    
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

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#form-input").css("display"); //Menghilangkan form-input ketika pertama kali dijalankan
        $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        if ($("input[name='alamat']:checked").val() == "berbeda" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
        $("#form-input").slideUp("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
            $("#form-input").slideDown("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
         });
    });
    </script>

<script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
<script language="javascript">
   function tambah() {
     var idf = document.getElementById("idf").value;
     var stre;
     stre="<p id='srow" + idf + "'> <select name='pemasangan[]'  class='form-control'> <option>Nama Pegawai</option></select> <a href='#' style=\"color:#3399FD;\" onclick='hapus(\"#srow" + idf + "\"); return false;'>Hapus</a></p> ";
     $("#divTambah").append(stre);
     idf = (idf-1) + 2;
     document.getElementById("idf").value = idf;
   }
   function hapus(idf) {
     $(idf).remove();
   }
</script>

<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script type="text/javascript">

   function tambah2() {
     var idf2 = document.getElementById("idf2").value;
     var stre2;
     stre2="<p id='srow2" + idf2 + "'><select name='pembongkaran[]' class='form-control'> <option>Nama Pegawai</option></select> <a href='#' style=\"color:#3399FD;\" onclick='hapus2(\"#srow2" + idf2 + "\"); return false;'>Hapus</a></p>";
     $("#divTambah2").append(stre2);
     idf2 = (idf2-1) + 2;
     document.getElementById("idf2").value = idf2;
   }
   function hapus2(idf2) {
     $(idf2).remove();
   }
</script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
        

        <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#title').autocomplete({
                source: "<?php echo site_url('DataKerja/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $('[name="id_roti"]').val(ui.item.id_roti);
                    $('[name="nama_roti"]').val(ui.item.label);
                    $('[name="harga"]').val(ui.item.harga);
                

                }
            });
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
<!-- end document-->