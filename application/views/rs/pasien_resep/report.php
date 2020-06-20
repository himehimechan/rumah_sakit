
<style>
        hr.new4 {
          border: 1.5px solid black;
          margin-right: 8px;
        }
        hr.style-four {
        padding: 0;
        border: none;
        border-top: medium double #333;
        color: #333;
        text-align: center;
        }
        div.absolute {
          position: absolute;
          width: 100%;
          bottom: 10px;
        }
    </style>

        <div style="border:solid black 0px;width:100%; height:100%; margin:10px;">
           <div style="width:100%;">
                <div class="row">
                    <div class="col-sm-3">
                    <img width="90" src="<?=base_url()?>Assets_admin/logo_klinik.png"/>
                    </div>
                    <div class="col-sm-9" style="text-align:center;position: center;margin-top:-80px;">
                        <h2 style="text-align:center;position: center;"><b>RS Sentosa Jaya</b></h2>
                        <h7 style="text-align:center;position: center;">JL.Jawa Blok HH, Kp. Tegal Tangsi RT.003 RW.003<br/>
                        Jatiwangi - Cikarang Barat - Bekasi - Phone 0878-8688-8577 Email rssentosa@yahoo.com</h7>
                    </div>
                </div>
                <br>
                <hr class="style-four">
                <br>
            </div>

                  <h2 style="text-align:center;position: center;">RESEP OBAT PASIEN <label style="color:blue;"><b><?php if($cek_copy_only) {?> COPY ONLY <?php } ?></label></b></h2>

                  <br>
                  <h2>BIODATA PASIEN</h2> 
                  <table border="1" style="width:100%">
                      <tr>
                          <td width="20%">ID Data Pemeriksaan</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['id_data_pemeriksaan']?></td>
                      </tr>
                      <tr>
                          <td width="20%">No Rekam Medis</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['no_rekam_medis']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Nama Pasien</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['nama_pasien']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Jenis Kelamin</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['jenis_kelamin']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Alamat</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['alamat']?></td>
                      </tr>
                      <tr>
                          <td width="20%">No HP</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['no_tlp']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Anamase</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['anamase']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Diagnosis</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['diagnosis']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Tindakan</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['tindakan']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Obat</td>
                          <td>&nbsp;&nbsp;<?=$data_pasien[0]['obat']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Tanggal Periksa</td>
                          <td>&nbsp;&nbsp;<?=date("d/m/Y", strtotime($data_pasien[0]['tanggal_periksa']))?></td>
                      </tr>
                      <tr>
                          <td width="20%">Status</td>
                          <td>&nbsp;&nbsp;<?=strtoupper($data_pasien[0]['status_pemeriksaan'])?></td>
                      </tr>
                      
                  </table>
                  <h2>RINCIAN OBAT</h2> 
                  <table border='1' style="width:100%">
                    <thead>
                      <tr>
                          <th width="5">No</th>
                          <th>Nama Obat</th>
                          <th>Status</th>
                          <th>QTY</th>
                          <th>Harga</th>
                          <th>Total Harga</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php 
                              $no = 0;
                              $tot_all = 0;
                              $status_resep = 'COMPLETE';
                              $qty_obat = 0;
                              foreach($data_obat as $row) {
                                $no++;
                                if($row['status'] != 'ready') {
                                  $status_resep = 'INCOMPLETE';
                                  $total = 0;
                                  $tot_all += 0;
                                } else {
                                  $total = $row['harga']*$row['qty'];
                                  $tot_all += $row['harga']*$row['qty'];
                                  $qty_obat += $row['qty'];
                                }

                                
                                  ?>
                                  <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $row['nama_obat'];?></td>
                                      <td><?php echo strtoupper($row['status']);?></td>
                                      <td style="text-align:right"><?php echo number_format($row['qty']);?></td>
                                      <td style="text-align:right">Rp. <?php echo number_format($row['harga']);?></td>
                                      <td style="text-align:right">Rp. <?php echo number_format($total);?></td>
                                  </tr>
                                  <?php
                              
                          } 
                          if($no == 0) {
                            $status_resep = '';
                          } 
                          ?>
                      </tbody>
                      <tr>
                        <td colspan="2" style="text-align:center"><b>Total</b></td>
                        <td><b><?=$status_resep?></b></td>
                        <td style="text-align:right"><b><?=$qty_obat?></b></td>
                        <td><b></b></td>
                        <td style="text-align:right"><b>Rp. <?=number_format($tot_all)?></b></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align:center"><b>Total Yang Harus Di Bayarkan</b></td>
                        <td><b><?php if($cek_copy_only) {?> COPY ONLY <?php } else { echo $status_resep; } ?></b></td>
                        <td style="text-align:right"><b><?=$qty_obat?></b></td>
                        <td><b></b></td>
                        <td style="text-align:right"><b>Rp. <?php if($cek_copy_only) {?> 0 <?php } else { echo number_format($tot_all); } ?></b></td>
                      </tr>
                  </table>
        </div>
                