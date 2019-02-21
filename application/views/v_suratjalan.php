 <!-- MAIN CONTENT -->
 <?php if(isset($data)){ ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
									<center>
                                        <h3>Persewaan Tenda dan Alat Pesta</h3>
										<h2>Bintang Raya</h2>
                                        <p >Jl. Singosari No.1 Sumber Pakem Kebonsari Jember</p>
										<p >Telp. (0331) 323204, 0831 044 055 05</p>
									</center>
                                        <br>

                                
                                
                            <div class="row"> 
                                <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Nomor Surat</td>
                                                <td>:</td>
                                                <td><?php echo $data[0]->id_sewa;?></td>
                                                <td>Nama Pelanggan</td>
                                                <td>:</td>
                                                <td><?php echo $data[0]->nama_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Pasang</td>
                                                <td>:</td>
                                                <td><?php echo date ('d - m - Y', strtotime($data[0]->tgl_pasang));?></td>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $data[0]->alamat_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Acara</td>
                                                <td>:</td>
                                                <td><?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara1));?> s/d <?php echo date ('d - m - Y', strtotime($data[0]->tgl_acara2));?></td>
                                                <td>No. Telepon</td>
                                                <td>:</td>
                                                <td><?php echo $data[0]->telp_pelanggan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Bongkar</td>
                                                <td>:</td>
                                                <td><?php echo date ('d - m - Y', strtotime($data[0]->tgl_bongkar));?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                        <br>

									
                                <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Jumlah Barang</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
												
											</tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($detail_sewa2 as $items): ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                                             <td><?=$items->id_hargatenda ;?></td>
                                             <td><?=$items->jenis_tenda;?></td>
                                             
                                         </tr>
                                            <?php
                                            endforeach; ?>

                                            <?php 
                                            foreach ($detail_sewa1 as $items): ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                                             <td><?=$items->id_barang ;?></td>
                                             <td><?=$items->nama_barang;?></td>
                                             
                                             
                                        </tr>
                                
                                            <?php
                                            endforeach; ?>
                                        </tbody>
                                        </table>
							             
                                    </div>
                                    <hr>
                                    <br>
                                    
                                    
                                        <!--<button class="au-btn au-btn-icon au-btn--blue" onClick="window.print();">CETAK</button>-->
                                    <br>
                                    
                                </div>
                                
                                <div class="row">
                <div class="col-sm-9" >
                    <table class="table table-borderless" >
                        <tr>
                            <th>Mengetahui,</th>
                        </tr>
                        <tr><th></th></tr>
                        <tr><th></th></tr>
                        <tr><th></th></tr>
                        <tr>
                            <th>(Penerima)</th>
                        </tr>
                        
                    </table>
                   
                </div>

                <div class="col-sm-3" >
                    <table class="table table-borderless" >
                        <tr>
                            <th>Jember, <?php echo date('d-m-Y'); ?></th>
                        </tr>
                        <tr><th></th></tr>
                        <tr><th></th></tr>
                        <tr><th></th></tr>
                        <tr>
                            <th>(Andry Irdhiansyah)</th>
                        </tr>
                        
                    </table>
                </div>

            </div>
            <br>
                                        <input name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" style="visibility: visible;">
                                    <br>
                            </div>

                           
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php }?>
            <!--END MAIN CONTENT-->
            
<script>
    function Cetakan(){
  var x = document.getElementsByName("cetak");
  for(i = 0; i < x.length ; i++)
  {
        x[i].style.visibility = "hidden";
  }
  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
  for(i = 0; i < x.length ; i++)
  {
        x[i].style.visibility = "visible";
  }
}
</script>


