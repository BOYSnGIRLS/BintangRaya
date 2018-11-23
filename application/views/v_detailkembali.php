<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid">
     <form id="form_input_detail" action="<?php echo site_url('ListPengembalian/inputdetail');?>" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h2 class="title-2 m-b-40">Data Penyewa</h2>
                    <!-- input data penyewa -->
                    <div class="form-group row">
                         <div class="col-sm-4" >
                        <label>No Pesanan</label>
                        <input type="text" class="form-control" id="id_sewa" name="id_sewa"  style="width:200px;" value="<?php echo $data[0]->id_sewa;?>" readonly>
                    </div>
                    </div>

                    <div class="form-group row">

                      <div class="col-sm-4" >
                        <label  for="nama">Nama Penyewa:</label>
                        <input class="form-control" placeholder="Masukan Nama" type="text" name="nama_pelanggan" value="<?php if(isset($data)) { echo $data[0]->nama_pelanggan; } ?>" readonly>
                      </div>
                      
                      <div class="col-sm-4">
                      <label for="nomor">Nomor Telepon: </label>
                        <input class="form-control" placeholder="Masukan Nomor" type="text" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->telp_pelanggan; } ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label for="alamat">Alamat Lengkap:</label>
                        <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_pelanggan; } ?>" readonly>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Tanggal Acara 1:</label>
                       <span> <input class="form-control" type="date" name="tgl_acara1" value="<?php if(isset($data)) { echo $data[0]->tgl_acara1; } ?>" readonly>
                      </div>

                      <div class="col-sm-3">
                        <label for="tgl">Tanggal Acara 2:</label>
                        <input class="form-control" type="date" name="tgl_acara2" value="<?php if(isset($data)) { echo $data[0]->tgl_acara2; } ?>" readonly>
                      </div></span>
                    </div>
                    </div>

                    <table class="table table-borderless table-data3">
                            <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Sewa</th>
                                <th>Jumlah Kembali</th>
                                <th>Hilang/Rusak</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($detail_sewa2 as $items): ?>
                                
                                <tr>
                                     <td><?=$items->id_hargatenda ;?></td>
                                     <td><?=$items->jenis_tenda;?></td>
                                     <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                                     <td><input type="text" name="jumlah_kembali" class="form-control"></td>
                                     <td><input type="text" name="hilang" class="form-control"></td>
                                </tr>
                                
                                <?php
                                endforeach; ?>
                                <?php 
                                foreach ($detail_sewa1 as $items): ?>
                                
                                <tr>
                                     <td><?=$items->id_barang ;?></td>
                                     <td><?=$items->nama_barang;?></td>
                                     <td style="text-align:center;"><?php echo number_format($items->jumlah_barang);?></td>
                                     <td><input type="text" name="jumlah_kembali" class="form-control"></td>
                                     <td><input type="text" name="hilang" class="form-control"></td>
                                </tr>
                                <?php
                                endforeach; ?>
                                <tr>
                                <tr>
                                  <td colspan="5"><button  name="btnTambah" class="btn btn-info btn-lg"> Simpan</button></td>
                                </tr>
                            </tbody>
                        </table>

                    
<script type="text/javascript">
        $(function(){
            $('#jml_kembali').on("input",function(){
                var jml_sewa=$('#jumlah_barang').val();
                var jml_kembali=$('#jml_kembali').val();
                var hsl=jml_kembali.replace(/[^\d]/g,"");
                $('#jml_kembali2').val(hsl);
                $('#sisa').val(hsl-jml_sewa);
            })
            
        });
    </script>