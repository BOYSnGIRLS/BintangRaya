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
                                    <div class="card-header">Transaksi</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Pilih Transaksi</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tanggal</label>
                                                <input id="cc-pament" name="cc-payment" type="date" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Nama</label>
                                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Alamat</label>
                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    &nbsp;
                                                    <span id="payment-button-amount">Cari</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
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
                                                    <div class="row form-group">
                                                        <div class="col-md-7">
                                                           <div class="checkbox">
                                                            <label for="checkbox3" class="form-check-label ">
                                                                <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Pulang - Pergi
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col col-md-4">
                                                    <label class=" form-control-label">Pemasangan</label>
                                            </div>
                                            <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="row form-group">
                                                            <div class="col col-md-10">
                                                                <select name="pemasangan[]" id="select" class="form-control">
                                                                    
																	<option value="0">Nama Pegawai</option>
                                                                    
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
                                            <div class="col col-md-4">
                                                    <label class=" form-control-label">Pembongkaran</label>
                                            </div>
                                            <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="row form-group">
                                                            <div class="col col-md-10">
                                                                <select name="pembongkaran" id="select" class="form-control">
                                                                    <option value="0">Nama Pegawai</option>
                                                                    <option value="1">Option #1</option>
                                                                    <option value="2">Option #2</option>
                                                                    <option value="3">Option #3</option>
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
<script type="text/javascript">

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
        